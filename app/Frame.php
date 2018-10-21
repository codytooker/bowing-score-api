<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    // protected $hidden = [
    //     'created_at', 'updated_at',
    // ];

    protected $casts = [
        'number'  => 'integer',
        'throw_1' => 'array',
        'throw_2' => 'array',
        'throw_3' => 'array',
    ];

    /**
     * Get the Game the Frame belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo('App\Game');
    }
}
