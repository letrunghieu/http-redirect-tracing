@extends('layouts.master')

@section('content')
<div id='result-page'>
    <h1 id="page-title" class="text-center">
        @if($effectiveUrl)
        @lang('app.:effective is the effective url of :url', ['url' => $inputUrl, 'effective' => $effectiveUrl])
        @else
        @lang('app.tracing result of :url', ['url' => $inputUrl])
        @endif
    </h1>
    {!! Form::open(['action' => 'AppController@process']) !!}
    <div class="form-group">
        <div class='row'>
            <div class="col-sm-8 col-sm-offset-2">
                <div class="col-sm-9">
                    <div class="url-input">
                        {!! Form::text('url', $inputUrl, ['class' => 'form-control', 'placeholder' => trans('form.enter your url here')]) !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-primary btn-block">
                        <i class="glyphicon glyphicon-ok"></i>
                        <span>
                            @lang('form.submit')
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    @if($effectiveUrl)
    <div id="result">
        <div class="row">
            <div class="col-sm-3">
                @lang('app.effective url')
            </div>
            <div class="col-sm-9">
                {{ $effectiveUrl }}
            </div>
        </div>
    </div>

    <div id="history">
        @foreach($history as $count => $h)
        <div class="row">
            <div class="col-sm-3">
                <span class="circle {{ $h['statusCode'] >= 300 ? 'redirect' : 'ok' }}">
                    {{ $h['statusCode'] }}
                </span>
            </div>
            <div class="col-sm-9">
                {{ $h['url'] }}
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@stop