@extends('main')

@section('content')
    <center><h2>{{ $exception->getMessage() }}</h2></center>
@endsection