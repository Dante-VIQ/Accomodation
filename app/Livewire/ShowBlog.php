<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;

class ShowBlog extends Component
{
    public $post;

    public function mount($id)
    {
        $this->post = Blog::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.blog-show');
    }
}