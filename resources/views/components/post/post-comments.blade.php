<!-- Post #1 Comments -->
<div class="comments-wrap is-hidden">
    <!-- Header -->
    <div class="comments-heading">
        <h4>Comments
            <small>{{ count($comments) }}</small></h4>
        <div class="close-comments">
            <i data-feather="x"></i>
        </div>
    </div>
    <!-- /Header -->

    <!-- Comments body -->
    <div class="comments-body has-slimscroll" id="comments_list{{ Hashids::connection('post')->encode($post_id) }}">
        @foreach($comments as $comment)
            <!-- Comment -->
            <div class="media is-comment">
                <!-- User image -->
                <div class="media-left">
                    <div class="image">
                        <img src="{{ Helper::profilepic($comment->user_id) }}" data-user-popover="1" alt="">
                    </div>
                </div>
                <!-- Content -->
                <div class="media-content">
                    <a href="{{ url('user') }}/{{ Hashids::connection('user')->encode($comment->user_id) }}">{{ Helper::username($comment->user_id) }}</a>
                    <span class="time">{{ $comment->created_at->diffForHumans() }}</span>
                    <p>{{ $comment->comment }}</p>
                </div>
            </div>
            <!-- /Comment -->
        @endforeach
    </div>
    <!-- /Comments body -->

    <!-- Comments footer -->
    <div class="card-footer">
        <div class="media post-comment has-emojis">
            <!-- Comment Textarea -->
            @auth
                <form class="media-content">
                
                    <div class="field">
                        <p class="control">
                            <textarea class="textarea comment-textarea addComment{{ Hashids::connection('post')->encode($post_id) }}" rows="1" placeholder="Write a comment..." required></textarea>
                        </p>
                    </div>
                    <!-- Additional actions -->
                    <div class="actions">
                        <div class="image is-32x32">
                            <img class="is-rounded" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0" alt="">
                        </div>
                        <div class="toolbar">
                            <div class="action is-emoji">
                                <i data-feather="smile"></i>
                            </div>
                            @auth
                                <button type="button" class="commentForm button is-solid primary-button raised" id="{{ Hashids::connection('post')->encode($post_id) }}">Post Comment</button>
                            @else
                                <a href="{{ url('login') }}" class="button is-solid primary-button raised">Post Comment</a>
                            @endauth
                        </div>
                    </div>
                    <strong class="help is-danger error"></strong>
                </form>
            @else
                <form class="media-content">
                
                    <div class="field">
                        <p class="control">
                            <textarea class="textarea comment-textarea addComment{{ Hashids::connection('post')->encode($post_id) }}" rows="1" placeholder="Write a comment..." required></textarea>
                        </p>
                    </div>
                    <!-- Additional actions -->
                    <div class="actions">
                        @auth
                            <div class="image is-32x32">
                                <img class="is-rounded" src="{{ Helper::profilepic(Auth::id()) }}" alt="">
                            </div>
                        @else
                            <div class="image is-32x32">
                                <img class="is-rounded" src="{{ url('assets/img/profile_pics/user.jpg') }}" alt="">
                            </div>
                        @endauth
                        <div class="toolbar">
                            <div class="action is-emoji">
                                <i data-feather="smile"></i>
                            </div>
                            @auth
                                <button type="button" class="commentForm button is-solid primary-button raised" id="{{ Hashids::connection('post')->encode($post_id) }}">Post Comment</button>
                            @else
                                <a href="{{ url('login') }}" class="button is-solid primary-button raised">Post Comment</a>
                            @endauth
                        </div>
                    </div>
                    <strong class="help is-danger error"></strong>
                </form>
            @endauth

        </div>
    </div>
    <!-- Comments footer -->
</div>
<!-- /Post #1 Comments -->
