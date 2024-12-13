@extends('layouts.app')

@section('content')
<ul>
    @foreach ($views as $view)
        <li>
            {{$view->created_at}}
        </li>
    @endforeach
</ul>
<ul>
    @foreach ($messages as $message)
        <li>
            {{$message->created_at}}
        </li>
    @endforeach
</ul>
@endsection
