<div class="card-footer">
    <!-- Followers avatars -->
    <div class="likers-group">
        @if(count($hoots) !=0 )
            @foreach($hoots as $hoot)
               <img src="{{ Helper::profilepic($hoot->user_id) }}">
            @endforeach
        @endif
    </div>
    <!-- Followers text -->
    <div class="likers-text">
        @if(count($hoots) != 0)
            <p>
                @foreach($hoots as $hoot)
                    <a href="{{ url('user') }}/{{ Hashids::connection('user')->encode($hoot->user_id) }}">{{ Helper::username($hoot->user_id) }}</a>,
                @endforeach
            </p>
            @if(Helper::hoot_count($id) > 2)
                <p>and {{ Helper::hoot_count($id)-2 }} more </p>
            @endif
             hooted this
        @else
            <p>No one hooted this click</p>
        @endif
        
    </div>
    <!-- Post statistics -->
    <div class="social-count">
        <div class="likes-count">
            <i class="mdi mdi-thumb-up has-text-black" style="font-size: 18px;"></i>
            <span>{{ Helper::hoot_count($id) }}</span>
        </div>
        
        <div class="comments-count">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
            </svg>
            <span>{{ Helper::comment_count($id) }}</span>
        </div>
    </div>
</div>