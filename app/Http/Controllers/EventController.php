<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $events = Event::with('category')
            ->withCount('participants')
            ->latest()
            ->paginate(8);

//        return response()->json($events);
        return EventResource::collection($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(event $event)
    {
        //
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
