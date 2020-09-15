@extends('layouts.app')
@section('head-tag')
    <title> Owlrs | Discover People</title>
    
@endsection
@section('content')
@csrf
<div class="view-wrapper is-full">
    <div class="event-page-wrapper">
        <div class="event-cover">
            <img class="cover-image" src="{{ url('assets/img/cover_1600x460.jpg') }}">
        </div>
            
    </div>
    <div class="container is-custom pt-5">
        <div class="columns is-multiline">
            @foreach($users as $user)
                @if(Auth::id() != $user->id)
                    <div class="column is-3">
                        <div class="card-flex friend-card box-shadow border">
                            
                            <div class="img-container">
                                <img class="avatar" src="{{ Helper::profilepic($user->id) }}">
                                
                            </div>
                            <a href="{{ url("user") }}/{{ Hashids::connection('user')->encode($user->id) }}" class="friend-info">
                                <h3>{{ Helper::username($user->id) }}</h3>
                            </a>

                            <div class="friend-stats">
                                <div class="stat-block">
                                    <label>Clicks</label>
                                    <div class="stat-number">
                                        {{ Helper::clicks_count($user->id) }}
                                    </div>
                                </div>
                                <div class="stat-block">
                                    <label>Followers</label>
                                    <div class="stat-number">
                                        {{ Helper::follow_count($user->id) }}
                                    </div>
                                </div>
                            </div>
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
                    </div>
                @endif
            @endforeach
        </div>
    
        
    </div>        
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	@include('_includes.follow_control_script')
    
    
@endsection
