<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogCard extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 9;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Blog::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('body', 'like', '%' . $this->search . '%');
            })
            ->latest('created_at')
            ->paginate($this->perPage);

        return view('livewire.blog-card', [
            'posts' => $posts,
        ])->layout('layouts.app');
    }
}