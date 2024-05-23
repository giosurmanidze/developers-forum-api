<?php

namespace App\Http\Controllers;

use App\Contracts\TopicRepositoryInterface;
use App\Http\Resources\TopicResourse;
use App\Models\Topic;
use Illuminate\Http\Request;
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

    public function store (Request $request)
    {
        $topic = $this->topicRepository->store($request->all());

        return $topic;
    }

    public function update(Request $request, Topic $topic)
    {
        $topic = $this->topicRepository->update($request->all(), $topic);

        return $topic;
    }
}
