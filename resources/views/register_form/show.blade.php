@extends('layouts.default')
@section('content')
    <div class="panel-body">
        
        <div class="row">
            <div class="col-md-6">
                {!! Form::label('name', 'Name')!!}: 
                {{$registration->name}}
            </div>
            <div class="col-md-6">
                {!! Form::label('Email Id', 'Email ID')!!}: 
                {{$registration->email_id}}
            </div>
            <div class="col-md-6">
                {!! Form::label('mobile', 'Mobile')!!}: 
                {{$registration->mobile_no}}
            </div>
            <div class="col-md-6">
                {!! Form::label('descrption', 'Description')!!}: 
                {{$registration->description}}
            </div>
        </div>
        <br>

        @include('register_form.documents')
    </div>
    @include('register_form.print_modal')
@stop

@section('footer_scripts')

<script src="{{ asset('assets/pages/register-form-edit.js') }}" ></script>

<script>
    $('#document-table').DataTable( {
        order: [[ 0, "desc" ]]
    });
</script>
@stop
