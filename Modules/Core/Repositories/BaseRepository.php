<?php

namespace Modules\Core\Repositories;


interface BaseRepository
{
    public function getAll();

    public function findById($id);

    public function create(array $data);
}
