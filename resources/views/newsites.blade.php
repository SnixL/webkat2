@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default text-center">
                <div class="panel-heading text-left">Neue Webseiten</div>

                <div class="panel-body text-left">
                	@if (count($sites) > 0)
                        @foreach ($sites as $site)
                        	<div class="panel-body">
                                <div class="table-text col-md-3"><a href="{{ $site->url }}" target="_blank">BILD</a></div>
                                <div class="table-text col-md-9">
                                    <a href="{{ $site->url }}" target="_blank">{{ $site->title }}</a><br /><br />
                                    {{ $site->description }}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
               {!! $sites->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
