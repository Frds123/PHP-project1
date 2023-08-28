<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class MemberProfile extends Component
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
        $members = User::where('status', 1)->latest()->take(3)->get();

        return view('components.frontend.layouts.partials.member-profile', compact('members'));
    }
}
