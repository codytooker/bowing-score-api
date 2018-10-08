<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
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
