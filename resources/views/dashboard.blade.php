@extends('layouts.master')

@section('title', 'Dashboard')

@section('page_title', 'My Dashboard')
@section('page_subtitle', 'Welcome back, ' . session('user_name'))

@section('content')
<!-- Profile Section -->
<div class="max-w-4xl">
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2"></div>
        <div class="p-6">
            <div class="flex flex-col md:flex-row md:items-center">
                <div class="flex-shrink-0">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-r from-indigo-100 to-purple-100 flex items-center justify-center text-3xl font-bold text-indigo-600">
                        {{ session('user_name') ? session('user_name')[0] : 'U' }}
                    </div>
                </div>
                <div class="mt-4 md:mt-0 md:ml-6 flex-1">
                    <h3 class="text-xl font-bold text-gray-800">{{ session('user_name', 'User') }}</h3>
                </div>
            </div>

            <div class="mt-8">
                <div class="p-4 border rounded-lg">
                    <p class="text-gray-500 text-sm">Email</p>
                    <p class="font-medium">{{ session('user_email', 'No email provided') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
