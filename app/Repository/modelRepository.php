<?php
namespace App\Repository;

abstract class modelRepository{
    
    private $model;

    public function __construct()
    {
        $this->model = app($this->model());
    }

    abstract function model();

    public function getBy($col,$value,$limit=1){

        return $this->model->where($col,$value)->limit($limit)->get();
    }

    public function getlast(){
        return $this->model->all()->last();
    }

    public function create(array $values){

         return $this->model->create($values);
    }   

    public function find($id){
       return $this->model->find($id)->get();
    }

    public function exists($id){
        return $this->model->where('id',$id)->exists;
    }

    public function first($col,$value){
        return $this->model->where($col,$value)->first();
    }

    public function count(){
        return $this->model->where('admin',true)->get()->count();
    }
}
?>