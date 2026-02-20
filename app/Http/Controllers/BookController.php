<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = DB::table('books')
            ->select('books.*', 'authors.name as author_name', 'categories.name as category_name')
            ->leftjoin('authors', 'books.author_id', '=', 'authors.id')
            ->leftjoin('categories', 'books.category_id', '=', 'categories.id')
            ->orderBy('id', 'desc')
            ->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = DB::table('authors')->get();
        $categories = DB::table('categories')->get();
        return view('books.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:30',
            'isbn' => 'required|min:3|max:30|unique:books,isbn',
            'author_id' => 'required',
            'category_id' => 'required',
            'description' => 'required|min:3|max:255',
            'status' => 'required',
            'coverImage' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // storage/app/public/covers
        $path = $request->file('coverImage')->store('covers', 'public');

        DB::table('books')->insert([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
            'cover_image' => $path,
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Book Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        $authors = DB::table('authors')->get();
        $categories = DB::table('categories')->get();
        return view('books.edit', compact('authors', 'categories', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:30',
            'isbn' => 'required|min:3|max:30|unique:books,isbn,' . $id . ',id',
            'author_id' => 'required',
            'category_id' => 'required',
            'description' => 'required|min:3|max:255',
            'status' => 'required',
            'coverImage' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get old data
        $book = DB::table('books')->where('id', $id)->first();

        // over update
        if ($request->hasFile('coverImage')) {

            // store new
            $path = $request->file('coverImage')->store('covers', 'public');

            // delete old
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }

            DB::table('books')->where('id', $id)->update([
                'title' => $request->title,
                'isbn' => $request->isbn,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'status' => $request->status,
                'cover_image' => $path,
                'updated_at' => now(),
            ]);
        } else {
            // without cover update
            DB::table('books')->where('id', $id)->update([
                'title' => $request->title,
                'isbn' => $request->isbn,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'status' => $request->status,
                'updated_at' => now(),
            ]);
        }

        return back()->with('success', 'Book Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete img 
        $book = DB::table('books')->where('id', $id)->first();  // get old data 
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }
        DB::table('books')->where('id', $id)->delete();
        return back()->with('success', 'Book Deleted successfully.');
    }
}
