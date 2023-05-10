<?php

namespace App\Http\Livewire\Estoque;

use App\Models\Estoque;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    public $search;
    public $embalagemFilter = 'all';

    public $sabor;    // string
    public $quantidade; // int
    public $embalagem;  // string
    public $operacao;
    public $quantidadeOperacao; // int

    protected $queryString = ['search', 'embalagemFilter'];

    protected $rules = [
        'quantidadeOperacao' => 'required|integer|min:1|max:100',
    ];

    public function render()
    {
//        return view('livewire.estoque.show', ['estoque' => Estoque::all()]);
        if ($this->embalagemFilter == 'all') {
            $this->embalagemFilter = '';
        }

        return view('livewire.estoque.show', ['estoque' =>
            DB::table('estoque')
                ->join('embalagem', 'estoque.embalagem_id', '=', 'embalagem.id')
                ->select('estoque.*', 'embalagem.descricao as embalagem')
                ->where('sabor', 'like', '%' . $this->search . '%')
                ->where('embalagem_id', 'like', '%' . $this->embalagemFilter . '%')
                ->orderBy('embalagem_id', 'asc')
                ->get()
        ]);
    }

    public function submit()
    {
        $this->validate();

    }
}
