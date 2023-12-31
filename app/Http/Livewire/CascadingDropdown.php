<?php

namespace App\Http\Livewire;

use App\Models\Continent;
use App\Models\Country;
use Livewire\Component;

class CascadingDropdown extends Component
{
    public $continents=[];
    public $countries=[];

    public $selectedContinent;
    public $selectedCountry;

    /// initial 
    public function mount()
    {
        $this->continents= Continent::all();
    }

    public function render()
    {
        return view('livewire.cascading-dropdown');
    }

    public function changeContinent()
    {
        ///give 1 second to loading
        sleep(1);
        if( $this->selectedContinent!='-1'){
            // Query in Country
            // Query in Country table
            $this->countries= Country::where('continent_id',$this->selectedContinent)->get();
        }
       
    }
}
