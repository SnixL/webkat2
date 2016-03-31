@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default text-center">
                <div class="panel-heading text-left">Dashboard</div>

                <div class="panel-body text-left">
                    Hallo {{ Auth::user()->name }}, willkommen auf deinem Dashboard!
                    
                    
                    <a href="{{ url('/mysites') }}">Meine Seiten</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
