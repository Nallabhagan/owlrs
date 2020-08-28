@extends('layouts.app')
@section('head-tag')
    <title> Owlrs | User Profile</title>
    
@endsection
@section('content')
@csrf
<div class="view-wrapper is-full">
        
        <!--Wrapper-->
        {{-- <div class="minimal-profile-wrapper">
        	<x-user.profile-info id="{{ $user_id }}" />
        </div> --}}
        <!--Cover-->
        <div class="event-page-wrapper">
	        <div class="event-cover">
	            <img class="cover-image" src="{{ url('assets/img/cover_1600x460.jpg') }}">
	        </div>
	        <!--Main infos-->
	        <x-user.profile-info id="{{ $user_id }}" />
	    </div>
        <!-- Container -->
            <div class="container is-custom">
            
                <!-- Profile page main wrapper -->
                <div id="profile-about" class="view-wrap is-headless">
                    <div class="column">
                        <!-- About sections -->
                        <div class="profile-about side-menu">
                            <div class="left-menu">
                                <div class="left-menu-inner box-shadow border">
                                    <div class="menu-item is-active" data-content="overview-content">
                                        <div class="menu-icon">
                                            <i class="mdi mdi-progress-check"></i>
                                            <span>Personal Info</span>
                                        </div>
                                    </div>
                                    <div class="menu-item" data-content="personal-content">
                                        <div class="menu-icon">
                                            <i class="mdi mdi-apps"></i>
                                            <span>Clicks</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content">
                                <div id="overview-content" class="content-section is-active">
                                    <x-user.user-favourites id="{{ $user_id }}"/>
                                </div>
            
                                
                                <div id="personal-content" class="content-section">
                                    <div class="columns">
                                        <div class="column is-8">
                                            <x-post.create-post />
                                            @foreach($posts as $post)
                                                <x-post.single-post id="{{ $post->id }}"/>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	@include('_includes.follow_control_script')
    @auth
        @include('_includes.feed_post_script')
    @endauth
    
@endsection