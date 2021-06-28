
<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            {!! Form::label('name', 'Name')!!}: 
            {!! Form::text('name', null,  ['placeholder' => 'enter name', 'required' => 'required', 'class' => 'form-control'] ) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('Email Id', 'Email ID')!!}: 
            {!! Form::email('email_id', null,  ['placeholder' => 'enter email id', 'required' => 'required', 'class' => 'form-control'] ) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('mobile', 'Mobile')!!}: 
            {!! Form::text('mobile_no', null,  ['placeholder' => 'enter mobile', 'required' => 'required', 'class' => 'form-control', 'onkeypress' => 'javascript:return isNumber(event)'] ) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('descrption', 'Description')!!}: 
            {!! Form::textarea('description', null,  ['placeholder' => 'enter description', 'required' => 'required', 'class' => 'form-control'] ) !!}
        </div>
        <div class="col-md-6" style="margin-top: -150px">
            <input id="file_upload" name="file" type="file" 
                       multiple 
                       data-allow-reorder="true"
                       data-max-file-size="3MB"
                       data-max-files="3"
                      >
            {{-- {!! Form::file('file', null,  ['placeholder' => 'upload file','class' => 'form-control','multiple' => 'multiple'] ) !!} --}}
        </div>
    </div>
</div>
<br>

      