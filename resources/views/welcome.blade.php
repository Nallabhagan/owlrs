@extends('layouts.app')
@section('head-tag')
    <title> Owlrs | Feed</title>
    <meta property="og:description" content="A platform for readers to click the best parts of what they read, and share with all of us." />
    <meta property="og:title" content="OWLRS | Click what You Read, Share What You Click" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://owlrs.com" />
    <meta property="og:image" content="{{ url('assets/img/cover_1600x460.jpg') }}" />
    <meta property="fb:app_id" content="298710931222304" />
@endsection
@section('content')
    <img src="{{ url('assets/img/cover_1600x460.jpg') }}" class="banner">
    <div class="view-wrapper pt-0">
        <!-- Container -->
        <div id="posts-feed" class="container">
            <div class="posts-feed-wrapper pt-4">
                <div class="columns">
                    
                    <div class="column is-3 is-hidden-mobile">
                                  
                    </div>
                    
                
                    
                    <div class="column is-6">
                        <x-post.create-post />
                    </div>

                    <div class="column is-3 is-hidden-mobile">
                                  
                    </div>

                </div>
                
                <div class="columns is-multiline">
                    <!--Post-->
                    @foreach($posts as $post)
                        <div class="column is-4 is-flex">
                            <x-post.single-post id="{{ $post->id }}"/>
                        </div>
                        
                    @endforeach
                    
                </div>
                <div class="columns">
                    
                    <div class="column is-3 is-hidden-mobile">
                                  
                    </div>
                    
                
                    
                    <div class="column is-6">
                        {{ $posts->links() }}
                    </div>

                    <div class="column is-3 is-hidden-mobile">
                                  
                    </div>

                </div>
            </div>
        </div>
        <!-- /Container -->
    </div>
@endsection
@section('scripts')
    @csrf
    @include('_includes.feed_post_script')
@endsection
