<?php

namespace App\Repositories\Interfaces;

use Elasticsearch\Client;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;

// https://madewithlove.be/how-to-integrate-elasticsearch-in-your-laravel-app-2019-edition/
interface ElasticsearchRepositoryInterface
{
    public function search(string $query = ''): Collection;
}