<?php

namespace App\Repositories;
use App\Contracts\TopicRepositoryInterface;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Collection;

class TopicRepository implements TopicRepositoryInterface
{
    public function getAll() : Collection
    {
        return Topic::all();
    }

    public function getById($id): ?Topic
    {
        return Topic::findOrFail($id);
    }

    public function store($data): ?Topic
    {
        $topic = Topic::create($data);
        $topic->categories()->attach($data['category_ids']);

        return $topic;
    }   

    public function update($data, Topic $topic): ?Topic
    {
        $topic->update($data);
        $topic->categories()->sync($data['category_ids']);
        return $topic->fresh();
    }
}