@extends('layouts.app')

@push('prestyles')
{{ Html::style('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}
{{ Html::style('vendor/fileinput/css/fileinput.min.css') }}
@endpush

@section('page-content')
<section class="content-header">
    <h1>Upload Excel</h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Excel</li>
    </ol>
</section>

<div class="content">
    <div class="row">
        {{ Form::open(['url' => route('excel.handle'), 'role'  => 'form', 'files' => true, 'autocomplete'=>'off']) }}
            <div class="col-md-12">
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
                <div class="box box-primary animated @if (count($errors) > 0) jello @else fadeInUp @endif">
                    <div class="box-header with-border text-center">
                        <div class="form-group">
                            <label class="control-label">Select Testcase File</label>
                            <input id="excel_upload" name="excel_upload" type="file" class="file-loading">
                        </div>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>

                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection

@push('prescripts')
{{ Html::script('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}

{!! Html::script('vendor/fileinput/js/fileinput.min.js') !!}
{!! Html::script('assets/js/main.js') !!}
@endpush
