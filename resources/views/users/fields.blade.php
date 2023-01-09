<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Agama Field -->
<div class="form-group col-sm-3">
    {!! Form::label('agama', __('models/users.fields.agama').':') !!}
    {!! Form::select('agama', array('Islam' => 'Islam', 'Protestan'=>'Protestan', 'Katholik'=>'Katholik', 'Hindu'=>'Hindu', 'Buddha'=>'Buddha', 'Khonghucu'=>'Khonghucu'), null, ['class' => 'form-control', 'placeholder'=>'Pilih Agama', 'required']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-3">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
    {!! Form::select('jenis_kelamin', array('L' => 'Laki-Laki', 'P'=>'Perempuan'), null, ['class' => 'form-control', 'placeholder'=>'Pilih Jenis Kelamin', 'required']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-3">
    {!! Form::label('tempat_lahir', __('models/users.fields.tempat_lahir').':') !!}
    {!! Form::text('tempat_lahir', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-3">
    {!! Form::label('tanggal_lahir', __('models/users.fields.tanggal_lahir').':') !!}
    {!! Form::date('tanggal_lahir', isset($user['tanggal-lahir'])&&!is_null($user['tanggal_lahir'])?$user->tanggal_lahir->format('Y-m-d'):null, ['class' => 'form-control','id'=>'tanggal_lahir', 'required']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#tanggal_lahir').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', __('models/users.fields.alamat').':') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Telepon Field -->
<div class="form-group col-sm-3">
    {!! Form::label('telepon', __('models/users.fields.telepon').':') !!}
    {!! Form::text('telepon', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- No Induk Field -->
<div class="form-group col-sm-3">
    {!! Form::label('no_induk', __('models/users.fields.no_induk').':') !!}
    {!! Form::text('no_induk', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', __('models/users.fields.foto').':') !!}
    {!! Form::file('foto', ['class' => 'form-control','maxlength' => 90,'maxlength' => 90, 'accept' => 'image/*', 'files'=>'true', 'style' => 'height:auto']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-12 m-0">
    <h4><span class="badge badge-warning">Isi Form Password Hanya Jika Ingin Mengganti Password!</span></h4>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password') !!}<span class="text-danger">*</span>
    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" placeholder="Change account password" name="password" tabindex="2">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Konfirmasi Password') !!}<span class="text-danger">*</span>
    <input id="password_confirmation" type="password" placeholder="Confirm changing account password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}" name="password_confirmation" tabindex="2">
</div>

<div class="form-group col-sm-4">
    <div class="row">
        {!! Form::label('s_role_id', 'Role Akses Diberikan',['class' => 'col-sm-4 label-control']) !!}
        <div class=" skin skin-flat">
            @foreach($sRoles as $item)
                <fieldset>
                    {!! Form::radio('s_role_id[]', $item->id, in_array($item->id, $roles)?true:false,['id'=>'input-'.$item->id]) !!}
                    <label for="input-{{$item->id}}" class="ml-1">{!! $item->name !!}</label>
                </fieldset>
            @endforeach
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
