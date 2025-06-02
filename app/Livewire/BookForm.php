<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class BookForm extends Component
{
    public $name;
    public $auther;
    public $description;

    // 🔽 Put this inside the class
    protected $rules = [
        'name' => 'required|string|max:255',
        'auther' => 'required|string',
        'description' => 'required|string',
    ];

    // 🔽 Real-time validation for each updated field
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate(); // Validates all fields at once

        Book::create([
            'name' => $this->name,
            'auther' => $this->auther,
            'description' => $this->description,
        ]);

        $this->reset(['name', 'auther', 'description']);

        return redirect('books/')->with('status', 'Book created successfully.');
        
    }

    public function render()
    {
        return view('livewire.book-form');
    }
}
