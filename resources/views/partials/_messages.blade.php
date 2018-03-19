@if (Session::has('success'))

    <div class="alert alert-success" role="alert">
        <strong>Powodzenie:</strong> {{ Session::get('success') }}
    </div>

@endif

@if(count($errors) > 0)
    <div class="aler alert-danger" role="alers">
        <strong>Błąd:</strong>
        <ul>
        @foreach ($errors->all() as $error)
           <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif