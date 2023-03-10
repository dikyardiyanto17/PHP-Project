<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");


        body {
            background-color: #56baed;
            font-family: "Poppins", sans-serif;
            font-weight: 300
        }

        .card {
            border: none
        }

        .ellipsis {
            color: #a09c9c
        }

        hr {
            color: #a09c9c;
            margin-top: 4px;
            margin-bottom: 8px
        }

        .muted-color {
            color: #a09c9c;
            font-size: 13px
        }

        .ellipsis i {
            margin-top: 3px;
            cursor: pointer
        }

        .icons i {
            font-size: 25px
        }

        .icons .fa-heart {
            color: red
        }

        .icons .fa-smile-o {
            color: yellow;
            font-size: 29px
        }

        .rounded-image {
            border-radius: 50% !important;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            width: 50px
        }

        .name {
            font-weight: 600
        }

        .comment-text {
            font-size: 12px
        }

        .status small {
            margin-right: 10px;
            color: blue
        }

        .form-control {
            border-radius: 26px
        }

        .comment-input {
            position: relative
        }

        .fonts {
            position: absolute;
            right: 13px;
            top: 8px;
            color: #a09c9c
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #8bbafe;
            outline: 0;
            box-shadow: none
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <div class="mb-3">
                <a href="/logout"><button type="submit" class="btn btn-danger" style="margin: 10px auto;">Logout</button></a>
                <form method="POST" action="/post" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex align-items-center justify-content-center">
                        <label for="exampleFormControlTextarea1" class="form-label" style="margin: 20px auto;">New Post</label>
                    </div>
                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" style="width: 500px;" rows="3" placeholder="Tell About Yourself..."></textarea>
                    @error('content')
                    <div class="alert alert-danger">You cannot post empty text</div>
                    @enderror
                    <div class="d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary" style="margin: 10px auto;">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($data as $post)
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/editpost/{{$post->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" style="width: 400px; margin: 0px auto;" rows="3">{{$post->content}}</textarea>
                        @error('content')
                        <div class="alert alert-danger">You cannot post empty text</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="d-flex justify-content-between p-2 px-3">
                        <div class="d-flex flex-row align-items-center">
                            <div class="d-flex flex-column ml-2">
                                <span class="font-weight-bold">{{$post-> user->name}}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row mt-1 ellipsis">
                            <small class="mr-2">{{$post -> created_at -> format('D M Y')}}</small>
                            <!-- data-toggle="modal" data-target="#ModalCreate" -->
                            @if ($post -> user -> id == Auth::user()->id)
                            <a href="#" data-toggle="modal" data-target="#exampleModal{{$post->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="/deletepost/{{$post->id}}" style="margin-left: 10px;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="p-2">
                        <p class="text-justify">{{$post -> content}}</p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row muted-color">
                                <span>{{sizeof($post->comments)}} comments</span>
                            </div>
                        </div>
                        <hr>
                        <div class="comments">
                            @foreach ($post->comments as $com)
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2{{$com->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="/editcomment/{{$post->id}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" style="width: 400px; margin: 0px auto;" rows="3">{{$com->comment}}</textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-2">
                                <div class="d-flex flex-column ml-2"> <span class="name">{{$com -> user -> name}}</span> <small class="comment-text">{{$com -> comment}}</small>
                                    <div class="d-flex flex-row align-items-center status">
                                        <small>{{$com -> created_at -> format('D M Y')}}</small>
                                        @if ($com -> user_id == Auth::user()->id)
                                        <a href="#" style="margin: auto;" data-toggle="modal" data-target="#exampleModal2{{$com->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="/deletecomment/{{$com->id}}" style="margin-left: 20px;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="comment-input">
                                <form method="POST" action="/comment/{{$post-> id}}">
                                    @csrf
                                    <input type="text" class="form-control" name="comment" placeholder="Comment..">

                                    <div class="fonts"><button type="submit" style="padding: 0; border:none; background:none;"><i class="fa fa-commenting"></i></button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="d-flex align-items-center justify-content-center">
        {{ $data->links() }}
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
</script>

</html>