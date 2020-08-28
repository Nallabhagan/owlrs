@foreach($favourites as $favourite)

<div class="columns">
    <div class="column is-8">

        <div class="basic-infos-wrapper pt-0">
            <div class="card is-profile-info box-shadow border mb-3">
                <div class="info-row">
                    <div>
                        <span>The Authors you read the most</span>
                        @if($favourite->author_read_most != NULL)
                            @foreach($favourite->author_read_most as $list)
                                <p class="is-inverted">{{ $list }}</p>
                            @endforeach
                        @else
                            <p class="is-inverted">Not yet specified</p>
                        @endif
                    </div>
                    @auth
                        @if(Auth::id() == $id)
                            <i class="mdi mdi-pencil small-fab share-fab modal-trigger" style="cursor: pointer;" data-modal="edit_author"></i>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="card is-profile-info box-shadow border mb-3">
                <div class="info-row">
                    <div>
                        <span>Favourite Books</span>
                        @if($favourite->favourite_book != NULL)
                            
                            @foreach($favourite->favourite_book as $list)
                                <p class="is-inverted">{{ $list }}</p>
                            @endforeach
                        @else
                            <p class="is-inverted">Not yet specified</p>
                        @endif
                    </div>
                    @auth
                        @if(Auth::id() == $id)
                            <i class="mdi mdi-pencil small-fab share-fab modal-trigger" style="cursor: pointer;" data-modal="edit_book"></i>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="card is-profile-info box-shadow border mb-3">
                <div class="info-row">
                    <div>
                        <span>Favourite Quotes</span>
                        @if($favourite->favourite_quotes != NULL)
                            @foreach($favourite->favourite_quotes as $list)
                                <p class="is-inverted">{{ $list }}</p>
                            @endforeach
                            
                        @else
                            <p class="is-inverted">Not yet specified</p>
                        @endif
                    </div>
                    @auth
                        @if(Auth::id() == $id)
                            <i class="mdi mdi-pencil small-fab share-fab modal-trigger" style="cursor: pointer;" data-modal="edit_quote"></i>
                        @endif
                    @endauth
                </div>
            </div>

        </div>
    </div>
</div>
@endforeach
<div id="edit_author" class="modal share-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                
                <h3>Author</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                    <span class="close-modal">
                        <i data-feather="x"></i>
                    </span>
                </div>
            </div>
            
            <div class="card-body">
                <form action="{{ route('favourite_author') }}" method="POST">
                    @csrf
                    <table id="dynamic_field" class="mb-3">  
                        @php
                            $i = 0;
                        @endphp
                        @if($favourite->author_read_most != NULL)
                            @foreach($favourite->author_read_most as $list)
                                
                                <tr id="row{{ $i }}">  
                                    <td class="field"> 
                                        <span class="control">
                                            <input type="text" name="author[]" value="{{ $list }}" placeholder="Enter Author Name" class="input" id="author{{ $i }}" required/>
                                        </span>
                                    </td>  
                                    <td class="ml-3">
                                        @if($i == 0)
                                            <button type="button" name="add" id="add" class="button is-solid is-success is-small">+</button>
                                        @else
                                            <button type="button" name="remove" id="{{ $i }}" class="button is-solid is-danger btn_remove">X</button>
                                        @endif
                                    </td> 
                                    @php
                                        $i++;
                                    @endphp 
                                </tr> 
                            @endforeach
                        @else
                            <tr id="row{{ $i }}">  
                                <td class="field"> 
                                    <span class="control">
                                        <input type="text" name="author[]" placeholder="Enter Author Name" class="input" id="author{{ $i }}" required/>
                                    </span>
                                </td>  
                                <td class="ml-3">
                                    @if($i == 0)
                                        <button type="button" name="add" id="add" class="button is-solid is-success is-small">+</button>
                                    @else
                                        <button type="button" name="remove" id="{{ $i }}" class="button is-solid is-danger btn_remove">X</button>
                                    @endif
                                </td> 
                                @php
                                    $i++;
                                @endphp 
                            </tr> 
                        @endif
                         
                    </table>  
                    <button type="submit" class="button is-solid primary-button">Submit </button>      
                </form>  
            </div>
            
        </div>

    </div>
</div>
<div id="edit_book" class="modal share-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                
                <h3>Book</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                    <span class="close-modal">
                        <i data-feather="x"></i>
                    </span>
                </div>
            </div>
            
            <div class="card-body">
                <form action="{{ route('favourite_book') }}" method="POST">
                    @csrf
                    <table id="book_dynamic_field" class="mb-3">  
                        @php
                            $i = 0;
                        @endphp
                        @if($favourite->favourite_book != NULL)
                            @foreach($favourite->favourite_book as $list)
                                
                                <tr id="row{{ $i }}">  
                                    <td class="field"> 
                                        <span class="control">
                                            <input type="text" name="book[]" value="{{ $list }}" placeholder="Enter Book Name" class="input" id="book{{ $i }}" required/>
                                        </span>
                                    </td>  
                                    <td class="ml-3">
                                        @if($i == 0)
                                            <button type="button" name="add" id="addbook" class="button is-solid is-success is-small">+</button>
                                        @else
                                            <button type="button" name="remove" id="{{ $i }}" class="button is-solid is-danger btn_remove">X</button>
                                        @endif
                                    </td> 
                                    @php
                                        $i++;
                                    @endphp 
                                </tr> 
                            @endforeach
                        @else
                            <tr id="row{{ $i }}">  
                                <td class="field"> 
                                    <span class="control">
                                        <input type="text" name="book[]" placeholder="Enter Book Name" class="input" id="book{{ $i }}" required/>
                                    </span>
                                </td>  
                                <td class="ml-3">
                                    @if($i == 0)
                                        <button type="button" name="add" id="addbook" class="button is-solid is-success is-small">+</button>
                                    @else
                                        <button type="button" name="remove" id="{{ $i }}" class="button is-solid is-danger btn_remove">X</button>
                                    @endif
                                </td> 
                                @php
                                    $i++;
                                @endphp 
                            </tr> 
                        @endif
                         
                    </table>  
                    <button type="submit" class="button is-solid primary-button">Submit </button>      
                </form>  
            </div>
            
        </div>

    </div>
</div>
<div id="edit_quote" class="modal share-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                
                <h3>Quotes</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                    <span class="close-modal">
                        <i data-feather="x"></i>
                    </span>
                </div>
            </div>
            
            <div class="card-body">
                <form action="{{ route('favourite_quote') }}" method="POST">
                    @csrf
                    <table id="quote_dynamic_field" class="mb-3">  
                        @php
                            $i = 0;
                        @endphp
                        @if($favourite->favourite_quotes != NULL)
                            @foreach($favourite->favourite_quotes as $list)
                                
                                <tr id="row{{ $i }}">  
                                    <td class="field"> 
                                        <span class="control">
                                            <input type="text" name="quote[]" value="{{ $list }}" placeholder="Enter Quote" class="input" id="quote{{ $i }}" required/>
                                        </span>
                                    </td>  
                                    <td class="ml-3">
                                        @if($i == 0)
                                            <button type="button" name="add" id="addquote" class="button is-solid is-success is-small">+</button>
                                        @else
                                            <button type="button" name="remove" id="{{ $i }}" class="button is-solid is-danger btn_remove">X</button>
                                        @endif
                                    </td> 
                                    @php
                                        $i++;
                                    @endphp 
                                </tr> 
                            @endforeach
                        @else
                            <tr id="row{{ $i }}">  
                                <td class="field"> 
                                    <span class="control">
                                        <input type="text" name="quote[]" placeholder="Enter Quote" class="input" id="quote{{ $i }}" required/>
                                    </span>
                                </td>  
                                <td class="ml-3">
                                    @if($i == 0)
                                        <button type="button" name="add" id="addquote" class="button is-solid is-success is-small">+</button>
                                    @else
                                        <button type="button" name="remove" id="{{ $i }}" class="button is-solid is-danger btn_remove">X</button>
                                    @endif
                                </td> 
                                @php
                                    $i++;
                                @endphp 
                            </tr> 
                        @endif
                         
                    </table>  
                    <button type="submit" class="button is-solid primary-button">Submit </button>      
                </form>  
            </div>
            
        </div>

    </div>
</div>

<script>  
$(document).ready(function(){  
    var i=0;  
    $('#add').click(function(){  
        if($("#author"+i).val() != "") {
            i++;  
            $('#dynamic_field').append('<tr id="row'+i+'"><td class="field"><span class="control"><input class="input" type="text" name="author[]" placeholder="Enter Author Name" class="form-control name_list" id=author"'+i+'" required/></span></td><td><button type="button" name="remove" id="'+i+'" class="button is-solid is-danger btn_remove">X</button></td></tr>');
        } else {
            alert("Enter Author Name");
        }
            
    });
    $('#addbook').click(function(){  
        if($("#book"+i).val() != "") {
            i++;  
            $('#book_dynamic_field').append('<tr id="row'+i+'"><td class="field"><span class="control"><input class="input" type="text" name="book[]" placeholder="Enter Book Name" class="form-control name_list" id=book"'+i+'" required/></span></td><td><button type="button" name="remove" id="'+i+'" class="button is-solid is-danger btn_remove">X</button></td></tr>');
        } else {
            alert("Enter Book Name");
        }
            
    });
    $('#addquote').click(function(){  
        if($("#quote"+i).val() != "") {
            i++;  
            $('#quote_dynamic_field').append('<tr id="row'+i+'"><td class="field"><span class="control"><input class="input" type="text" name="quote[]" placeholder="Enter Quote" class="form-control name_list" id=quote"'+i+'" required/></span></td><td><button type="button" name="remove" id="'+i+'" class="button is-solid is-danger btn_remove">X</button></td></tr>');
        } else {
            alert("Enter Quote");
        }
            
    });  
    $(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id");   
        $('#row'+button_id+'').remove();  
    });  
    
});  
</script>
