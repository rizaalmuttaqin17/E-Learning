@extends('layouts.auth_app')
@section('title')
Register
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h4>Register</h4>
    </div>

    <div class="card-body pt-1">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">Nama Lengkap :</label><span class="text-danger">*</span>
                        <input id="firstName" type="text"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" tabindex="1"
                            placeholder="Enter Full Name" value="{{ old('name') }}" autofocus required>
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_induk">NIM/NIDK/NIDN :</label><span class="text-danger">*</span>
                        <input id="no_induk" type="number"
                            class="form-control{{ $errors->has('no_induk') ? ' is-invalid' : '' }}" name="no_induk"
                            tabindex="1" value="{{ old('no_induk') }}" required autofocus>
                        <div class="invalid-feedback">
                            {{ $errors->first('no_induk') }}
                        </div>
                    </div>
                </div>
                <!-- Agama Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('agama', __('models/users.fields.agama').':') !!}<span class="text-danger">*</span>
                    {!! Form::select('agama', array('Islam' => 'Islam', 'Protestan'=>'Protestan',
                    'Katholik'=>'Katholik', 'Hindu'=>'Hindu', 'Buddha'=>'Buddha', 'Khonghucu'=>'Khonghucu'), null,
                    ['class' => 'form-control', 'placeholder'=>'Pilih Agama', 'required']) !!}
                </div>

                <!-- Jenis Kelamin Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}<span class="text-danger">*</span>
                    {!! Form::select('jenis_kelamin', array('L' => 'Laki-Laki', 'P'=>'Perempuan'), null, ['class' =>
                    'form-control', 'placeholder'=>'Pilih Jenis Kelamin', 'required']) !!}
                </div>

                <!-- Tempat Lahir Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('tempat_lahir', __('models/users.fields.tempat_lahir').':') !!}<span class="text-danger">*</span>
                    {!! Form::text('tempat_lahir', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <!-- Tanggal Lahir Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('tanggal_lahir', __('models/users.fields.tanggal_lahir').':') !!}<span class="text-danger">*</span>
                    {!! Form::date('tanggal_lahir', null, ['class' => 'form-control datepicker','id'=>'tanggal_lahir', 'required']) !!}
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email : </label><span class="text-danger">*</span>
                        <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="Enter Email address" name="email" tabindex="1" value="{{ old('email') }}"
                            required autofocus>
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" class="control-label">Password : </label><span
                            class="text-danger">*</span>
                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}"
                            placeholder="Set account password" name="password" tabindex="2" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation" class="control-label">Confirm Password : </label><span
                            class="text-danger">*</span>
                        <input id="password_confirmation" type="password" placeholder="Confirm account password"
                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}"
                            name="password_confirmation" tabindex="2">
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Register
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="mt-5 text-muted text-center">
    Sudah Punya Akun? <a href="{{ route('login') }}">Masuk disini</a>
</div>
@endsection