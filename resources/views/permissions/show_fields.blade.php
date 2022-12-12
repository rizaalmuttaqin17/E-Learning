<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/permissions.fields.name').':') !!}
    <p>{{ $permissions->name }}</p>
</div>

<!-- Guard Name Field -->
<div class="form-group">
    {!! Form::label('guard_name', __('models/permissions.fields.guard_name').':') !!}
    <p>{{ $permissions->guard_name }}</p>
</div>

