<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\rejected;

class reserved extends Component
{
   public $rejected,$idrejected,$namerejected,$arearejected,$timestamp;
   public $ismodalopen=0;
   
    public function render()
    {
       $this->rejected=rejected::all();
        return view('livewire.rejected',[ "rejected" => $this->rejected ]);
    }
    
    public function trash()
    {
        if($this->timestamp>(timestamp()+5)) 
        {
            rejected::find($id)->delete();
        }
    }
}
