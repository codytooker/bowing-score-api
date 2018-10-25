<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrameUpdateRequest;
use App\Frame;
use App\Http\Resources\Frame as FrameResource;
use Illuminate\Http\Response;

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

        // if we are updating the first ball of a frame we need to clear out the second ball as well.
        if ($request->ball === 1) {
            $frame->throw_2 = null;
        }
        $frame->save();

        return response(new FrameResource($frame), 202);
    }
}
