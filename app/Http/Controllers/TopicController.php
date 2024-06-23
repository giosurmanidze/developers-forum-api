<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\TopicResourse;
use App\Services\TopicService;
use App\Classes\ApiResponseClass;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\TopicIndexRequest;
use Illuminate\Http\Resources\Json\JsonResource;


class TopicController extends Controller
{
    protected TopicService $topicService;

    public function __construct(TopicService $topicService)
    {
        $this->topicService = $topicService;
    }

    public function index(TopicIndexRequest $request): JsonResource
    {
        $limit = $request->input('limit');
        $topics = $this->topicService->getAllTopics($limit);
        return TopicResourse::collection($topics);
    }

    public function show(int $id): JsonResource
    {
        $topic = $this->topicService->getTopicById($id);
        return new TopicResourse($topic);
    }

    public function store (StoreTopicRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $userId = auth()->id();
        $storedTopic = $this->topicService->storeTopic($validatedData, $userId);

        return ApiResponseClass::sendResponse(
            new TopicResourse($storedTopic), 'Topic added successfully',201
        );
    }

    public function update(UpdateTopicRequest $request, Topic $topic): JsonResponse
    {
        $validatedData = $request->validated();
        $updatedTopic = $this->topicService->updateTopic($validatedData, $topic);

        return ApiResponseClass::sendResponse(
            new TopicResourse($updatedTopic), 'Topic updated successfully',200
        );
    }

    public function delete(Topic $topic): JsonResponse
    {
        $deletedTopic = $this->topicService->deleteTopic($topic);
        return ApiResponseClass::sendResponse(
            new TopicResourse($deletedTopic), 'Topic deleted successfully',200
        );
    }
}
