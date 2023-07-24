<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model; //Lưu lại instance của model

    public function __construct()
    {
        $this->model = new ($this->getModel());
    }

    abstract public function getModel(); //Trả về tên class của Model

    public function getAll()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function create(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update(int $id, array $attributes = [])
    {
        $result = $this->find($id); //instance
        if ($result) {
            return $result->update($attributes);
        }

        return false;
    }

    public function delete(int $id)
    {
        $result = $this->find($id); //instance
        if ($result) {
            return $result->delete();
        }

        return false;
    }

}