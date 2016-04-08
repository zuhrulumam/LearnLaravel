@extends('master')
@section('title', 'Read Blog Post')

@section('content')

<!-- single -->
<div class="single-page-artical">
    <div class="artical-content">
        <h3>{{ $post->blog_title }}</h3>
        <img class="img-responsive" src="{!! asset('images/user/banner.jpg') !!}" alt=" " />
        <p>{{ $post->blog_content }}</p>
        <?php
        $url = urlencode(request()->fullUrl());
        $description = $post->blog_content; 
        $hashtags = "web, development";
        ?>
    </div>
    <div class="artical-links">
        <ul>
            <li><small> </small><span>{{ date("m F Y", strtotime($post->created_at)) }}</span></li>
            <li><a href="#"><small class="admin"> </small><span>{{ $post->blog_created_by }}</span></a></li>
            <li><a href="#"><small class="no"> </small><span>No comments</span></a></li>
            <li><a href="#"><small class="posts"> </small><span>View posts</span></a></li>
            <li class="social-buttons">

                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}&title={{ $description }}"
                   target="_blank">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ $url }}&text={{ $description }}&hashtags={{ $hashtags }}"
                   target="_blank">
                    <i class="fa fa-twitter-square"></i>
                </a>
                <a href="https://plus.google.com/share?url={{ $url }}"
                   target="_blank">
                    <i class="fa fa-google-plus-square"></i>
                </a>
                <a href="https://pinterest.com/pin/create/button/?{{ 
       http_build_query([
            'url' => $url,
//            'media' => $image,
            'description' => $description
        ])
                   }}" target="_blank">
                    <i class="fa fa-pinterest-square"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="comment-grid-top">
        <h3>Responses</h3>
        @foreach($post->comments as $comment)
        <div class="comments-top-top">
            <div class="top-comment-left">
                <a href="#"><img class="img-responsive" src="{!! asset('images/user/co.png') !!}" alt=""></a>
            </div>
            <div class="top-comment-right">
                <ul>
                    <li><span class="left-at"><a href="#">{{ $comment->comment_created_by }}</a></span></li>
                    <li><span class="right-at">{{ date('m F, Y', strtotime($comment->created_at)) }}</span></li>
                    <li><a class="reply" href="#">REPLY</a></li>
                </ul>
                <p>{{ $comment->comment_content }} </p>
            </div>
            <div class="clearfix"> </div>
        </div>
        @endforeach
    </div>			
    <div class="artical-commentbox">
        <h3>leave a comment</h3>
        @if(session('message'))

        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success !</strong> {{session('message')}}  
        </div>

        @endif
        <div class="table-form">
            <form method="post">
                {{ csrf_field() }}
                <input type="text" class="textbox" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'Name';
                        }" name="comment_created_by">
                <input type="text" class="textbox" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'Email';
                        }" name="email">

                <textarea value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'Message';
                        }" name="comment_content">Message</textarea>	
                <input type="submit" value="Send">
            </form>
        </div>
    </div>	
</div>
<!-- single -->
@endsection

@section('js')
<script>

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function (e) {

        var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
                'width=' + popupSize.width + ',height=' + popupSize.height +
                ',left=' + verticalPos + ',top=' + horisontalPos +
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>
@endsection

