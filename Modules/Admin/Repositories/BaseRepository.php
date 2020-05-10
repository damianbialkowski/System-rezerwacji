<?php

namespace Modules\Admin\Repositories;


interface BaseRepository
{
    public function getAll();

    public function findById($id);

    public function create(array $data);
}
