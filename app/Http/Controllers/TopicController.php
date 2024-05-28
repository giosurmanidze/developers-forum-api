<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Contracts\TopicRepositoryInterface;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Resources\TopicResourse;
use App\Models\Topic;
use Illuminate\Http\JsonResponse;
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

    public function store (StoreTopicRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $storedTopic = $this->topicRepository->store($validatedData);

        return ApiResponseClass::sendResponse(
            new TopicResourse($storedTopic), 'Topic added successfully',201
        );
    }

    public function update(UpdateTopicRequest $request, Topic $topic): JsonResponse
    {
        $validatedData = $request->validated();
        $updatedTopic = $this->topicRepository->update($validatedData, $topic);

        return ApiResponseClass::sendResponse(
            new TopicResourse($updatedTopic), 'Topic updated successfully',200
        );
    }
}
