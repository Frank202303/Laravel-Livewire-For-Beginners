<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    // 分页
    use WithPagination;
    public string $search = '';

    // watch query string searched in the URL
    protected $queryString = ['search'] ;

    public function render()
    {
        $query = Product::query();
        // 或者  或者
        if($this->search){
            //                            Fuck: "%{$this->search}%"  must use ""
            $query->where('title','like', "%{$this->search}%")
            ->orWhere('description','like', "%{$this->search}%");
        }
        // pass parameter
        return view('livewire.product-search',[
            'products'=>$query->paginate(20),
        ]);
    }
    // hook 生命周期钩子
    public function updated($property)
    {
        // when search property updated
        if($property =='search'){
            // resetPage from pagination
            $this->resetPage();
        }

    }
}
