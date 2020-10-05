@extends('layouts.app')
@section('head-tag')
    <title> Owlrs | {{ $club_info->name }}</title>
    <meta property="og:description" content="A platform for readers to click the best parts of what they read, and share with all of us." />
    <meta property="og:title" content="OWLRS | Click what You Read, Share What You Click" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://owlrs.com" />
    <meta property="og:image" content="{{ url('assets/img/cover_1600x460.jpg') }}" />
    <meta property="fb:app_id" content="298710931222304" />
@endsection
@section('content')
	<div class="view-wrapper">
	    <!-- Container -->
	    <div id="main-feed" class="container">
	        
	        <!-- Content placeholders at page load -->
            <!-- this holds the animated content placeholders that show up before content -->
            @include('_includes.shadow_loader')
            	<div class="columns">
            		<div class="column">
            			<div class="categories-header is-block has-text-centered" style="padding: 10px 0px;margin-bottom: 0px;">
                            <h2>{{ $club_info->name }} </h2>
                            <a class="button primary-button is-solid" style="padding: 2px 5px;" href="{{ url('reader_club/club_list') }}">view all clubs</a>
                        </div>
            		</div>

            	</div>
	        <!-- Feed page main wrapper -->
	        <div id="activity-feed" class="view-wrap true-dom is-hidden" style="padding: 0px;">
	        	
	            <div class="columns">
	                <!-- Left side column -->
	                <div class="column is-3 is-hidden-mobile">
	                              
	                </div>
	                <!-- /Left side column -->
	    
	                <!-- Middle column -->
	                <div class="column is-6">
	                	<x-reader-club.create-post id="{{ $club_info->id }}"/>
	                	@php
	                	    $i = 0;
	                	@endphp
	                	@foreach($posts as $post)
	                	    @php
	                	        $i++;
	                	    @endphp
	                	    @if($i == 3)
	                	        <x-profile-suggestion-slider />
	                	    @endif
	                	    <x-post.single-post id="{{ $post->id }}"/>
	                	@endforeach
	                	{{ $posts->links() }}
	                </div>
	                <!-- Right side column -->
                    <div class="column is-3">
        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection