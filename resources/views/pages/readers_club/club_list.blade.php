@extends('layouts.app')
@section('head-tag')
    <title> Owlrs | Readers Clubs</title>
@endsection
@section('content')
	<div class="view-wrapper">
	    
	  
	    
	    <!-- Container -->
	    <div class="container">
	    
	        <div class="question-content is-large">
	            <!-- /html/partials/global/placeload/questions/questions-shadow-dom-categories.html -->
	            <div id="questions-shadow-dom-categories" class="columns">
	                <div class="column">
	                    <div class="categories-header is-block has-text-centered" style="padding: 10px 0px;margin-bottom: 0px;">
	                        <h2>Welcome to Readers Club</h2>
	                        @auth
	                        	@if(Auth::id() == 1)
	                        		<a href="{{ url('reader_club/create_club') }}">Create </a>
	                        	@endif
	                        @endauth
	                    </div>
	                    
	                </div>
	            </div>
	            
	        </div>
	    	
	    	<div class="news-grid">
	    	    @foreach($clubs as $club)
	    	    	<div class="news-card is-default">
	    	    		
	    	    		<img src="{{ url('assets/clubs') }}/{{ $club->image }}">
	    	    		<div class="news-content">
	    	    			<h3 class="news-title">{{ $club->name }}</h3>
	    	    			<div class="button-wrap">
	    	    				<a href="{{ url('reader_club') }}/{{ $club->slug }}" class="button">Contribute Clicks</a>
	    	    			</div>
	    	    		</div>
	    	    	</div>

	    	    @endforeach
	    	</div>
	    </div>
	</div>
@endsection