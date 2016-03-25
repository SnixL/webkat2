@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Webseite eintragen</div>

                <div class="panel-body">
                    {!! Form::open(array('action' => 'SiteController@create', 'method' => 'post', 'class' => 'form-horizontal')) !!}
                   		{!! csrf_field() !!}
                     
                        <div class="form-group{{ $errors->has('site_url') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Domain / URL:</label>
    
                                <div class="col-md-6">
                   					<input type="text" class="form-control" name="site_url" size="70" value="{{ old('site_url') }}" />
                                    <button class="btn" name="load_meta" value="1">
                                    	<i class="fa fa-btn fa-refresh"></i> Metadaten laden
                               		</button>
                                
                                @if ($errors->has('site_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Title:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="site_title" value="{{ old('site_title') }}" />

                                @if ($errors->has('site_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('site_description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Description:</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="site_description" cols="85" rows="5">{{ old('site_title') }}</textarea>

                                @if ($errors->has('site_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('site_keywords') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Keywords:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="site_keywords" value="{{ old('site_keywords') }}" />

                                @if ($errors->has('site_keywords'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site_keywords') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" >
                                    <i class="fa fa-btn fa-save"></i> Webseite jetzt eintragen
                                </button>
                            </div>
                        </div>
                	{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
