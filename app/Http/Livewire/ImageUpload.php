<?php

namespace App\Http\Livewire;

use Livewire\Component;
/// add use
use Illuminate\Support\Facades\Storage;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{
    use WithFileUploads;
    // var TemporaryUploadedFile
    public $image = [];
    public function render()
    {
        return view('livewire.image-upload',[
            // pass params, only pass image format
            'images'=>collect(Storage::files('public'))
            ->filter(function($file){
                return in_array(strtolower(pathinfo($file,PATHINFO_EXTENSION)),['png','jpg','jpeg','gif','webp']);
            })
            // map file to url
            ->map(function($file){
                return Storage::url($file);
            })
        ]);
    }
    public function save()
    {
        // add validate
        $this->validate([
            'image.*'=>'image|max:1024',// 1MB Max
        ]);
        // store to public file with  Temporary name
        foreach($this->image as $image){
            $image->store('public');
        }
        /// $this->image->storeAS('public', $this->image->getClientOriginalName());

    }
}
