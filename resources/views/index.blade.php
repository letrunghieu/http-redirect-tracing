@extends('layouts.master')

@section('content')
<div id="index-page">
    <h1 id="page-title" class="text-center">
        <img src="{{ asset('img/http-redirect-tracing-logo.png') }}" alt="logo" width="256" height="256" class="logo"/>
        @lang('app.http redirect tracing')
    </h1>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            {!! Form::open(['action' => 'AppController@process']) !!}
            <p class="description text-muted">
                @lang('app.enter an URL and see details how many times the browser redirect you')
            </p>
            <div class="form-group form-group-lg url-input">
                {!! Form::text('url', null, ['class' => 'form-control input-lg', 'placeholder' => trans('form.enter your url here'), 'required' => true]) !!}
                <button type='reset'>
                    <i class='fa fa-remove'></i>
                </button>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submit"> 
                    <i class="fa fa-check"></i>
                    <span>
                        @lang('form.submit')
                    </span>
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop