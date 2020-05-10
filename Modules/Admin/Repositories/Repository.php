<?php

namespace Modules\Admin\Repositories;


interface Repository
{
    public function getAll();

    public function findById($id);

    public function create(...$data);
}
