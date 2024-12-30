<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Package;


#[Title ('Packages - Baitullah Tour')]
class PackagesPage extends Component
{
    use WithPagination;

    public function render()
    {
        $packageQuery = Package::query()->where('is_active', 1);
        return view('livewire.packages-page', [
            'packages' => Package::where('is_active', 1)->paginate(6),
        ]);        
    }
}
