@extends('layouts.app')
<style> 
    .bgstyle{
        padding-bottom: 11rem!important;
    }
    .navbar-laravel {
        background-color: White !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
    }
    .nav-link {
        color: rgba(0,0,0,.9)!important;
    }
    .pb-4, .py-4{
        background: darkslategrey!important;

    }
    .card-style{
        width: 30rem;
        margin-left: 30rem;
    }
    .btn-style {
        color: white;
        background-color: green;
        border-color: #495057;
    }
    .font-style {
        font-weight: bold;
        line-height: 1.3;
        color: #333;
        font-size: 22px;
    }
</style>
@section('content')
    <div class="bgstyle">
        <div class="card card-style">
            <div class="card-body">
                <img class="card-img-top" src="https://images.pexels.com/photos/132340/pexels-photo-132340.jpeg?cs=srgb&dl=bright-bulb-dark-132340.jpg&fm=jpg" width="480" height="340" alt="Card image cap">
                <br/>
                <br/>
                <h2 class="font-style">What is your question?</h2>
                <p class="card-text">
                @if($edit === FALSE)
                    {!! Form::model($question, ['action' => 'QuestionController@store']) !!}
                @else()
                    {!! Form::model($question, ['route' => ['questions.update', $question->id], 'method' => 'patch']) !!}
                @endif
                <div class="form-group">
                    {!! Form::text('body', $question->body, ['class' => 'form-control','required' => 'required']) !!}
                </div>
                </p>
                <button  value="submit" type="submit" id="submit" class="btn btn-style">Save  </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection










