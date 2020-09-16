<div class="event-content">
    <div class="stats-wrapper">
        <div class="stats-header">
            <div class="avatar-wrapper">
                <img id="user-avatar-minimal" class="avatar" src="{{ Helper::profilepic($id) }}" style="position: relative;">
                @if(Auth::id() == $id)
                    <button class="button is-solid primary-button raised modal-trigger" data-modal="upload-crop-profile-modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    </button>
                @endif
            </div>
            <div class="user-info ml-5">
                <h4 style="text-align: center;">
                    OWLR
                </h4>
                <h4>{{ Helper::username($id) }}</h4>
                
                @if(Auth::id() != $id)
                    <div class="actions" id="follow_status{{ Hashids::connection('user')->encode($id) }}">
                        @auth
                            @if(Helper::follow_check(Auth::id(),$id))
                                
                                <button data-id="{{ Hashids::connection('user')->encode($id) }}" class="unfollow button is-solid primary-button raised font-weight-bold">Following</button>
                            @else
                                <button data-id="{{ Hashids::connection('user')->encode($id) }}" class="follow button is-solid primary-button raised font-weight-bold">Follow</button>
                            @endif
                        @else
                            <a href="{{ url('login') }}" class="button is-solid primary-button raised font-weight-bold">Follow</a>
                        @endauth
                        
                    </div>
                @endif
            </div>
            <div class="main-stats">
                <div class="stat-block is-centered">
                    <h4>Clicks</h4>
                    <p>{{ Helper::clicks_count($id) }}</p>
                </div>
                <div class="stat-block">
                    <h4>Followers</h4>
                    <p>{{ Helper::follow_count($id) }}</p>
                </div>
               
            </div>
        </div>         
    </div>           
</div>
<!-- Profile picture crop modal -->
<!--html/partials/pages/profile/timeline/modals/upload-crop-profile-modal.html-->
<div id="upload-crop-profile-modal" class="modal upload-crop-profile-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                <h3>Upload Picture</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                    <span class="close-modal">
                        <i data-feather="x"></i>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <label class="profile-uploader-box" for="upload-profile-picture">
                    <span class="inner-content">
                        <img src="assets/img/illustrations/profile/add-profile.svg" alt="">
                        <span>Click here to <br>upload a profile picture</span>
                    </span>
                    <input type="file" id="upload-profile-picture" accept="image/*">
                </label>
                <div class="upload-demo-wrap is-hidden">
                    <div id="upload-profile"></div>
                    <div class="upload-help">
                        <a id="profile-upload-reset" class="profile-reset is-hidden">Reset Picture</a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button id="submit-profile-picture" class="button is-solid accent-button is-fullwidth raised is-disabled">Use Picture</button>
            </div>
        </div>

    </div>
</div>
@csrf
<!-- Cover image crop modal -->
<script type="text/javascript">
    //Pofile picture cropper
    var readFile = function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function () {
                    imgSrc = e.target.result;
                });
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            swal("Sorry - you're browser doesn't support the FileReader API");
        }
    };

    

    var imgSrc = '';
    var $uploadCrop = $('#upload-profile').croppie({
        enableExif: true,
        url: 'assets/img/demo/placeholder.png',
        viewport: {
          width: 130,
          height: 130,
          type: 'circle'
        },
        boundary: {
          width: '100%',
          height: 300
        }
    });
    $('#upload-profile-picture').on('change', function () {
        readFile(this);
        $(this).closest('.modal').find('.profile-uploader-box, .upload-demo-wrap, .profile-reset').toggleClass('is-hidden');
        $('#submit-profile-picture').removeClass('is-disabled');
    });
    $('#submit-profile-picture').on('click', function (ev) {
        var $this = $(this);
        $this.addClass('is-loading');
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport',
            format: 'jpeg'
        }).then(function (resp) {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('update_profile_pic') }}",
                method:"POST",
                data:{profile_pic:resp, _token:_token},
                success:function(data){
                    if(data) {
                        location.reload();
                    }
                }
            });
            
        });
    });
    $('#profile-upload-reset').on('click', function () {
        $(this).addClass('is-hidden');
        $('.profile-uploader-box, .upload-demo-wrap').toggleClass('is-hidden');
        $('#submit-profile-picture').addClass('is-disabled');
        $('#upload-profile-picture').val('');
    });
</script>