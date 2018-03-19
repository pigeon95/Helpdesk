@extends('main')

@section('title', '| Edytuj Zadanie')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'PUT']) !!}

            <h1>{{ $task->title }}</h1>

            <p class="lead">{{ $task->description }}</p>

            <p class="lead"><a href='{{ asset("files/$task->file_path") }}'>{{ $task->file_path }}</a></p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-md-6"> Dodał: </dt>
                        <dd class="col-md-6"> {{ $task->user->name }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-6"> Stworzone dnia: </dt>
                        <dd class="col-md-6"> {{ $task->created_at }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-6"> Ostatnia edycja: </dt>
                        <dd class="col-md-6"> {{ $task->updated_at }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-6"> Status: </dt>
                        <dd class="col-md-6">
                            <input type="radio" class="flat" name="status"  value=0
                                    {{ $task->status == 0 ? 'checked' : '' }} > Do zrobienia
                        </dd>
                        <dd class="col-md-6 offset-md-6">
                            <input type="radio" class="flat" name="status"  value=1
                                    {{ $task->status == 1 ? 'checked' : '' }} > Zrobione
                        </dd>

                    </dl>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('tasks.show', 'Zakończ', array($task->id), array('class' => 'btn btn-danger btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Zapisz', ['class' => 'btn btn-success btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
            <div id="comment-form" class="col-md-12">
                {{ Form::open(['route' => ['comments.store', $task->id], 'method' => 'POST']) }}

                {{ Form::label('comment', "Komentarz:") }}
                {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => "3", 'required' => '']) }}
                <br>
                {{ Form::submit('Dodaj Komentarz', ['class' => 'btn btn-success']) }}

                {{ Form::close() }}
                <br>
            </div>
        <div class="col-md-12">
            <h5>Komentarze:</h5>
            @foreach($task->comments as $comment)
                <div class="comment">
                    <div class="card">
                        <div class="card-body">
                            {{ $comment->comment }}
                            <footer class="blockquote-footer"><cite title="Source Title">Obsługa Helpdesk</cite></footer>
                        </div>
                    </div>
                    <br>
                    {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}

                    {{ Form::submit('Usuń komentarz', ['class' => 'btn btn-danger']) }}

                    {!! Form::close() !!}
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection