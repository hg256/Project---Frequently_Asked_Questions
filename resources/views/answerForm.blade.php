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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-style">
                    <div class="card-header">Create Answer</div>
                    <div class="card-body">
                        @if($edit === FALSE)
                            {!! Form::model($answer, ['route' => ['answers.store', $question], 'method' => 'post']) !!}

                        @else()
                            {!! Form::model($answer, ['route' => ['answers.update', $question, $answer], 'method' => 'patch']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('body', 'Body') !!}
                            {!! Form::text('body', $answer->body, ['class' => 'form-control','required' => 'required']) !!}
                        </div>
                        <button class="btn btn-style float-right" value="submit" type="submit" id="submit">Save
                        </button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
