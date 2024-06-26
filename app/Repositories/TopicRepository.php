<?php

namespace App\Repositories;

use App\Contracts\TopicRepositoryInterface;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Collection;

class TopicRepository implements TopicRepositoryInterface
{
    public function getAll(string $limit): Collection
    {
        $query = Topic::with(['user', 'categories'])->latest();
        
        if ($limit !== null) {
            $query->limit($limit);
        }
        
        return $query->get();
    }
    
    public function getById(int $id): ?Topic
    {
        return Topic::findOrFail($id);
    }

    public function store(array $data, int $userId): Topic
    {
        $topic = Topic::create([
           'user_id' => $userId,
           'title' => $data['title'],
           'content' => $data['content']
        ]);
        $topic->categories()->attach($data['category_ids']);

        return $topic;
    }   

    public function update(array $data, Topic $topic): Topic
    {
        $topic->update($data);
        $topic->categories()->sync($data['category_ids']);
        
        return $topic;
    }

    public function delete(Topic $topic): Topic
    {
        $topic->delete();
        return $topic;
    }
}