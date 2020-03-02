<?php

namespace App\Repositories\Elasticsearch;

use Elasticsearch\Client;
use Illuminate\Support\Arr;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BaseRepository implements ElasticsearchRepositoryInterface
{
    /** @var \Elasticsearch\Client */
    private $_elasticsearch;
    protected $_model; 

    public function __construct(Model $model, Client $elasticsearch)
    {
        $this->_model = $model;
        $this->_elasticsearch = $elasticsearch;
    }

    public function search(string $query = ''): Collection
    {
        $items = $this->searchOnElasticsearch($query);

        return $this->buildCollection($items);
    }

    private function searchOnElasticsearch(string $query = ''): array
    {
        $model = $this->_model;

        $items = $this->_elasticsearch->search([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        // 'fields' => ['title^5', 'body', 'tags'],
                        'fields' => ['name^3', 'description'],
                        'query' => $query,
                    ],
                ],
            ],
        ]);

        return $items;
    }

    private function buildCollection(array $items): Collection
    {
        $ids = Arr::pluck($items['hits']['hits'], '_id');

        return $this->_model::findMany($ids)
            ->sortBy(function ($model) use ($ids) {
                return array_search($model->getKey(), $ids);
            });
    }
}