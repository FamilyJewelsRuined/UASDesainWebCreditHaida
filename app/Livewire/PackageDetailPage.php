<?php

namespace App\Livewire;

use LiveWire\Attributes\Title;
use Livewire\Component;
use App\Models\Package;


#[Title('Package Detail - Baitullah Tour')]
class PackageDetailPage extends Component
{
    public $slug;

    public function mount($slug) {
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.package-detail-page', [
            'package' => Package::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}


