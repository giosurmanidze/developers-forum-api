<?php


namespace App\Contracts;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Collection;

interface TopicRepositoryInterface
{
    public function getAll(): Collection;
    public function getById($id): ?Topic;
}