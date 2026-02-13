@extends('layouts.master')

@section('title', 'Edit Author')

@section('page_title', 'Edit Author')
@section('page_subtitle', 'Update author information')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2"></div>
        <form action="{{ route('authors.update', $author->id ?? 1) }}" method="POST" class="p-6 space-y-6">
            @method('PUT')
            @include('authors.form')
        </form>
    </div>
</div>
@endsection
