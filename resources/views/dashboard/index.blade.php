@extends('layout')
@section('page-content')
    <div>
        <h1 class="dark:text-white">
            Welcome {{auth()->user()->name}} .
            <form id="logout-form" action="{{route('dashboard.logout')}}" method="POST">
                @csrf
            </form>
            <button form="logout-form"  type="submit" class="btn btn-info">Logout</button>
        </h1>
    </div>
@stop
