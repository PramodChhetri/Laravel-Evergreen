<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProfilePic extends Component
{
    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.admin-profile-pic');
    }
}