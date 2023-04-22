<?php

namespace App\Http\Livewire\Producao;

use App\Models\Producao;
use Livewire\Component;

class Show extends Component
{
    public $search;
    public $date;

    protected $queryString = ['search', 'date'];

    public function render()
    {
        if ($this->date == null) {
            $this->date = date('Y-m-d');
        }

        return view('livewire.producao.show', [
            'producao' => Producao::where('data', 'like', '%' . $this->date . '%')
                ->where('sabor', 'like', '%' . $this->search . '%')
                ->get()
        ]);
    }
}
