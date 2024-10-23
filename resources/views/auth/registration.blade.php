@extends('layouts.layouts')
@section('title', 'Register')

@section('content')
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="container px-3">
            <div class="row col col-lg-6 mx-auto justify-content-center">
                <div class="card shadow w-75 py-3 px-2 bg-light-600">
                    <div class="card-body justify-content-md-center">
                        <div class="title">
                            <h3 class="display-5 mb-5 text-center">User Register</h3>
                        </div>
                        @if (session()->has('error'))
                            <div class="alert alert-danger mb-0" role="error">{{ session()->get('error') }}</div>
                        @endif
                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <div class="mb-2 row">
                                <label for="inputFullname" class="col-form-label">Fullname:</label>
                                <div class="col-sm-12 form-group">
                                    <input type="text" name="inputFullname" class="form-control border-0 inputstyle" id="staticEmail"
                                        placeholder="Enter Fullname" autofocus>
                                    @error('inputFullname')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputEmail" class="col-form-label">Email:</label>
                                <div class="col-sm-12">
                                    <input type="email" name="inputEmail" class="form-control border-0 inputstyle" id="staticEmail"
                                        placeholder="Email Address">
                                    @error('inputEmail')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputPassword" class="col-form-label">Password:</label>
                                <div class="col-sm-12">
                                    <input type="password" name="inputPassword" class="form-control border-0 inputstyle" id="inputPassword"
                                        placeholder="Password">
                                    @error('inputPassword')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputConfirmPassword" class="col-form-label">Confirm Password:</label>
                                <div class="col-sm-12">
                                    <input type="password" name="inputConfirmPassword" class="form-control border-0 inputstyle"
                                        id="inputPassword" placeholder="Confirm Password">
                                    @error('inputConfirmPassword')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4 row">
                                <div class="col-sm-12 ">
                                    <button type="submit" name="Submit"
                                        class="btn btn-red fw-bold form-control text-white">REGISTER</button>
                                </div>
                            </div>
                            <div class="mt-4 row">
                                <div class="col-sm-12 ">
                                    <p>Don't have an account? <a href="{{ route('login') }}"
                                            class="text-decoration-none">Login
                                            here</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
