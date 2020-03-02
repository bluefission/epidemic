<?php   

namespace App\Repositories\Eloquent;   

use App\Repository\EloquentRepositoryInterface; 
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class OutbreakRepository extends BaseRepository
{     
    public function search(string $query = ''): Collection
	{
		return $this->_model->query()
            ->where('name', 'like', "%{$query}%")
            // ->orWhere('title', 'like', "%{$query}%")
            ->get();
    }
}