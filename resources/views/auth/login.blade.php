@extends('layouts.layouts')
@section('title', 'Login')

@section('content')
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="container px-3">
            <div class="row col col-lg-6 mx-auto justify-content-center">
                <div class="card shadow w-75 py-3 px-2 bg-light-600">
                    <div class="card-body">
                        <div class="title">
                            <h3 class="display-5 mb-5 text-center">User Login</h3>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success mb-0">{{ session()->get('success') }}</div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger mb-0">{{ session()->get('error') }}</div>
                        @endif
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label for="inputEmail" class="col-form-label">Email:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="inputEmail" class="form-control" placeholder="Email Address"
                                        autofocus>
                                    @error('inputEmail')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-form-label">Password:</label>
                                <div class="col-sm-12">
                                    <input type="password" minlength="12" name="inputPassword" class="form-control  border-0 inputstyle"
                                        placeholder="Password">
                                    @error('inputPassword')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4 row">
                                <div class="col-sm-12 ">
                                    <button type="submit" name="Submit" class="btn btn-red text-white fw-bold form-control  border-0 inputstyle"
                                        id="Submit">LOGIN</button>
                                </div>
                            </div>
                            <div class="mt-4 row">
                                <div class="col-sm-12 ">
                                    <p>Don't have an account? <a href="{{ route('register') }}"
                                            class="text-decoration-none">Register here</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
