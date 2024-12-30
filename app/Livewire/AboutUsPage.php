<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\AboutUs;


#[Title ('About Us - Baitullah Tour')]
class AboutUsPage extends Component
{
    use WithPagination;

    public function render()
    {
        $aboutusQuery = AboutUs::query()->where('is_active', 1);
        return view('livewire.about-us-page', [
            'about_us' => AboutUs::where('is_active', 1)->paginate(6),
        ]);
    }
}