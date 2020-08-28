<?php

namespace App\View\Components\User;

use App\User;
use Illuminate\View\Component;

class UserFavourites extends Component
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
        $favourites = User::where(['id' => $this->id])->select('author_read_most','favourite_book','favourite_quotes')->get();
        return view('components.user.user-favourites', compact('favourites'));
    }
}
