<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Queue;
use App\Notifications\FailedJob;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // TODO: Elegantly target this Elasticsearch binding toward searchable items
        $this->app->bind(Repositories\Eloquent\BaseRespository::class, function ($app) {
            // This is useful in case we want to turn-off our
            // search cluster or when deploying the search
            // to a live, running application at first.
            if (! config('services.search.enabled')) {
                return new Repositories\Eloquent\BaseRespository(
                    $app->make(Model::class)
                );
            }

            return new Repositories\Elasticsearch\BaseRespository(
                $app->make(Model::class),
                $app->make(Client::class)
            );
        });

        $this->bindSearchClient();
    }

    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts($app['config']->get('services.search.hosts'))
                ->build();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        // Force SSL in production
        if ($this->app->environment() == 'production') {
            URL::forceScheme('https');
        }

        Queue::failing(function (JobFailed $event) {
            // $event->connectionName
            // $event->job
            // $event->exception
            Notification::route('mail', env('TEST_EMAIL') )
            ->route('nexmo', env('TEST_PHONE'))
            ->notify(new FailedJob($event));
        });
    }
}
