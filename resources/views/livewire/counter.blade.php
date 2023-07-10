<div class="p-16 flex justify-center gap-6 items-center">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <button wire:click='increment' class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded text-white">+</button>
    <span>{{$count}}</span>
    <button wire:click='decrement' class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded text-white">-</button>
</div>
