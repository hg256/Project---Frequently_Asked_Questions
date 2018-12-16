@extends('layouts.app')

<style>
    .bgstyle {
        padding-bottom: 14rem !important;
    }

    .navbar-laravel {
        background-color: White !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
    }

    .nav-link {
        color: rgba(0, 0, 0, .9) !important;
    }

    .checklist-row-striked {
        text-decoration: line-through;
    }
    .custom_padding{
        padding-top: 5px;
    }

    .sidenav {
        margin-left: 30px;
        margin-top: 117px;
        width: 270px;
        position: fixed;
        z-index: 1;
        top: 20px;
        left: 10px;
        overflow-x: hidden;

    }
    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        padding: 2px;
    }

    .btn-style {
        margin-left: 8px;
        min-width: 96px;
        white-space: nowrap;
        box-sizing: border-box;
        border-radius: 3px;
        box-shadow: 0 1px 1px 0 rgba(200, 200, 200, 0.2);
        display: inline-block;
        font-weight: 500;
        outline: 0;
        padding: 3px 7px 4px 7px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        border: 1px solid #b92b27;
        background: green;
        color: #fff;
    }

    .font-style {
        font-weight: bold;
        line-height: 1.3;
        color: #333;
        font-size: 22px;

    }

    .zero-style {
        padding: 0;
        border: none;
        background: none;
    }

    .headerstyle {
        padding-left: 11px;
        padding-right: 21px;
    }

    .card-header {
        background-color: white !important;
    }

    .card-footer {
        background-color: white !important;
    }

    .page-item.active .page-link {
        color: black !important;
        background-color: transparent !important;
        border-color: black !important;
    }

    .card-style {
        margin-top: 0;
        border: 1px solid #efefef;
        background-color: #fff;
        border-radius: 4px;
        border-bottom: 1px solid #e2e2e2;
        margin-bottom: 4px;
        padding: 10px;
    }
</style>
<script>
    window.toggleChevron = function (button) {
        $(button).find('i').toggleClass('far fa-thumbs-up fas fa-thumbs-up');
    }
    window.toggleChevron2 = function (button) {
        $(button).find('i').toggleClass('far fa-thumbs-down fas fa-thumbs-down');
    }

    function shareURL() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        document.execCommand("copy");

    }
</script>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="headerstyle">
                    <a class="btn btn-style" href="{{ route('questions.create') }}">
                        Create a Question
                    </a>
                </div>
                @forelse($questions as $question)
                    <div class="card-body">
                        <div class="card text-center card-style">
                            <div class="card-header">
                                <div class="float-left">
                                    <span style="font-size: 20px; color: darkslategray;">
                                    <i class="fas fa-user-circle" ></i>  {{$question->user_name}}
                                    </span>
                                </div>
                                <div class="float-right">
                                    Answers: {{ $question->answers()->count() }}
                                </div>

                            </div>
                            <div class="card-body">

                                <h5 class="card-title" id="myInput">{{$question->body}}</h5>
                                <p class="card-text">Updated: {{ $question->created_at->diffForHumans() }}</p>
                                <a href="{{ route('questions.show', ['id' => $question->id]) }}" class="btn btn-style">View</a>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="grid-container">

                                    <div class="grid-item custom_padding">
                                        <a href="https://plus.google.com/share?url=https://www.google.com/search?q={{$question->body}}">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                    </div>
                                    <div class="grid-item custom_padding">
                                        <a href="https://twitter.com/intent/tweet?url=https://www.google.com/search?q={{$question->body}}">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </div>
                                    <div class="grid-item custom_padding">
                                        <a href="https://www.facebook.com/sharer.php?u=https://www.google.com/search?q={{$question->body}}">
                                            <i class="fab fa-facebook">
                                            </i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    There are no questions to view, you can  create a question.
                @endforelse
            </div>
            <dil class="card-footer">
                <div class="float-right">
                    {{$questions->links()}}
                </div>
            </dil>

        </div>
        <div class="sidenav">
            <div class="card card-style">
                <div class="card-header">
                    Improve your Feed (Prototype)
                </div>
                <div class="card-body">
                    <div class="checklist-row-striked">
                        <i class="fas fa-check"></i> Visit your Feed <br/>
                        <i class="fas fa-check"></i> Follow Topics <br/>
                        <i class="fas fa-check"></i> Find relevant Answers <br/>
                        <i class="fas fa-check"></i> Ask your first question <br/>
                    </div>
                    <div>
                        <li>Share your answer on social platform <br/>
                        </li>
                        <li>Answer a question <br/>
                        </li>
                        <li>Upvote/downvote for an answer <br/>
                        </li>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
