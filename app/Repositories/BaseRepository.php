<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Interfaces\RepositoryInterface;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function find($id, array $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function findBy($field, $value, array $columns = ['*'])
    {
        return $this->model->where($field, $value)->first($columns);
    }

    public function findAllBy($field, $value, array $columns = ['*'])
    {
        return $this->model->where($field, $value)->get($columns);
    }

    public function update($id, array $data)
    {
        $record = $this->find($id);
        if ($record) {
            $record->fill($data);
            return $record->save();
        }
        return false;
    }

    public function delete($id)
    {
        $record = $this->find($id);
        if ($record) {
            return $record->delete();
        }
        return false;
    }

    public function beginTransaction()
    {
        DB::beginTransaction();
    }

    public function commit()
    {
        DB::commit();
    }

    public function rollBack()
    {
        DB::rollBack();
    }

}
