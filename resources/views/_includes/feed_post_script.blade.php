<script type="text/javascript">
    @auth
        $(document).on('click', '.like-button', function(event){
            event.preventDefault();
            var post_token = $(this).attr("post-token");
            var hoot_type = $(this).attr("hoot_type");
            
            if(hoot_type == "Hoot")
            {
                $(this).removeAttr("hoot_type");
                $(this).attr("hoot_type","UnHoot");
            } else {
                $(this).removeAttr("hoot_type");
                $(this).attr("hoot_type","Hoot");
            }
            $(this).toggleClass('is-active');

            $.ajax({
                url: "{{ route('hoot-post') }}",
                method: "POST",
                data:{
                    "post_token": post_token,
                    "hoot_type": hoot_type,
                    '_token': $('input[name=_token]').val()
                }
            });
        });
        $(document).on('click', '.commentForm', function() {
            // event.preventDefault();
            var formId = $(this).attr("id");
            var Comment = $(".addComment"+formId).val();
            if(Comment === ""){
                alert("Enter Comment");
            }else{
                $.ajax({
                    url: "{{ route('comments') }}",
                    method: "POST",
                    data: {
                        "comment": Comment,
                        "post_token": formId,
                        '_token': $('input[name=_token]').val()
                    },
                    success:function(data){
                        if(data.errors)
                        {
                            $(".error").html(data.errors[0]);
                        }
                        else
                        {
                            $(".addComment"+formId).val("");
                            $("#comments_list"+formId).append('<div class="media is-comment">\
                                <div class="media-left">\
                                    <div class="image">\
                                        <img src="{{ Helper::profilepic(Auth::id()) }}">\
                                    </div>\
                                </div>\
                                <div class="media-content">\
                                    <a href="{{ url('user') }}/{{ Hashids::connection('user')->encode(Auth::id()) }}">{{ Helper::username(Auth::id()) }}</a>\
                                    <span class="time">1 seconds ago</span>\
                                    <p>'+data+'</p>\
                                </div>\
                            </div>');
                        }
                    }
                });
            }
        });
        $(document).on("click", ".delete_post", function(event){
            event.preventDefault();
            var post_token = $(this).attr("post-token");
            $.ajax({
                url: "{{ route('delete') }}",
                method: "POST",
                data: {
                    "post_token": post_token,
                    '_token': $('input[name=_token]').val()
                },
                success:function(data){
                    if(data == true) {
                        $("#feed-post"+post_token).hide();
                    } 
                }
            });
        });

    @endauth
    //Toggle comments
    $('.fab-wrapper.is-comment, .close-comments').on('click', function (e) {
        $(this).addClass('is-active').closest('.card').find('.content-wrap, .comments-wrap').toggleClass('is-hidden');
        var jump = $(this).closest('.is-post');
        var new_position = $(jump).offset();
        console.log(new_position);
        $('html, body').stop().animate({
          scrollTop: new_position.top - 70
        }, 500);
        e.preventDefault();
        setTimeout(function () {
          $('.emojionearea-editor').val('');
        }, 400);
    });
</script>