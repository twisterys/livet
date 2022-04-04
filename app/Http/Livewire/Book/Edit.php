<?php

namespace App\Http\Livewire\Book;

use App\Models\Author;
use App\Models\Book;
use Livewire\Component;

class Edit extends Component
{
    public Book $book;

    public array $listsForFields = [];

    public function mount(Book $book)
    {
        $this->book = $book;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.book.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->book->save();

        return redirect()->route('admin.books.index');
    }

    protected function rules(): array
    {
        return [
            'book.author_id' => [
                'integer',
                'exists:authors,id',
                'nullable',
            ],
            'book.title' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['author'] = Author::pluck('name', 'id')->toArray();
    }
}
