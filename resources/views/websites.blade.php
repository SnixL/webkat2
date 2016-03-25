@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Webseiten</div>

                <div class="panel-body">
                	@if (count($sites) > 0)
                    	<table>
                        @foreach ($sites as $site)
                            <tr>
                                <td class="table-text col-md-3">
                                    <div>{{ $site->url }}</div>
                                </td>
    							<td class="table-text col-md-3">
                                    <div>{{ $site->title }}</div>
                                </td>
                                <td class="table-text col-md-6">
                                    <div>{{ $site->description }}</div>
                                </td>
                                <td>
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
