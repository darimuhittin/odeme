<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Cari extends Model
{

    protected $table = 'cariler';
    use HasFactory;

    /**
     * Get all of the odeme for the Cari
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function odeme(): HasMany
    {
        return $this->hasMany(Odeme::class);
    }
}
