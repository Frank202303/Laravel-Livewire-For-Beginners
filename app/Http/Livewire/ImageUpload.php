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
            // pass params, only pass image format。
            // 读取所有文件系统的文件，然后过滤出图片，把图片传参给view
            'images'=>collect(Storage::files('public'))
            ->filter(function($file){
                return in_array(strtolower(pathinfo($file,PATHINFO_EXTENSION)),['png','jpg','jpeg','gif','webp']);
            })
            // map file to url
            ->map(function($file){
                // map成url，这样在前端检查元素时，每个图片就有src=***url了
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
        // 可以一次上传多个图片
        foreach($this->image as $image){
            $image->store('public');
        }
        /// $this->image->storeAS('public', $this->image->getClientOriginalName());

        $this->image=[];

    }
}
