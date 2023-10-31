<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $data = Book::get();
        //return $data;
        return view('book-list', compact('data'));
    }

    public function addBook(){
        return view('add-book');
    }
    public function saveBook(Request $request){
        //return view('save-book');
        //dd($request->all());



       // Validation rules for the form fields
    $rules = [
        'title' => 'required',
        'author' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ];

    // Custom validation messages
    $messages = [
        'required' => 'The :attribute field is required.',
        'numeric' => 'The :attribute field must be a number.',
        'integer' => 'The :attribute field must be an integer.',
    ];

    // Validate the request data
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        // If validation fails, redirect back with errors and input data
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $book = new Book();
    $book->title = $request->title;
    $book->author = $request->author;
    $book->price = $request->price;
    $book->stock = $request->stock;
    $book->save();

    return redirect()->back()->with('success', 'Book Added Successfully!');
    }
}
