<?php

namespace App\Repositories\Interfaces;

interface LocationRepositoryInterface
{
    public function index(array $filterData);
    public function show(int $id);
}
