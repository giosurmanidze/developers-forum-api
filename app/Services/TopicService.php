<?php

namespace App\Services;

use App\Models\Topic;
use App\Contracts\TopicRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;

class TopicService
{
   protected TopicRepositoryInterface $topicRepository;

   public function __construct(TopicRepositoryInterface $topicRepository)
   {
        $this->topicRepository = $topicRepository;
   }

   public function getAllTopics(string $limit): Collection
   {
       return $this->topicRepository->getAll($limit);
   }

   public function getTopicById(int $id): ?Topic
   {
        return $this->topicRepository->getById($id);
   }

   public function storeTopic(array $data, int $id): Topic
   {
    return $this->topicRepository->store($data, $id);
   }

   public function updateTopic(array $data, Topic $topic): Topic
   {
    if (Gate::denies('manage-topic', $topic)) {
        throw new AuthorizationException('You are not authorized to update this topic.');
    }
    return $this->topicRepository->update($data, $topic);
   }

   public function deleteTopic(Topic $topic): Topic
   {
    if (Gate::denies('manage-topic', $topic)) {
        throw new AuthorizationException('You are not authorized to delete this topic.');
    }  

    return $this->topicRepository->delete($topic);
   }
}
