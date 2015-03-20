@extends('layouts.master')

@section('content')
<div id='result-page'>
    <h1 id="page-title" class="text-center">
        @if($effectiveUrl)
        @lang('app.:effective is the effective url of', ['effective' => $effectiveUrl])
        @else
        @lang('app.tracing result of :url', ['url' => $inputUrl])
        @endif
    </h1>
    {!! Form::open(['action' => 'AppController@process']) !!}
    <div class="form-group">
        <div class='row'>
            <div class="col-sm-8 col-sm-offset-2">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="url-input">
                            {!! Form::text('url', $inputUrl, ['class' => 'form-control', 'placeholder' => trans('form.enter your url here'), 'required' => true]) !!}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-primary btn-block">
                            <i class="fa fa-check"></i>
                            <span>
                                @lang('form.submit')
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    @if($effectiveUrl)
    <div id="history">
        @foreach($history as $count => $h)
        <div class="row">
            <div class="col-sm-12">
                <div class="http-request {{ $h['statusCode'] < 300 ? 'success' : 'warning' }}">
                    <span class="http-status-code label label-{{ $h['statusCode'] < 300 ? 'success' : 'warning' }}">
                        {{ $h['statusCode'] }}
                    </span> 
                    <span class="http-request-url">
                        {{ $h['url'] }}
                    </span>
                </div>
                <div class="http-header">
                    <table class="table table-bordered table-condensed">
                        @foreach($h['header'] as $name => $value)
                        <tr class="{{ $name == 'Location' ? 'highlight' : '' }}">
                            <th scope="row">
                                {{ $name }}
                            </th>
                            <td>
                                {{ implode(', ', $value) }}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div id="error-detail">
        <p class="alert alert-danger text-center">
            {{ $error }}
        </p>
        @if (isset($response))
        <pre class="error-reponse">{{ $response }}</pre>
        @endif
    </div>
    @endif
</div>
@stop