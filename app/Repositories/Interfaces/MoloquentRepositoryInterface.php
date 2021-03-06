<?php

namespace App\Repositories\Interfaces;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
* Interface MoloquentRepositoryInterface
* @package App\Repositories
*/
interface MoloquentRepositoryInterface
{
    // Get all instances of model
    public function all();

    // create a new record in the database
    public function create(array $data): Model;

    // update record in the database
    public function update(array $data, $id);

    // remove record from the database
    public function delete($id);

    // show the record with the given id
    public function show($id): ?Model;

    public function search(string $query = ''): Collection;
}