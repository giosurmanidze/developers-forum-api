<?php

namespace App\Http\Controllers;

use App\Contracts\TopicRepositoryInterface;
use App\Http\Resources\TopicResourse;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicController extends Controller
{
    private TopicRepositoryInterface $topicRepository;

    public function __construct(TopicRepositoryInterface $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }


    public function index(): JsonResource
    {
        $topics = $this->topicRepository->getAll();

        return TopicResourse::collection($topics);
    }

    public function show($id): JsonResource
    {
        $topic = $this->topicRepository->getById($id);

        return new TopicResourse($topic);
    }
}
