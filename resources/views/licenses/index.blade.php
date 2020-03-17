@extends('layouts.app')

@section('content')

<div class="container">

    <h1>User License</h1>
    <hr>

    <div class="row">
        @forelse($licenses as $license)
        @if ($loop->first)
            <div class="col">
                <h3>Doctor</h3>
                <small class="lead text-uppercase">{{ $license }}</small>
            </div>
            
        @endif

        @if($loop->last)
            <div class="col">
                <h3>Employee</h3>
                <small class="lead text-uppercase">{{ $license }}</small>
            </div>
            
        @endif
        
    @empty
        <li>No Hay Licencias</li>
    @endforelse
    </div>
    
@endsection