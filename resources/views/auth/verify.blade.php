@extends('layouts.app')
@section('title')
     Verifikasi Email
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Verifikasi Email</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">A fresh verification link has been sent to your email address</div>
                    @endif
                    <p>Before proceeding, please check your email for a verification link.If you did not receive the email,</p>
                    
                    <form id="email-form" action="{{ route('verification.resend') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            click here to request another
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection