<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calculator extends Component
{
    public $number1= 0;
    public $number2= 0;
  
    public $action= '+';

    public bool  $disable= false;
    public float $result= 0;

    public function render()
    {
        return view('livewire.calculator');
    }
    public function calculate()
    {
        // converse string to  float
         $num1 = (float)$this->number1;
         $num2 = (float)$this->number2;
         if($this->action=='+'){
            $this->result=   $num1 +  $num2;
         }else 
         if($this->action=='-'){
            $this->result=   $num1 -  $num2;
         }else 
         if($this->action=='*'){
            $this->result=   $num1 *  $num2;
         }else 
         if($this->action=='/'){
            if($num2!=0){
                $this->result=   $num1 / $num2;
            }

           
         }else 
         if($this->action=='%' && $num2!=0){
            $this->result=   $num1 /  $num2 *100;
         }
    }
// update hook
// when some property update 
// like onChanged
    public function updated($property){
        if($this->number1 ==''||$this->number2 ==''){
            $this->disable = true;
        }else{
            $this->disable = false;
        }

    }
}
