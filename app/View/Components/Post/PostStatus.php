<?php

namespace App\View\Components\Post;

use Illuminate\View\Component;
use App\Hoot;

class PostStatus extends Component
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
        $hoots = Hoot::inRandomOrder()->select('user_id','created_at')->where(["post_id" => $this->id])->get();
        return view('components.post.post-status', compact('hoots'));
    }
}
