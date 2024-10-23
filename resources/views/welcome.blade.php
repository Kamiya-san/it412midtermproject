@extends('layouts.layouts')
@section('title', 'Dashboard')

@section('content')
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                <a href="{{ url('/logout') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Logout</a>
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <p class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ $user->email }} <span class="font-normal">Logged in </span></p>
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <div class="card shadow bg-light-600 ">
                        <img src="{{ url('assets/images/image1.jpg') }}" alt="Images 2" width="200" height="500" class="rounded-top">
                        <h3 class="font-semibold text-light focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-center py-2">Alexandra Mae Pis-ing</h3>
                    </div>
                    <div class="card shadow bg-light-600 ">
                        <img src="{{ url('assets/images/images2.jpg') }}" alt="Images 2" width="200" height="500" class="rounded-top">
                        <h3 class="font-semibold text-light focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-center py-2">Macky Mar Layao</h3>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                </div>
            </div>
        </div>
    @endsection
