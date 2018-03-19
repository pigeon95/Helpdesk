@extends('main')

@section('title', '| Logowanie')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Logowanie</h5>
                    <hr class="my-4">

                    {!! Form::open() !!}

                    {{ Form::label('emal', 'Email:') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'required' => '', 'type' => 'email']) }}

                    {{ Form::label('password', "Hasło:") }}
                    {{ Form::password('password', ['class' => 'form-control', 'required' => '', 'minlength' => '6']) }}

                    <br>
                    {{ Form::checkbox('remember') }}{{Form::label('remember', "Zapamiętaj mnie")}}

                    <br>
                    {{ Form::submit('Zaloguj', ['class' => 'btn btn-primary btn-block']) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection