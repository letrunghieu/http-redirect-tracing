@extends('layouts.master')

@section('content')
<h1 id="page-title" class="text-center">
@lang('app.http redirect tracing')
</h1>
<div class="row">
    <div class="col-md-8 col-md-offset-2 text-center">
        {!! Form::open(['action' => 'AppController@process']) !!}
        <div class="form-group form-group-lg">
        {!! Form::text('url', null, ['class' => 'form-control input-lg', 'placeholder' => trans('form.enter your url here')]) !!}
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit"> 
                <i class="glyphicon glyphicon-ok"></i>
                <span>
                @lang('form.submit')
                </span>
            </button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop