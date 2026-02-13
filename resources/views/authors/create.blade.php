@extends('layouts.master')

@section('title', 'Create Author')

@section('page_title', 'Create Author')
@section('page_subtitle', 'Add a new author to the collection')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2"></div>
        <form action="{{ route('authors.store') }}" method="POST" class="p-6 space-y-6">
            @include('authors.form')
        </form>
    </div>
</div>
@endsection
