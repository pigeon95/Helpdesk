@extends('main')

@section('title', '| Dodaj Zadanie')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Dodaj nowe zadanie</h1>
            <hr class="my-4">
            {!! Form::open(array('route' => 'tasks.store', 'files' => true)) !!}
                {{ Form::label('title', 'Tytuł:') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

                {{ Form::label('description', 'Opis:') }}
                {{ Form::textarea('description', null, array('class' => 'form-control', 'required' => '')) }}

                {{ Form::label('file_path', 'Plik:') }}
                {{ Form::file('file_path', array('class' => 'form-control-file')) }}

                {{ Form::submit('Dodaj', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection