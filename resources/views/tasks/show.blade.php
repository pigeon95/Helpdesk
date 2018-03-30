@extends('main')

@section('title', '| Zadanie')

@section('content')

    <div class="row">
        <div class="col-md-8">
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
                        <dt class="col-md-6"> Status zadania: </dt>
                        @if($task->status == true)
                            <dd class="col-md-6">Zrobione</dd>
                        @else
                            <dd class="col-md-6">Do zrobienia</dd>
                        @endif
                    </dl>
                    @if(Auth::user()->hasrole('receiving') || (Auth::user()->hasrole('declarant') && $task->user == Auth::user()))
                    <hr class="my-4">
                    <div class="row">
                        @if( Auth::user()->hasrole('receiving'))
                        <div class="col-sm-6">
                            {!! Html::linkRoute('tasks.edit', 'Edytuj', array($task->id), array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                        @endif
                        <div class="col-sm-6">
                            {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'DELETE']) !!}

                            {{ Form::submit('Usuń', ['class' => 'btn btn-danger btn-block']) }}

                            {!! Form::close() !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12">

            <h5>Komentarze:</h5>
            @foreach($task->comments as $comment)
                <div class="comment">
                    <div class="card">
                        <div class="card-body">
                            {!!$comment->comment !!}
                            <footer class="blockquote-footer"><cite title="Source Title">{{ $comment->user->name }}</cite></footer>
                        </div>
                    </div>
                    <br>
                </div>
            @endforeach
        </div>
    </div>

@endsection