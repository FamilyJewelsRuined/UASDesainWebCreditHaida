<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Package;
use App\Models\Registration;

#[Title ('Umroh Register')]
class UmrohRegisterPage extends Component
{
    public $registrant;
    public $package;
    public $numberofpeople;
    public $notes;

    //umroh register 
    public function save() {
        $this->validate([
            'registrant' => 'required|max:255',
            'package' => 'required',
            'numberofpeople' => 'required|min:1',
            'notes'
        ]);

        //save to database
        $registration = Registration::create([
            'registrant' => $this->user_id,
            'package' => $this->package_id,
            'numberofpeople'=> $this->number_of_people,
            'notes' => $this->notes
        ]);

        // redirect to home page
        return redirect () ->intended();
        
    }
    public function render()
    {
        $packageQuery = Package::query()->where('is_active', 1);
        return view('livewire.umroh-register-page', [
            'packages' => Package::where('is_active', 1)->paginate(6),
        ]);
    }
}
