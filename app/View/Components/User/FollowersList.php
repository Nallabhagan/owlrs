<?php

namespace App\View\Components\User;

use App\Follower;
use Illuminate\View\Component;

class FollowersList extends Component
{
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $followers = Follower::where(["following_id" => $this->id])->get();
        return view('components.user.followers-list', compact('followers'));
    }
}
