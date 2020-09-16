@extends('layouts.app')
@section('head-tag')
    <title> Owlrs | Share Feed</title>
    <meta property="og:description" content="Click what You Read, Share What You Click" />
    <meta property="og:title" content="Checkout {{ Helper::username($post->user_id) }}'s Click on OWLRS" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url('post') }}/{{ Hashids::connection('post')->encode($post->id) }}" />
    <meta property="og:image" content="{{ url('assets/book_clicks') }}/{{ $post->book_click }}" />
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
    <meta property="og:site_name" content="OWLRS" />
    <meta property="fb:app_id" content="298710931222304" />
@endsection
@section('content')
    
    <div class="view-wrapper">
        <!-- Container -->
        <div id="main-feed" class="container">
            
            <!-- Content placeholders at page load -->
            <!-- this holds the animated content placeholders that show up before content -->
            @include('_includes.shadow_loader')
            <!-- Feed page main wrapper -->
            <div id="activity-feed" class="view-wrap true-dom is-hidden">
                <div class="columns">
                    <!-- Left side column -->
                    <div class="column is-3 is-hidden-mobile">
                                  
                    </div>
                    <!-- /Left side column -->
        
                    <!-- Middle column -->
                    <div class="column is-6">
                        <x-post.single-post id="{{ $post->id }}"/>
                        <x-profile-suggestion-slider />
                    </div>
                    <!-- /Middle column -->
        
                    <!-- Right side column -->
                    <div class="column is-3">
        
                        
                    </div>
                    <!-- /Right side column -->
                </div>
            </div>
            <!-- /Feed page main wrapper -->
        </div>
        <!-- /Container -->
    </div>
@endsection
@section('scripts')
    @csrf
    @include('_includes.feed_post_script')
@endsection
