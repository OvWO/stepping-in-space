@extends('layouts.app')

@section('content')
    {{ $task->title }}
    {{ $task->complete }}
    <a href="">EDIT</a>
    <a href="">DELETE</a>
@endsection