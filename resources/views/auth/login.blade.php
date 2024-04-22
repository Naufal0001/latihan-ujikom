@extends('layouts.auth')

@section('login')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome back!</h1>
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <div class="has-feedback @error('email') has-error @enderror">
                                                <input class="form-control form-control-lg" type="email" name="email"
                                                    placeholder="Enter your email" required value="{{ old('email') }}"
                                                    autofocus />
                                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                @error('email')
                                                    <span class="help-block">{{ $message }}</span>
                                                @else
                                                    <span class="help-block with-errors"></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="has-feedback @error('password') has-error @enderror">
                                                <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password"/>
                                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                @error('password')
                                                    <span class="help-block">{{ $message }}</span>
                                                @else
                                                    <span class="help-block with-errors"></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-check align-items-center">
                                                <input id="customControlInline" type="checkbox" class="form-check-input icheck"
                                                    value="remember-me" name="remember-me" checked>
                                                <label class="form-check-label text-small"
                                                    for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
@endsection
