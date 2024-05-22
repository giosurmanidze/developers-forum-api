<?php


namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface TopicRepositoryInterface
{
    public function getAll(): Collection;
}