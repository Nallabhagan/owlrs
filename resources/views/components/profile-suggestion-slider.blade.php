<div class="card">
    <div class="card-heading is-bordered">
        <h4>Follow Owlrs</h4>
        <a href="{{ url('discover-people') }}" class="ml-auto">View all Owlrs</a>
    </div>
    <div class="card-body">
        <div class="owl-carousel">
            @foreach($users as $user)
                @if(Auth::id() != $user->id)
                    <div class="item friend-card box-shadow border">
                        
                        <div class="img-container">
                            <a href="{{ url("user") }}/{{ Hashids::connection('user')->encode($user->id) }}">
                                <img class="avatar" src="{{ Helper::profilepic($user->id) }}">
                            </a>
                            
                        </div>
                        <a href="{{ url("user") }}/{{ Hashids::connection('user')->encode($user->id) }}" class="friend-info">
                            <h3 style="font-size: 12px;">{{ Helper::username($user->id) }}</h3>
                        </a>

                        
                        <div class="actions has-text-centered mt-2" id="follow_status{{ Hashids::connection('user')->encode($user->id) }}">
                            @auth
                                @if(Helper::follow_check(Auth::id(),$user->id))
                                    
                                    <button data-id="{{ Hashids::connection('user')->encode($user->id) }}" class="unfollow button is-solid primary-button raised font-weight-bold">Following</button>
                                @else
                                    <button data-id="{{ Hashids::connection('user')->encode($user->id) }}" class="follow button is-solid primary-button raised font-weight-bold">Follow</button>
                                @endif
                            @else
                                <a href="{{ url('login') }}" class="button is-solid primary-button raised font-weight-bold">Follow</a>
                            @endauth
                            
                        </div>
                        
                    </div>
                @endif
            @endforeach
            

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:5,
            autoplay: true,
            responsiveClass:true,
            responsive:{
                0:{
                   items:2,
                   nav:true
                },
                600:{
                   items:2,
                   nav:true
                },
                1000:{
                   items:3,
                   nav:true,
                   loop:true
                }
           }
       })           
    });
</script>
@include('_includes.follow_control_script')