<?php

namespace App\Contracts;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Collection;

interface TopicRepositoryInterface
{
    public function getAll(string $limit): Collection;
    public function getById(int $id): ?Topic;
    public function store(array $data, int $userId): Topic;
    public function update(array $data, Topic $topic): Topic;
    public function delete(Topic $topic): Topic;

}