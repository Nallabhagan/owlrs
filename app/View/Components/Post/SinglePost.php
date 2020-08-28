<?php

namespace App\View\Components\Post;

use App\Post;
use Illuminate\View\Component;

class SinglePost extends Component
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
        $post = Post::find($this->id);
        $post_id = $this->id;
        return view('components.post.single-post', compact('post'));
    }
}
