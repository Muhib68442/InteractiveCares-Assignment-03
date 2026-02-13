@extends('layouts.master')

@section('title', 'Create Category')

@section('page_title', 'Create Category')
@section('page_subtitle', 'Add a new category to the collection')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2"></div>
        <form action="{{ route('categories.store') }}" method="POST" class="p-6 space-y-6">
            @include('categories.form')
        </form>
    </div>
</div>
@endsection
