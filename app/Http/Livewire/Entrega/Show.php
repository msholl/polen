<?php

namespace App\Http\Livewire\Entrega;

use App\Models\Entrega;
use Illuminate\Http\Request;
use Livewire\Component;

class Show extends Component
{
    public Entrega $entrega;
    public $search;
    public $date;
    public $status = 0;

    protected $queryString = ['search', 'date', 'status'];

    public function render()
    {
        if ($this->date == null) {
            $this->date = date('Y-m-d');
        }
        if ($this->status == 'all') {
            $this->status = '';
        }

        return view('livewire.entrega.show', [
            'entregas' => Entrega::where('nome', 'like', '%' . $this->search . '%')
                ->where('data', 'like', '%' . $this->date . '%')
                ->where('entregue', 'like', '%' . $this->status . '%')->get(),
            'entregue',
        ]);

    }

}
