<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Home Page - Baitullah Tour')]
class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page');
    }
}