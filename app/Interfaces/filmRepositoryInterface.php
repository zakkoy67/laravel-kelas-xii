<?php

namespace App\Interfaces;

interface filmRepositoryInterface
{
    public function store(array $data);
    public function index();
    public function getById($id);
    public function update(array $data,$id);
    public function delete($id);
}
