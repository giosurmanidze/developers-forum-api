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
}