<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoque';

    public function embalagens(): BelongsTo
    {
        return $this->belongsTo(Embalagem::class, 'embalagem_id', 'id');
    }

}
