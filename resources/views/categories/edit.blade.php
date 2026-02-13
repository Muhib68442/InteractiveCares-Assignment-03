@extends('layouts.master')

@section('title', 'Edit Category')

@section('page_title', 'Edit Category')
@section('page_subtitle', 'Update category information')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2"></div>
        <form action="{{ route('categories.update', $category->id ?? 1) }}" method="POST" class="p-6 space-y-6">
            @method('PUT')
            @include('categories.form')
        </form>
    </div>
</div>
@endsection
