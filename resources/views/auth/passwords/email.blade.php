@extends('layouts.auth')

@section('auth-title', 'รีเซ็ตรหัสผ่าน')
@section('auth-subtitle', 'กรุณากรอกอีเมลเพื่อรีเซ็ตรหัสผ่าน')

@section('content')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('อีเมล') }}</label>
                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('ส่งลิงก์รีเซ็ตรหัสผ่าน') }}
                            </button>
                            
                            @if (Route::has('login'))
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('กลับไปเข้าสู่ระบบ') }}
                                </a>
                            @endif
                        </div>
                    </form>
@endsection
