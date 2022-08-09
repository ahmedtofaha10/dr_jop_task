<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
    use withPagination;
    public $category;
    protected $paginationTheme = 'bootstrap';
    public function updatedCategory()
    {
        $this->resetPage();
    }
    public function render()
    {
        $posts = auth()->user()
            ->posts()
            ->where(function ($q){
                if ($this->category) {
                    $q->where('post_category', $this->category);
                }
            })
            ->paginate(30);
        return view('livewire.posts-list', compact('posts'));
    }
}
