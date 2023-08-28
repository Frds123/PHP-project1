<?php

namespace App\View\Composers;

use App\Models\Faculty;
use Illuminate\View\View;

class FrontendComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $facultries = Faculty::all();
         $view->with([
            'facultries' => $facultries
         ]);
        // $view->with('count', $this->users->count());
    }
}