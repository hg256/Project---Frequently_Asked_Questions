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
        transition: opacity ease-in-out 100ms, color ease-in-out 100ms, background-color ease-in-out 100ms, border-color ease-in-out 100ms;
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
    .btn-style-danger {
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
        background: red;
        color: #fff;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-style">
                    <div class="card-header">Answer</div>
                    <div class="card-body">
                        {{$answer->body}}
                    </div>
                    <div class="card-footer">
                        <div>
                        {{ Form::open(['method'  => 'DELETE', 'route' => ['answers.destroy', $question, $answer->id]])}}
                        <button class="btn btn-style-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                        </div>
                        <a class="btn btn-style float-right" href="{{ route('answers.edit',['question_id'=> $question, 'answer_id'=> $answer->id, ])}}">
                            Edit Answer
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
