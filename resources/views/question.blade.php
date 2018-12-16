@extends('layouts.app')
<style>
    .card-style {
        margin-top: 0;
        border: 1px solid #efefef;
        background-color: #fff;
        border-radius: 4px;
        border-bottom: 1px solid #e2e2e2;
        margin-bottom: 8px;
        padding: 16px;
    }
    .card-header {
        background-color: white !important;
    }


    .card-footer {
        background-color: white !important;
    }
    .btn-style {
        margin-left: 8px;
        min-width: 96px;
        white-space: nowrap;
        -webkit-user-select: none;
        -webkit-touch-callout: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
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
</style>
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card card-style">
                    <div class="card-header">
                        <div class="float-left">
                         <span style="font-size: 20px; color: darkslategray;">
                                    <i class="fas fa-user-circle" ></i>  {{$question->user_name}}
                                    </span>
                        </div>
                        <div class="float-right">
                         Answers({{ $question->answers()->count() }})
                        </div>
                    </div>
                    <div class="card-body">
                        {{$question->body}}
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-style float-right"
                           href="{{ route('questions.edit',['id'=> $question->id])}}">
                            Edit Question
                        </a>

                        {{ Form::open(['method'  => 'DELETE', 'route' => ['questions.destroy', $question->id]])}}
                        <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a class="btn btn-style float-left"
                                                href="{{ route('answers.create', ['question_id'=> $question->id])}}">
                            Click to Answer
                        </a></div>

                    <div class="card-body">
                        @forelse($question->answers as $answer)
                            <div class="card card-style">
                                @if($answer->best_reply == FALSE)
                                    <div class="card-header" >
                                        <div class="float-left">
                                            <span style="font-size: 20px; color: darkgreen;">
                                            <i class="fas fa-user-circle" ></i>  {{$answer->user_name}}
                                            </span>
                                        </div>
                                    </div>
                                @else()
                                    <div class="card-header" style="background-color: lightgreen !important;" >
                                        <div class="float-left">
                                            <span style="font-size: 20px; color: black;">
                                            <i class="fas fa-user-circle" ></i>  {{$answer->user_name}}
                                            </span>
                                        </div>
                                        <div class="float-right">
                                            <i class="fas fa-check"></i> Marked as Best Answer
                                        </div>
                                    </div>
                                @endif


                                <div class="card-body">
                                    {{$answer->body}}
                                </div>
                                <div class="card-footer">
                                    <div>
                                        {{ Form::open(['method'  => 'DELETE', 'route' => ['answers.destroy', $question, $answer->id]])}}
                                        <button class="btn btn-style-danger float-left mr-2" value="submit" type="submit" id="submit">Delete
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                    <a class="btn btn-style float-left" href="{{ route('answers.edit',['question_id'=> $question, 'answer_id'=> $answer->id, ])}}">
                                        Edit Answer
                                    </a>


                                    @if($userId == $question->user_id && $question->isBest == FALSE)
                                    <div>
                                        {{ Form::open(['method'  => 'STORE', 'route' => ['best-replies.store', $question, $answer]])}}
                                        <button class="btn btn-style-danger float-right mr-2" value="submit" type="submit" id="submit">Best Answer?
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                    @else()
                                        <!--Hide the Best Answer Button -->
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="card">

                                <div class="card-body"> No Answers</div>
                            </div>
                        @endforelse


                    </div>
                </div>
            </div>
@endsection
