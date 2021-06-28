@extends('layouts.default')

@section('content')
    <div class="panel-body">
        {!! Form::open(['route' => 'admin.registerform.store','id' => 'registerform-form']) !!}
            @include('register_form.fields')
            <div class="form-group col-sm-12 text-center">
                {!! Form::submit('save', ['class' => 'btn btn-primary two-btns','id' => 'save-registerform']) !!}
                <a href="{!! route('admin.registerform.index') !!}" class="btn btn-danger">cancel</a>
            </div>
        {!! Form::close() !!}
    </div>
    {{-- <a href='#print-view-modal-div' data-document_type="" data-document_id="" onclick="printDocument(this)" class="document">dddd</a> --}}

@stop

@section('footer_scripts')
<script src="{{ asset('assets/pages/register-form.js') }}" ></script>
@stop
