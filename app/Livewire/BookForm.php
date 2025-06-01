<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookForm extends Component
{
    public $name;
    public $description;
    public $is_active = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'is_active' => 'boolean',
    ];

   

    public function submit()
    {
     
        //model create
        Book::create([
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ]);
        $this->reset(['name', 'description', 'is_active']);
        return redirect('books/')->with('status', 'book created successfully.');
         
            // session()->flash('status', 'Book created successfully.');
        
    }

    public function render()
    {
        return view('livewire.book-form');
    }
 

   
    
}