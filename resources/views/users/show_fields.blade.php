<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="form-group">
    {!! Form::label('email_verified_at', __('models/users.fields.email_verified_at').':') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', __('models/users.fields.password').':') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Remember Token Field -->
<div class="form-group">
    {!! Form::label('remember_token', __('models/users.fields.remember_token').':') !!}
    <p>{{ $user->remember_token }}</p>
</div>

<!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', __('models/users.fields.foto').':') !!}
    <p>{{ $user->foto }}</p>
</div>

<!-- Agama Field -->
<div class="form-group">
    {!! Form::label('agama', __('models/users.fields.agama').':') !!}
    <p>{{ $user->agama }}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', __('models/users.fields.alamat').':') !!}
    <p>{{ $user->alamat }}</p>
</div>

<!-- Telepon Field -->
<div class="form-group">
    {!! Form::label('telepon', __('models/users.fields.telepon').':') !!}
    <p>{{ $user->telepon }}</p>
</div>

<!-- Tempat Lahir Field -->
<div class="form-group">
    {!! Form::label('tempat_lahir', __('models/users.fields.tempat_lahir').':') !!}
    <p>{{ $user->tempat_lahir }}</p>
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group">
    {!! Form::label('tanggal_lahir', __('models/users.fields.tanggal_lahir').':') !!}
    <p>{{ $user->tanggal_lahir }}</p>
</div>

<!-- No Induk Field -->
<div class="form-group">
    {!! Form::label('no_induk', __('models/users.fields.no_induk').':') !!}
    <p>{{ $user->no_induk }}</p>
</div>

