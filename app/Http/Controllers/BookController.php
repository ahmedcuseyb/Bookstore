<?php

namespace App\Http\Controllers;
 use \App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::get();
        // return $books;
        return view('book.index', compact('books'));

    }
    public function create()
    {
        return view('book.create');
    }

     public function store(request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            // 'is_active' => 'required|boolean',
            'is_active' => 'sometimes',
        ]);

        // Create a new category
       Book::create([
            'name' => $request->name,
            'description' => $request->description,
            // 'is_active' => $request->is_active,
            'is_active' =>$request->is_active==true ? 1:0,
        ]);

        // Redirect to the index page with a success message
        // return redirect('categories/create')->with('status', 'Category created successfully.');
        return redirect('books/')->with('status', 'book created successfully.');
    }

    // editing and updating
    public function edit(int $id)
    {
        $book = Book::findOrFail($id);
        // return $category;
        return view('book.edit', compact('book'));
    }

    public function update(request $request,int $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            // 'is_active' => 'required|boolean',
            'is_active' => 'sometimes',
        ]);

        // Create a new category
       Book::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            // 'is_active' => $request->is_active,
            'is_active' =>$request->is_active==true ? 1:0,
        ]);

        // Redirect to the index page with a success message
        return redirect('books/')->with('status', 'Book updted successfully.');
        // return redirect()->back()->with('status', 'Category updated successfully.');
    }

    // deleting
    public function destroy(int $id)
    {
        $category = Book::findOrFail($id);
        $category->delete();

        // Redirect to the index page with a success message
        return redirect('books')->with('status', 'Book deleted successfully.');
    }
    // public function show(int $id)
    // {
    //     $category = Category::findOrFail($id);
    //     return view('category.show', compact('category'));
    // }
    // public function toggleActive(int $id)
    // {
    //     $category = Category::findOrFail($id);
    //     $category->is_active = !$category->is_active;
    //     $category->save();

    //     return redirect()->back()->with('status', 'Category status updated successfully.');
    // }

}
