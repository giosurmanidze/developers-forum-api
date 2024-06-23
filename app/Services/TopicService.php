<?php

namespace App;

use App\Contracts\TopicRepositoryInterface;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Collection;

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

   public function storeTopic(array $data, int $id): ?Topic
   {
    return $this->topicRepository->store($data, $id);
   }

   public function updateTopic(array $data, Topic $topic): ?Topic
   {
    return $this->topicRepository->update($data, $topic);
   }
}
