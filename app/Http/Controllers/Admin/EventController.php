<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;

class EventController extends Controller
{
    private string $collection = 'events';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('media', 'translations')
            ->latest('id')
            ->paginate(12);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.editor', [
            'event' => new Event,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        Event::create($request->validationData())
            ->addMedia($request->thumbnail)
            ->toMediaCollection($this->collection);

        $this->banner('New Event is Created.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.editor');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->update($request->validationData());
        if ($request->hasFile('thumbnail')) {
            $event->clearMediaCollection($this->collection);
            $event->addMedia($request->thumbnail)
                ->toMediaCollection($this->collection);
        }

        $this->banner('The Event is Updated.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        $this->banner('The Event is Deleted.');

        return redirect()->action([static::class, 'index']);
    }
}
