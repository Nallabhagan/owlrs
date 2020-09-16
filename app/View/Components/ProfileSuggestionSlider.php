<?php

namespace App\View\Components;

use App\User;
use Illuminate\View\Component;

class ProfileSuggestionSlider extends Component
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
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $users = User::inRandomOrder()->select("id")->limit(8)->get();
        return view('components.profile-suggestion-slider', compact('users'));
    }
}
