@extends('layouts.app')
@section('head-tag')
    <title> Owlrs | Create Club</title>
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

	                	@if($errors->any())
							<div class="notification is-danger" style="padding: 10px;">
								<button class="delete"></button>
								<strong>{{$errors->first()}}</strong>
							</div>
						@endif
						
	                	<form action="{{ route('create_club') }}" method="POST" class="card" enctype="multipart/form-data" autocomplete="off">
	                	    @csrf
	                	    <div class="card-heading">
	                	        <h2>Create a Club</h2>
	                	    </div>
	                	    
	                	    <div class="card-body">
	                	        <div class="field">
	                	            <label>Club name</label>
	                	            <div class="control">
	                	                <input type="text" class="input" placeholder="Say source of the click ..." name="club_name" id="club_name">
	                	            </div>
	                	        </div>
	                	        
	                	        <div class="field">
	                	            <label>Club Cover Pic <small class="has-text-danger-dark">(upload picture)</small></label>
	                	        </div>
	                	        <input type="file" class="dropify"  name="club_cover_pic" id="club_cover_pic" accept="image/*" style="height:100%;" data-max-file-size="2M" data-height="150">
	                	    </div>
	                	    
	                	    <div class="card-footer">
	                	        
	                	        <div class="button-wrap">
	                	
	                	            <button type="submit" id="change_action" class="button is-solid primary-button">Publish</button>
	                	        </div>
	                	    </div>
	                	</form>
	                </div>
	                <!-- Right side column -->
                    <div class="column is-3">
        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ url('assets/js/dropify.min.js') }}"></script>
    <script type="text/javascript" async>
      	$(document).ready(function(){
        	// Basic
        	$('.dropify').dropify();
      	});

      	$(document).on("click", ".delete", function(){
      		$(".notification").css("display", "none");
      	});
    </script>
@endsection