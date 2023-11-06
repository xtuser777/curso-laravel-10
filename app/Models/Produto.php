<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    public function getProdutosSearchIndex(string $search = '')
    {
        $items = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })-> get();

        return $items;
    }
}
