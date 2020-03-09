@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <ul>
            @foreach ($users as $user)
                  <li>$user->name</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection