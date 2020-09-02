<script type="text/javascript">
    $(document).on('click','.follow',function(){
        var following_id = $(this).attr("data-id");
        $("#follow_status"+following_id).html('<button data-id="'+following_id+'" class="unfollow button is-solid primary-button raised font-weight-bold">Following</button>');
        $.ajax({
            url: "{{ route('follow') }}",
            method: "POST",
            data: {
                "following_id": following_id,
                "_token": $('input[name=_token]').val()
            },
            success:function(data){
            }
        });
    });

    $(document).on('click','.unfollow',function(){
        var following_id = $(this).attr("data-id");

        $("#follow_status"+following_id).html('<button data-id="'+following_id+'" class="follow button is-solid primary-button raised font-weight-bold">Follow</button>');
        $.ajax({
            url: "{{ route('unfollow') }}",
            method: "POST",
            data: {
                "following_id": following_id,
                "_token": $('input[name=_token]').val()
            },
            success:function(data){
            }
        });
    });
</script>