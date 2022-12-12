<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/roles.fields.name').':') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Guard Name Field -->
<div class="form-group">
    {!! Form::label('guard_name', __('models/roles.fields.guard_name').':') !!}
    <p>{{ $role->guard_name }}</p>
</div>

