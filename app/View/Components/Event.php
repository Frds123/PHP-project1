<?php

namespace App\View\Components;

use App\Models\Event as ModelsEvent;
use Illuminate\View\Component;

class Event extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $events = ModelsEvent::latest()->take(3)->get();
        return view('components.frontend.layouts.partials.event', compact('events'));
    }
}
