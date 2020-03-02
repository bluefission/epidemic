<?php   

namespace App\Repositories\Moloquent;   

use App\Repositories\Interfaces\MoloquentRepositoryInterface; 
use Jenssegers\Mongodb\Eloquent\Model;

class BaseRepository implements MoloquentRepositoryInterface 
{     
    /**      
     * @var Model      
     */     
     protected $_model; 

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Model $model)     
    {         
        $this->_model = $model;
    }
    
    // Get all instances of model
    public function all()
    {
        return $this->_model->all();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->_model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->_model->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->_model->findOrFail($id);
    }

    public function search(string $query = ''): Collection
    {
        return $this->all();
    }

    // Get the associated model
    public function getModel()
    {
        return $this->_model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->_model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->_model->with($relations);
    }
}