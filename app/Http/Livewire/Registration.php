<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Registration extends Component
{
    public $name;
    public $rollno;
    public $email;

    public function updated($field)
    {
        $this->validateOnly($field,[
            'name' => 'required',
            'rollno' => 'required | min:1 | max:3',
            'email' => 'required | email '
        ]);
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'rollno' => 'required | min:1 | max:3',
            'email' => 'required | email '
        ]);

        dd($this->name,$this->rollno,$this->email);

        $this->resetFilters();
        
    }

    public function resetFilters()
    {
        $this->reset(['name','rollno','email']);
    }

    public function render()
    {
        return view('livewire.registration');
    }
}
