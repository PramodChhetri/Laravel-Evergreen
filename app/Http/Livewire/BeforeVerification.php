<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class BeforeVerification extends Component
{

    use WithFileUploads;

    public $panphoto;

    public function render()
    {
        return view('livewire.before-verification');
    }

}
