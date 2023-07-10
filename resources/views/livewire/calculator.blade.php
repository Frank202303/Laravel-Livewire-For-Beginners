{{-- 按住 Ctrl（Windows 键，然后按下右方括号 ] 键，以将选定的代码块向右缩进 --}}
<div>
    <div class="  flex  flex-col   items-center">
        <div class="  flex p-16 mx-auto justify-center    items-center gap-4">
            <input type="number" wire:model='number1' placeholder="Number 1">
            <select class="w-24" wire:model='action'>
                <option>+</option>
                <option>-</option>
                <option>*</option>
                <option>/</option>
                <option>%</option>

            </select>
            <input type="number" wire:model='number2' placeholder="Number 2">
            <button wire:click='calculate' 
                class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 
                disable:cursor-not-allowed  disable:bg-opacity-90
                rounded text-white" {{$disable? ' disable': ''}}>=
            </button>
        
        </div>
        <p class='text-3xl'>  {{$result}} </p>
    </div>
</div>
