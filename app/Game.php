<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];
    
    /**
     * Get the User the Game belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all frame of the game
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function frames()
    {
        return $this->hasMany('App\Frame');
    }

    public function createFrames()
    {
        for ($i=1; $i <= 10; $i++) {
            $this->frames()->create([
                'number' => $i,
            ]);
        }
    }
}
