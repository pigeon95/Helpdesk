@extends('main')

@section('title', '| Rejestracja')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rejestracja</h5>
                    <hr class="my-4">

                    {!! Form::open() !!}

                    {{ Form::label('name', "Tożsamość:") }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => '']) }}

                    {{ Form::label('email', "Email:") }}
                    {{ Form::text('email', null, ['class' => 'form-control', 'required' => '', 'type' => 'email']) }}

                    {{ Form::label('password', "Hasło:") }}
                    {{ Form::password('password', ['class' => 'form-control', 'required' => '', 'minlength' => '6', 'type' => 'password']) }}

                    {{ Form::label('password_confirmation', "Powtórz Hasło:") }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => '', 'equalto' => 'password', 'minlength' => '6']) }}

                    <br>
                    {{ Form::submit('Zarejestruj', ['class' => 'btn btn-primary btn-block']) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection