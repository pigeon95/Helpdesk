@extends('main')

@section('title', '| Lista zadań')

@section('content')

    <div class="row">
        @if( Auth::user()->hasrole('declarant'))
            <div class="col-md-10">
                <h1>Zgłoszone zadania</h1>
            </div>
            <div class="col-md-2">
                <a href="{{ route('tasks.create') }}" class="btn btn-lg btn-block btn-primary">Dodaj zadanie</a>
            </div>
        @else
            <div class="col-md-10">
                <h1>Wszystkie zadania</h1>
            </div>
        @endif
        <div class="col-md-12">
            <hr class="my-4">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-light">
                    <th>#</th>
                    <th>Tytuł</th>
                    <th>Opis</th>
                    <th>Dodał</th>
                    <th>Stowrzone</th>
                    <th>Edytowane</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody>

                @foreach ($tasks as $task)
                    @if ($task->status == 1)
                    <tr class="table-success">
                    @else
                    <tr class="table-danger">
                    @endif
                        <th>{{ $task->id }}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ substr($task->description, 0, 20)}}{{strlen($task->description) > 20 ? "..." : ""}}</td>
                        <td>{{ $task->user->name }}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>{{ $task->updated_at }}</td>
                        @if($task->status == true)
                            <td>Zrobione</td>
                        @else
                            <td>Do zrobienia</td>
                        @endif
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">Szczegóły</a>
                            @if( Auth::user()->hasrole('receiving') )
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-2">
                    Sortowanie:
                </div>
                <div class="col-md-10">
                    <a href="{{ route('tasks.index', ['status' => request('status'), 'sort' => 'desc']) }}">Od najnowszych</a> |
                    <a href="{{ route('tasks.index', ['status' => request('status'), 'sort' => 'asc']) }}">Od najstarszych</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    Status:
                </div>
                <div class="col-md-10">
                    <a href="/tasks?status=1">Zrobione</a> |
                    <a href="/tasks?status=0">Do zrobienia</a> |
                    <a href="/tasks">Wszystkie</a>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            {!! Form::open(['method'=>'GET','url'=>'tasks','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" placeholder="Wyszukaj...">
                <span class="input-group-btn">
                        <button class="btn btn-success-sm" type="submit">
                            Szukaj
                        </button>
                </span>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-3">
            <div class="float-right">
                {!! $tasks->links(); !!}
            </div>
        </div>
    </div>

@endsection