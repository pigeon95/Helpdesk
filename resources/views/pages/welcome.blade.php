@extends('main')

@section('content')
    <div class="jumbotron">

        <div class="row">
            <div class="col-md-5">
                <img src="{{ asset('images/logo.png') }}" width="400" height="400"/>
            </div>

            <div class="col-md-7">
                <h1 class="display-4">Helpdesk</h1>
                <p class="lead">Aplikacja, służąca do zgłaszania zadań dla działu IT.</p>
            </div>

        </div>

        @if( !Auth::user())
        <hr class="my-4">

        <div class="row">
            <div class="col-md-6">
                <p>Aby wejść do systemu, musisz się zalogować.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Zaloguj</a>
                </p>
            </div>

            <div class="col-md-6">
                <p>Nie masz jeszcze konta? Dokonaj rejestracji.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Zarejestruj</a>
                </p>
            </div>
        </div>
        @endif
    </div>
@endsection