<?php

namespace App\Repositories;
use App\Models\Film;
use App\Interfaces\filmRepositoryInterface;
class filmRepository implements filmRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function index(){
        return Film::all();
    }
    public function getById($id){
        return film::findOrFail($id);
    }
    public function update(array $data,$id){
        return whereId($id)->update($data);
    }
    public function delete($id){
        Film::destroy($id);
    }
    public function store(array $data){
        return Film::create($data);
    }
}
