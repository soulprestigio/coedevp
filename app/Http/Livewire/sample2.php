<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\modelSample;
use App\Models\reserved;
use DB;

class sample2 extends Component
{
    public $sample2;
    public $isModalOpen = 0;

     /* text */
    
    public function render() 
    {
     $this->sample2= approved::all();    
     return view('livewire.reserved',[ "sample2" => $this->sample2 ]);
    }
    
    public function store()
    {
       $this->validate([
            'name' => 'required',
            'area' => 'required',
        ]);
    
        modelSample::updateOrCreate(['name' => $this->name], [
            'name' => $this->name,
            'area' => $this->area,
            'status'=> $this->status
        ]);
        
        session()->flash('message', $this->status ? 'reservation updated.' : 'reservation created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }
}
