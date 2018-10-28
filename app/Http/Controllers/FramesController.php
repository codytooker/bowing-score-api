<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrameUpdateRequest;
use App\Frame;
use App\Http\Resources\Frame as FrameResource;
use Illuminate\Http\Response;
use App\Http\Resources\Game as GameResource;

class FramesController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FrameUpdateRequest $request, Frame $frame)
    {
        $frame["throw_{$request->ball}"] = $request->pins;

        if ($request->ball === 1) {
            $frame->throw_2 = null;
            $frame->throw_3 = null;
        } elseif ($request->ball === 2 && $frame->number === 10) {
            $frame->throw_3 = null;
        }
        $frame->save();

        $game = $frame->game;
        $game = $game->scoreEachFrame();

        return new GameResource($game);
    }
}
