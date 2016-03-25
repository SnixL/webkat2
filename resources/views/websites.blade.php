@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Webseiten</div>

                <div class="panel-body">
                	@if (count($sites) > 0)
                        @foreach ($sites as $site)
                            <tr>
                                <td>
                                    <div>{{ $site->url }}</div>
                                </td>
    							<td>
                                    <div>{{ $site->title }}</div>
                                </td>
                                <td>
                                    <div>{{ $site->description }}</div>
                                </td>
                                <td>
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
