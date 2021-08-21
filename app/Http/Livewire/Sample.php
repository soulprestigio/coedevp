<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\modelSample;
use Illuminate\Support\Str;
use App\Models\rejected;
use App\Models\reserved;
use DB;

class sample extends Component
{
    public $sample,$idtable,$name,$area,$status,$authname,$searchTerm,$approved,$rejected;
    public $isModalOpen = 0;

     /* text */
    
    public function render() 
    {
    $this->sample = modelSample::all();
    return view('livewire.sample');
    }
    
    /* text */
 
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    
    private function resetCreateForm()
    {
        $this->name = '';
        $this->area = '';
        $this->status = '';
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
            'status'=> "pending"
        ]);
        
        session()->flash('message', $this->status ? 'reservation updated.' : 'reservation created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }
          
    public function approve()
    {
        reserved::updateOrCreate(['name' => $this->name], [
        'id' =>mt_rand(000001, 9999999),
        'name' => $this->name,
        'area' => $this->area,
        'status' =>"approved"
        ]);
                       
        session()->flash('message', 'reservation approved');
    }
    
    public function rejected ()
    {
       rejected::updateOrCreate(['name' => $this->name], [
       'id' =>"RJ"+increment('id')->first(),
       'name' => $this->name,
       'area' => $this->area,
        ]);
          
      sample::find($name)->delete();
      session()->flash('message', 'reservation rejected');
    }     
}
