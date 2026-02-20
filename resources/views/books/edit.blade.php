@extends('layouts.master')

@section('title', 'Edit Book')

@section('page_title', 'Edit Book')
@section('page_subtitle', 'Update book information')

@section('content')
    <style>
        .upload-zone {
            border: 2px dashed #d1d5db;
            transition: all 0.2s ease;
        }

        .upload-zone:hover,
        .upload-zone.dragover {
            border-color: #4f46e5;
            background-color: #eef2ff;
        }
    </style>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2"></div>
            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data"
                class="p-6 space-y-6">
                @method('PUT')
                @include('books.form')
            </form>
        </div>
    </div>

    <script>
        // Image preview functionality
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.getElementById('imagePreview');
                    preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview" class="w-full h-full object-cover" />';
                }
                reader.readAsDataURL(file);
            }
        }

        // Drag and drop functionality
        const uploadZone = document.getElementById('uploadZone');

        uploadZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadZone.classList.add('dragover');
        });

        uploadZone.addEventListener('dragleave', () => {
            uploadZone.classList.remove('dragover');
        });

        uploadZone.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadZone.classList.remove('dragover');
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                document.getElementById('coverImage').files = e.dataTransfer.files;
                const event = { target: { files: [file] } };
                previewImage(event);
            }
        });

    </script>
@endsection