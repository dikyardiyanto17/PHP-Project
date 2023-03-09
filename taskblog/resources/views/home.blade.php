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
        <!-- Styles -->
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");
            body{
                background-color: #eee;
                font-family: "Poppins", sans-serif;
                font-weight: 300
            }
            .card{
                border:none
            }
            .ellipsis{
                color: #a09c9c
            }
            hr{
                color: #a09c9c;
                margin-top: 4px;
                margin-bottom: 8px
            }
            .muted-color{
                color: #a09c9c;font-size: 13px
            }
            .ellipsis i{
                margin-top: 3px;
                cursor: pointer
            }
            .icons i{
                font-size: 25px
            }
            .icons .fa-heart{
                color: red
            }
            .icons .fa-smile-o{
                color: yellow;
                font-size: 29px
            }
            .rounded-image{
                border-radius: 50%!important;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 50px;
                width: 50px
            }
            .name{
                font-weight: 600
            }
            .comment-text{
                font-size: 12px
            }
            .status small{
                margin-right: 10px;
                color: blue
            }
            .form-control{
                border-radius: 26px
            }
            .comment-input{
                position: relative
            }
            .fonts{
                position: absolute;
                right: 13px;
                top:8px;
                color: #a09c9c
            }
            .form-control:focus{
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
                    <label for="exampleFormControlTextarea1" class="form-label" style="margin: 20px auto;">New Post</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1"  style="width: 500px;" rows="3"></textarea>
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
                                <span class="font-weight-bold">Jeanette Sun</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2">20 mins</small> <i class="fa fa-ellipsis-h"></i> </div>
                    </div>
                    <div class="p-2">
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row muted-color"> 
                                    <span>2 comments</span>
                                </div>
                            </div>
                        <hr>
                        <div class="comments">
                            <div class="d-flex flex-row mb-2">
                                <div class="d-flex flex-column ml-2"> <span class="name">Daniel Frozer</span> <small class="comment-text">I like this alot! thanks alot</small>
                                    <div class="d-flex flex-row align-items-center status"><small>18 mins</small> </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-2">  
                                <div class="d-flex flex-column ml-2"> <span class="name">Elizabeth goodmen</span> <small class="comment-text">Thanks for sharing!</small>
                                     <div class="d-flex flex-row align-items-center status"><small>8 mins</small> </div>
                                  </div>
                                </div>
                                <div class="comment-input">
                                    <input type="text" class="form-control">
                                    <div class="fonts"> <i class="fa fa-camera"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
