<?php

namespace App\View\Components\Post;

use Illuminate\View\Component;
use App\Comment;

class PostComments extends Component
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
        $comments = Comment::where(["post_id" => $this->id])->get();
        $post_id = $this->id;
        return view('components.post.post-comments', compact('comments', 'post_id'));
    }
}
