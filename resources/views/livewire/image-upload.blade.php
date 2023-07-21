<div class="p-6">
   <form wire:submit.prevent='save' class="flex flex-col w-[400px] mx-auto py-16"> 
    {{-- 选择图片后，就会把图片保存在临时位置，点击 save时，把它们保存在永久位置 --}}
        {{-- 展示 model='image' --}}
        @if($image)
            Preview:
            <div class="flex  flex-wrap  justify-center gap-6">
                @foreach ($image as $im)
                    <img  src="{{$im->temporaryUrl()}}"  class="w-[110x]  h-[90px] object-cover">
                @endforeach
            </div>
        @endif
        <input type="file" wire:model='image' class="mb-4"  multiple>

        {{-- //显示错误信息 --}}
        @error('image')
            <span class="error">{{$message}}</span>
        @enderror


        <button type="submit" class="py-2  px-4 bg-indigo-500  hover:bg-indigo-600 rounded  text-white ">
            Save Photo
        </button>
   </form>

   {{-- /// for existed images --}}
   {{-- C:\xampp\htdocs\laravel10\Laravel-Livewire-For-Beginners\public\storage --}}
    <div class="flex  flex-wrap gap-7">
            {{-- //这个 images 是通过 view传 参数过来的 --}}
            @foreach ($images as $image)
            {{-- //  宽度 高度 --}}
                <img  src="{{$image}}"  class="w-[128x]  h-[120px] object-cover">
            @endforeach
    </div>
</div>
