<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{

    /**
     * Display last Event.
     */
    public function last(): JsonResponse
    {
        $eventsLast = Event::with('category')
            ->orderBy('created_at', 'desc')
            ->limit(4)->get();

        return response()->json($eventsLast);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
