<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{

    /**
     * Display last Event.
     */
    public function last(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $eventsLast = Event::with('category')
            ->withCount('participants')
            ->latest()
            ->limit(4)->get();

//        return response()->json($eventsLast);
        return EventResource::collection($eventsLast);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $search = $request->get('search');
        $category = $request->get('category');
        $events = Event::with('category')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%$search%");
                });
            })
            ->when($category, function ($query, $category) {
                return $query->where('category_id', '=', $category);
            })
            ->withCount('participants')
            ->latest()
            ->paginate(8);

//        return response()->json($events);
        return EventResource::collection($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $newEvent = Event::create($validatedData);
        return response()->json($newEvent, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(event $event): EventResource
    {
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event)
    {
        //
    }
}
