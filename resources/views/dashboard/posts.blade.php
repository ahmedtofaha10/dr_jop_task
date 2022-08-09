@extends('layout')
@section('page-content')
    <div>
        <h1 class="dark:text-white">
            Your Latest Posts.
        </h1>
        <livewire:posts-list/>
    </div>
@stop
