@extends('layouts.app')

@push('prestyles')
{{ Html::style('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}
@endpush

@section('page-content')
<section class="content-header">
    <h1>Crop Image</h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Crop image</li>
    </ol>
</section>

<div class="content">
    <div class="row">
        {{ Form::open(['url' => route('image.handle'), 'role'  => 'form', 'files' => true, 'autocomplete'=>'off']) }}
            <div class="col-md-6">
                <div class="box box-primary animated @if (count($errors) > 0) jello @else fadeInUp @endif">
                    <div class="box-header with-border">
                        <a href="javascript:window.history.back()" class="btn btn-default btn-sm" ><i class="fa fa-arrow-circle-left"></i> Back</a>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> handle</button>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            {{ Form::label('image', 'Image', ['class'=>'control-label']) }}
                            <div class="fileinput fileinput-new"  data-provides="fileinput">
                                <div class="thumbnail fileinput-preview" data-trigger="fileinput">
                                    {!! Html::image( asset('assets/img/app/no_image.jpg'), '', ['height' => '250']) !!}
                                </div>
                                <div>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    <div class="btn btn-default btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        {!! Form::file('image') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Params</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    {{ Form::text('width', null, ['class' => 'form-control', 'placeholder' => 'Width']) }}
                                </div>
                                <div class="col-sm-6">
                                    {{ Form::text('height', null, ['class' => 'form-control', 'placeholder' => 'Height']) }}
                                </div>
                            </div>
                        </div>
                        <div class="from-group">
                            <h4><b>Save</b></h4>
                            <label class="radio-inline">{!! Form::radio('extension', 1, true ) !!}  default</label>
                            <label class="radio-inline">{!! Form::radio('extension', 2 ) !!}  jpg</label>
                            <label class="radio-inline">{!! Form::radio('extension', 3 ) !!}  png</label>
                            <label class="radio-inline">{!! Form::radio('extension', 4 ) !!}  gif</label>
                        </div>
                        <div class="form-group text-center">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('download', true, null) }} Download when submit
                                </label>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <a href="javascript:window.history.back()" class="btn btn-default btn-sm" ><i class="fa fa-arrow-circle-left"></i> Back</a>
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> handle</button>
                        </div>
                        <div class="form-group text-center">
                            <h4>Result {{ $width or '0' }} x {{ $height or '0' }}</h4>
                            {!! HTML::image( (isset($imageResize)) ? $imageResize :  asset('assets/img/app/no_image.jpg'),'', ['height' => '250']) !!}
                        </div>
                        @if (isset($imageResize) && $imageResize)
                        <div class="form-group text-center">
                            <a href="{{ $imageResize }}" download="{{ $fileName }}" class="btn btn-primary btn-sm" ><i class="fa fa-download"></i> Download</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection

@push('prescripts')
{{ Html::script('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}
@endpush
