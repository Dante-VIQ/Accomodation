<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ShowBlog extends Component
{
    public Blog $blog;

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
    }

    
    public function render()
    {
        return view('livewire.show-blog');
    }
}
