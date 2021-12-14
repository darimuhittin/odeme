<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Odeme extends Model
{
    protected $table = 'odemeler';
    use HasFactory;
    protected $with = ['cari'];

    /**
     * Get the cari that owns the Odeme
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cari(): BelongsTo
    {
        return $this->belongsTo(Cari::class, 'cari_id');
    }
}
