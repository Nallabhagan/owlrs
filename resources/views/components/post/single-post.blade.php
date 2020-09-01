<!-- Post 1 -->
<!-- /partials/pages/feed/posts/feed-post1.html -->
<!-- POST #1 -->
<div id="feed-post{{ Hashids::connection('post')->encode($post->id) }}" class="card is-post box-shadow">
    <!-- Main wrap -->
    <div class="content-wrap">
        <!-- Post header -->
        <div class="card-heading">
            <!-- User meta -->
            <div class="user-block">
                <div class="image">
                    <img src="{{ Helper::profilepic($post->user_id) }}">
                </div>
                <div class="user-info">
                    <a href="{{ url('user') }}/{{ Hashids::connection('user')->encode($post->user_id) }}">{{ Helper::username($post->user_id) }}</a>
                    <span class="time">{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <!-- Right side dropdown -->
            <!-- /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
            @auth
                @if($post->user_id == Auth::id())
                    <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                        <div>
                            <div class="button">
                                <i data-feather="more-vertical"></i>
                            </div>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a role="button" class="dropdown-item delete_post" post-token="{{ Hashids::connection('post')->encode($post->id) }}" >
                                    <div class="media">
                                        <i data-feather="bookmark"></i>
                                        <div class="media-content">
                                            <h3>Delete</h3>
                                            <small>Delete this post from your clicks.</small>
                                        </div>
                                    </div>
                                </a>
                                
                            </div>
                        </div>
                    </div> 
                @endauth     
            @endauth  
        </div>
        <!-- /Post header -->

        <!-- Post body -->
        <div class="card-body">
            <!-- Post body text -->
            <div class="post-text">
                
                @if(Helper::post_tag_id($post->id) != NULL)
                    <a class="read_for_tag" href="{{ url('click') }}/{{ Helper::post_tag_id($post->id)->tag_id }}">Read for: {{ Helper::tag_name(Helper::post_tag_id($post->id)->tag_id) }}</a>
                @endif
                <p class="has-text-black mt-3">{{ $post->description }}</p>
                <p class="has-text-danger font-weight-bold">Source: {{ $post->book_source }}</p>
            </div>
            <!-- Featured image -->
            <div class="post-image">
                <a data-fancybox="" data-lightbox-type="comments" data-thumb="assets/img/demo/unsplash/1.jpg" href="{{ url('assets/book_clicks') }}/{{ $post->book_click }}" data-demo-href="assets/img/demo/unsplash/1.jpg">
                    <img src="{{ url('assets/book_clicks') }}/{{ $post->book_click }}" data-demo-src="{{ url('assets/book_clicks') }}/{{ $post->book_click }}" alt="">
                </a>
                <!-- Action buttons -->
                <!-- /partials/pages/feed/buttons/feed-post-actions.html -->
                <div class="like-wrapper">

                    @auth
                        @if(Helper::hoot_check(Auth::id(),$post->id))
                            <a role="button" class="like-button is-active" post-token="{{ Hashids::connection('post')->encode($post->id) }}" hoot_type="UnHoot">
                                
                                <i class="mdi mdi-thumb-up not-liked bouncy"></i>
                                <i class="mdi mdi-thumb-up is-liked bouncy"></i>
                                <span class="like-overlay"></span>
                            </a>
                        @else
                            <a role="button" class="like-button" post-token="{{ Hashids::connection('post')->encode($post->id) }}" hoot_type="Hoot">
                                <i class="mdi mdi-thumb-up not-liked bouncy"></i>
                                <i class="mdi mdi-thumb-up is-liked bouncy"></i>
                                <span class="like-overlay"></span>
                            </a>
                        @endif
                    @else
                        <a href="{{ url('login') }}" class="like-button">
                            <i class="mdi mdi-thumb-up not-liked bouncy"></i>
                            <span class="like-overlay"></span>
                        </a>
                    @endauth
                </div>
                
                <div class="fab-wrapper is-share">
                    <a href="javascript:void(0);" class="small-fab share-fab modal-trigger" data-modal="social-share{{ Hashids::connection('post')->encode($post->id) }}">
                        <i data-feather="share-2"></i>
                    </a>
                </div>
                
                <div class="fab-wrapper is-comment">
                    <a class="small-fab">
                        <i data-feather="message-circle"></i>
                    </a>
                </div>            
            </div>
        </div>
        <!-- /Post body -->

        <!-- Post footer -->
        <x-post.post-status id="{{ $post->id }}"/>

        <!-- /Post footer -->
    </div>
    <!-- /Main wrap -->

    <x-post.post-comments id="{{ $post->id }}"/>
</div>
<!-- POST #1 -->
<x-post.post-share-pop-up id="{{ $post->id }}" />

