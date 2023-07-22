<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterForm extends Component
{
    public string $email = '';
    public string $password = '';
    public string $first_name = '';
    public string $last_name = '';
    public string $role = 'customer';
    public string $company_name = '';
    public string $vat_number = '';

    // valid
    protected $rules=[
        'first_name'=>['required','min:2'],
        'last_name'=>['required','min:2'],
        'email'=> ['required','email'],
        'password'=>['required','min:8'],
        'company_name'=>['required_if:role,vendor'],
        'vat_number'=>['required_if:role,vendor'],
    ];

    public function render()
    {
        return view('livewire.register-form');
    }

    public function submit()
    {
        $this->validate();

        // register customer
        session()->flash('message','Customer was created');

        // reset form
         $this->email = '';
         $this->password = '';
         $this->first_name = '';
         $this->last_name = '';
         $this->role = 'customer';
         $this->company_name = '';
         $this->vat_number = '';
    }

    // 生命周期 钩子，实时校验  正在 输入的 数据 是否 合法
    public function updated($property)
    {
        $this->validateOnly($property);
    }
}
