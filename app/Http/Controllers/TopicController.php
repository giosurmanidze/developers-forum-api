<?php

namespace App\Http\Controllers;

use App\Contracts\TopicRepositoryInterface;
use App\Http\Resources\TopicResourse;

class TopicController extends Controller
{
    private TopicRepositoryInterface $topicRepository;

    public function __construct(TopicRepositoryInterface $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }


    public function index()
    {
        $topics = $this->topicRepository->getAll();

        return TopicResourse::collection($topics);
    }
}
