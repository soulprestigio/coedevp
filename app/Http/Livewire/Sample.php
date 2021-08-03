<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\modelSample;
use Auth;


class sample extends Component
{
    public $sample,$name,$area,$status,$authname;
    protected $sample2;
    public $isModalOpen = 0;

     /* text */
     
    public function render() 
    {
    $this->authname = Auth::user()->name;
    $this->sample = modelSample::all();
    $this->sample2 = modelSample::where('name',$this->authname);
        return view('livewire.sample',['sample2' => 'name']);
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
            'status'=> $this->status
        ]);

        session()->flash('message', $this->status ? 'reservation updated.' : 'reservation created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($name)
    {
        $sample = modelSample::findOrFail($name);
        $this->name = $name;
        $this->status = $sample->status;   
        $this->openModalPopover();
    }
    
    public function delete($name)
    {
        sample::find($name)->delete();
        session()->flash('message', 'record deleted.');
    }
    
    public function approve($name)
    {
        $this->sample = modelSample::all();
        sample::find($name)->delete();
        session()->flash('message', 'record approved');
    }
    
  
}


