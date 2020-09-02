<div class="event-content">
    <div class="stats-wrapper">
        <h2 class="p-2">I Am What I Read</h2>
        
        <div class="stats-header">
            <div class="avatar-wrapper">
                <img class="avatar" src="{{ Helper::profilepic($id) }}">
               
            </div>
            <div class="user-info ml-5">
                <h4 style="text-align: center;">
                    OWLR
                </h4>
                <h4>{{ Helper::username($id) }}</h4>
                
                @if(Auth::id() != $id)
                    <div class="actions" id="follow_status{{ Hashids::connection('user')->encode($id) }}">
                        @auth
                            @if(Helper::follow_check(Auth::id(),$id))
                                
                                <button data-id="{{ Hashids::connection('user')->encode($id) }}" class="unfollow button is-solid primary-button raised font-weight-bold">Following</button>
                            @else
                                <button data-id="{{ Hashids::connection('user')->encode($id) }}" class="follow button is-solid primary-button raised font-weight-bold">Follow</button>
                            @endif
                        @else
                            <a href="{{ url('login') }}" class="button is-solid primary-button raised font-weight-bold">Follow</a>
                        @endauth
                        
                    </div>
                @endif
            </div>
            <div class="main-stats">
                <div class="stat-block is-centered">
                    <h4>Clicks</h4>
                    <p>{{ Helper::clicks_count($id) }}</p>
                </div>
                <div class="stat-block">
                    <h4>Followers</h4>
                    <p>{{ Helper::follow_count($id) }}</p>
                </div>
               
            </div>
        </div>         
    </div>           
</div>