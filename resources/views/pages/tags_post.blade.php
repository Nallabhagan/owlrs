@extends('layouts.app')
@section('head-tag')
    <title> Owlrs | Read For</title>
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
            <!-- Feed page main wrapper -->
            <div id="activity-feed" class="view-wrap true-dom is-hidden">
                <div class="columns">
                    <!-- Left side column -->
                    <div class="column is-3 is-hidden-mobile">
                                  
                    </div>
                    <!-- /Left side column -->
        
                    <!-- Middle column -->
                    <div class="column is-6">
                        
                        @foreach($posts as $post)
                            <x-post.single-post id="{{ $post->taggable_id }}"/>
                        @endforeach
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
