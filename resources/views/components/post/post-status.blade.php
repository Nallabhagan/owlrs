
<div class="card-footer">
    <!-- Followers avatars -->
    <div class="likers-group">
        @if(count($hoots) != 0 )
            <img src="{{ Helper::profilepic($hoots[0]->user_id) }}">
        @endif
    </div>
    <!-- Followers text -->
    <div class="likers-text">
        @if(count($hoots) != 0)
            <p>
                <a href="{{ url('user') }}/{{ Hashids::connection('user')->encode($hoots[0]->user_id) }}">
                    {{ Helper::username($hoots[0]->user_id) }}
                </a>
                @if(count($hoots) == 1)
                    hooted this
                @endif
            </p>
            @if(count($hoots) > 1)
                <p>and <a href="javascript:void(0);" data-hooted-popover="8" class="drop-trigger">{{ count($hoots)-1 }} more</a> hooted this</p>


            @endif
             
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
<script type="text/javascript">
    $('*[data-hooted-popover]').each(function () {
        var e = $(this);

        e.webuiPopover({
            trigger: 'hover',
            placement: 'auto',
            width: 300,
            padding: false,
            offsetLeft: 0,
            offsetTop: 20,
            animation: 'pop',
            cache: false,
            content: function () {

                var destroyLoader = setTimeout(function () {
                    $('.loader-overlay').removeClass('is-active');
                }, 1000);


                var html = `
                    <div class="card" style="box-shadow:none;border:0px;margin-bottom:0px;">
                        <div class="card-body" style="padding: 5px 0px;">
                            @php
                                //to omit first user who hooted this
                                $flag = 0;
                            @endphp
                            @foreach($hoots as $hoot)
                                @if($flag != 0)
                                    <div class="hooted_people">
                                        <div class="img-wrapper">
                                            <img src="{{ Helper::profilepic($hoot->user_id) }}">
                                        </div>
                                        <div class="story-meta">
                                            <p><a href="{{ url('user') }}/{{ Hashids::connection('user')->encode($hoot->user_id) }}">{{ Helper::username($hoot->user_id) }}</a></p>
                                            <p>{{ $hoot->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                @endif
                                @php
                                    $flag++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                `;

                return html;
                return destroyLoader;

            }
        });
    });


</script>