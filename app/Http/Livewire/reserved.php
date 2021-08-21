<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\reserved;
use DB;

class reserved extends Component
{
    public $reserved;
    public $isModalOpen = 0;

     /* text */
    
    public function render() 
    {
     $this->reserved= reserved::all();
     return view('livewire.reserved',["reserved" => $this->reserved ]);
    }
    
    public function store()
    {
       $this->validate([
            'name' => 'required',
            'area' => 'required'
        ]);
    
        approved::updateOrCreate(['name' => $this->name], [
            'name' => $this->name,
            'area' => $this->area,
            'status'=> $this->status
    }
}
