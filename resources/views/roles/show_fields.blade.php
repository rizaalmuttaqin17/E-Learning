<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/roles.fields.name').':') !!}
    <p>{{ $roles->name }}</p>
</div>

<!-- Guard Name Field -->
<div class="form-group">
    {!! Form::label('guard_name', __('models/roles.fields.guard_name').':') !!}
    <p>{{ $roles->guard_name }}</p>
</div>

