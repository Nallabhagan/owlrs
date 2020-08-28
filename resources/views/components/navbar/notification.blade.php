@auth
    <div class="navbar-item is-icon drop-trigger">
        <a class="icon-link" href="javascript:void(0);">
            <i data-feather="bell"></i>
            <span class="indicator"></span>
            @if(count(auth()->user()->unreadNotifications) != 0)
                <div class="notification_count">
                    <span>{{ count(auth()->user()->unreadNotifications) }}</span>
                </div>                                    
            @endif
            
        </a>

        <div class="nav-drop">
            <div class="inner">
                <div class="nav-drop-header">
                    <span>Notifications</span>
                    <a href="{{ route('markRead') }}">
                        Mark all as read
                    </a>
                </div>
                <div class="nav-drop-body is-notifications">
                    <!-- Notification -->
                    @if(count(auth()->user()->unreadNotifications) != 0)
                        @foreach(auth()->user()->unreadNotifications as $notification)
                            <div class="media">
                                <figure class="media-left">
                                    <p class="image">
                                        <img src="{{ Helper::profilepic($notification->data['user_id']) }}">
                                    </p>
                                </figure>
                                <div class="media-content">
                                    <span>
                                        <a href="{{ url('user') }}/{{ Hashids::connection('user')->encode($notification->data['user_id']) }}">
                                            {{ Helper::username($notification->data['user_id']) }}
                                        </a> {{ $notification->data['message'] }} 
                                        @if($notification->type != "App\Notifications\Follow")
                                            <a href="{{ $notification->data['url'] }}">your post.</a>
                                        @endif
                                    </span>
                                    <span class="time">{{ $notification->created_at->diffForhumans() }}</span>
                                </div>
                                <div class="media-right">
                                    <div class="added-icon">
                                        @if($notification->type == "App\Notifications\Comment")
                                            <i data-feather="message-square"></i>
                                        @endif
                                        @if($notification->type == "App\Notifications\Hoot")
                                            <i data-feather="thumbs-up"></i>
                                        @endif
                                        @if($notification->type == "App\Notifications\Follow")
                                            <i data-feather="user-check"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                </div>
                
            </div>
        </div>
    </div>
@endauth