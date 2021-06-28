@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="form-group m-3">
            <a href="{{route('admin.registerform.create')}}" class="btn btn-info"> Create </a>
        </div>
    </div>
    <table class="table table-striped table-bordered" id="register-form-table" style="width:100%">

        <thead class="thead-dark">
            <tr>
                <td> S.NO </td>
                <td> Date </td>
                <td> Name </td>
                <td> Email Id </td>
                <td> Mobile No </td>
                <td> Description </td>
                <td> Action </td>
            </tr>
        </thead>

    </table>
@stop
@section('footer_scripts')
<script  type="text/javascript" src="{{ asset('assets/pages/register-form.js') }}" ></script>
@stop
