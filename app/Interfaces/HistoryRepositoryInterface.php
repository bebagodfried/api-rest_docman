<?php

namespace App\Interfaces;

interface HistoryRepositoryInterface
{
    public function all();
    public function findAll($id);
}
