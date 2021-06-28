@extends('layouts.default')
@section('content')
    <div class="panel-body">
        {!! Form::model($registration, ['route' => ['admin.registerform.update', $registration->id], 'method' => 'patch', 'id' => 'update-registerform']) !!}
            @include('register_form.fields')
            @include('register_form.documents')
            <input type="hidden" name="registration_id" id="registration_id" value={{$registration->id}} /> 
            <div class="form-group col-sm-12 text-center">
                {!! Form::submit('save', ['class' => 'btn btn-primary two-btns','id' => 'save-registerform']) !!}
                <a href="{!! route('admin.registerform.index') !!}" class="btn btn-danger">cancel</a>
            </div>
        {!! Form::close() !!}
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
