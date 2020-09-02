@foreach($followers as $follower)
    @if(Auth::id() != $follower->user_id)
        <div class="column is-4">
            <div class="card-flex friend-card box-shadow border">
                
                <div class="img-container">
                    <img class="avatar" src="{{ Helper::profilepic($follower->user_id) }}">
                    
                </div>
                <a href="{{ Hashids::connection('user')->encode($follower->user_id) }}" class="friend-info">
                    <h3>{{ Helper::username($follower->user_id) }}</h3>
                </a>

                <div class="friend-stats">
                    <div class="stat-block">
                        <label>Clicks</label>
                        <div class="stat-number">
                            {{ Helper::clicks_count($follower->user_id) }}
                        </div>
                    </div>
                    <div class="stat-block">
                        <label>Followers</label>
                        <div class="stat-number">
                            {{ Helper::follow_count($follower->user_id) }}
                        </div>
                    </div>
                </div>
                <div class="actions has-text-centered mt-2" id="follow_status{{ Hashids::connection('user')->encode($follower->user_id) }}">
                    @auth
                        @if(Helper::follow_check(Auth::id(),$follower->user_id))
                            
                            <button data-id="{{ Hashids::connection('user')->encode($follower->user_id) }}" class="unfollow button is-solid primary-button raised font-weight-bold">Following</button>
                        @else
                            <button data-id="{{ Hashids::connection('user')->encode($follower->user_id) }}" class="follow button is-solid primary-button raised font-weight-bold">Follow</button>
                        @endif
                    @else
                        <a href="{{ url('login') }}" class="button is-solid primary-button raised font-weight-bold">Follow</a>
                    @endauth
                    
                </div>
                
            </div>
        </div>
    @endif
@endforeach