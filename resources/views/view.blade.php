@extends('layouts.master')

@section('content')
<h1 id="page-title" class="text-center">
{{ $inputUrl }}
</h1>
<div class="row">
    <div class="form-group">
        <div class="col-sm-3">
            <button class="btn btn-primary btn-block">
                <i class="glyphicon glyphicon-ok"></i>
                <span>
                @lang('form.submit')
                </span>
            </button>
        </div>
        <div class="col-sm-9">
            {!! Form::text('url', $inputUrl, ['class' => 'form-control', 'placeholder' => trans('form.enter your url here')]) !!}
        </div>
    </div>
</div>
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
@stop