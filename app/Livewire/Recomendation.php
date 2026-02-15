<?php

namespace App\Livewire;

use App\Reccomendation as Reccomend;
use Livewire\Component;

use function Illuminate\Log\log;

class Recomendation extends Component
{
    public $reccomendation;

    public function createList()
    {
        try {
            $rec = new Reccomend;
            $this->reccomendation = $rec->recommend();
        } catch (\Exception $e) {
            log('Error in Reccomendation mount: '.$e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.recomendation');
    }
}
