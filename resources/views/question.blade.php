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
            <div class="col-md-8">
                <div class="card card-style">
                    <div class="card-header">
                        Please find the list of Answers({{ $question->answers()->count() }}) on the right side for the Question Id - {{$question->id}}
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

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><a class="btn btn-style float-left"
                                                href="{{ route('answers.create', ['question_id'=> $question->id])}}">
                            Click to Answer
                        </a></div>

                    <div class="card-body">
                        @forelse($question->answers as $answer)
                            <div class="card">
                                <div class="card-body">{{$answer->body}}</div>
                                <div class="card-footer">

                                    <a class="btn btn-style float-right"
                                       href="{{ route('answers.show', ['question_id'=> $question->id,'answer_id' => $answer->id]) }}">
                                        View
                                    </a>

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
