@if($errors->any())
    <div class="notification is-danger is-light">
      <button class="delete"></button>
      {{$errors->first()}}
    </div>
@endif

@auth
    @if(Auth::user()->email_verified_at != NULL)
        <div class="create-post">
            <div class="flex-block modal-trigger box-shadow" data-modal="create-modal">
                <img src="{{ Helper::profilepic(Auth::id()) }}">
                <div class="flex-block-meta">
                    <span>Create Post</span>
                </div>
                
            </div>
        </div>
    @else
        <a href="{{ url('email/verify') }}" class="create-post">
            <div class="flex-block box-shadow">
                <img src="{{ Helper::profilepic(Auth::id()) }}">
                <div class="flex-block-meta">
                    <span>Create Post</span>
                   
                </div>
                <div class="go-button">
                    <i data-feather="arrow-right"></i>
                </div>
            </div>
        </a>
    @endif
@else
    <a href="{{ url('login') }}" class="create-post">
        <div class="flex-block box-shadow">
            <img src="{{ url('assets/img/profile_pics/user.jpg') }}">
            <div class="flex-block-meta">
                <span>Create Post</span>
               
            </div>
            <div class="go-button">
                <i data-feather="arrow-right"></i>
            </div>
        </div>
    </a>
@endauth
<!-- Create from feed modal -->
<!-- /partials/pages/feed/modals/share-modal.html -->
@auth
    <div id="create-modal" class="modal share-modal is-xsmall has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <form id="upload_form" method="POST" class="card" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="card-heading">
                    <h3>Create Post</h3>

                    <!-- Close X button -->
                    <div class="close-wrap">
                        <span class="close-modal">
                            <i data-feather="x"></i>
                        </span>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="field">
                        <label>Source of Click <small class="has-text-danger-dark">(name of book/publication/online article)</small></label>
                        <div class="control">
                            <input type="text" class="input" placeholder="Say source of the click ..." name="source_of_book" id="source_of_book" required>
                        </div>
                    </div>
                    <div class="field">
                        <label>Read For <small class="has-text-danger-dark">(optional)</small></label>
                        <div class="control">
                            <input type="text" class="input" placeholder="E.g Economy" name="read_for" id="country_name">
                            <div id="countryList">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Description</label>
                        <div class="control">
                            <input type="text" class="input" placeholder="Write Something {{ Auth::user()->name }}" name="description" id="source_of_book" required>
                        </div>
                    </div>
                    <div class="field">
                        <label>Click from the source <small class="has-text-danger-dark">(upload picture)</small></label>
                    </div>
                    <input type="file" class="dropify"  name="clicked_image" id="clicked_image" accept="image/*" style="height:100%;" data-max-file-size="2M" data-height="150" required>
                </div>
                
                <div class="card-footer">
                    
                    <div class="button-wrap">
                        <button type="button" id="cancel_btn" class="button is-solid dark-grey-button close-modal">Cancel</button>
                        <button type="submit" id="change_action" class="button is-solid primary-button">Publish</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endauth
<script type="text/javascript">
    var closebtn = document.getElementsByClassName("delete");
    $(document).on('click','.delete',() => {
        $(".notification").css("display","none");
    }); 
    $('#upload_form').on('submit', function(event){
        event.preventDefault();
        $("#cancel_btn").css("display","none");
        $("#change_action").attr("disabled","disabled");
        $("#change_action").html("Publishing...");
        $.ajax({
            url:"{{ route('create-post') }}",
            method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                if(data.message)
                {
                    $('#upload_form').find('input:text').val('');
                    $(".dropify-clear").trigger("click");
                    location.reload(); 
                }
            }
        });
    });
    $(document).ready(function(){
        $('#upload_form').find('input:text').val('');
        $(".dropify-clear").trigger("click");
        
        $('#country_name').keyup(function(){ 
            var query = $(this).val();
            if(!$(this).val()){
                $('#countryList').fadeOut(); 
            } 
            if(query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('readfor_list') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#countryList').fadeIn();  
                        $('#countryList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function(){  
            $('#country_name').val($(this).text());  
            $('#countryList').fadeOut();  
        });  

    });
</script>
<script type="text/javascript" src="{{ url('assets/js/dropify.min.js') }}"></script>
<script type="text/javascript" async>
  $(document).ready(function(){
    // Basic
    $('.dropify').dropify();
  });

</script>