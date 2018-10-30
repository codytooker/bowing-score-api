<?php

namespace App\Bowling;

use Illuminate\Database\Eloquent\Collection;

class FrameScorer
{
    private $frames;
    private $total = 0;

    public function __construct(Collection $frames)
    {
        $this->frames = $frames;
    }

    public function score()
    {
        $this->frames->each(function ($frame, $key) {
            if ($frame->number === 10) {
                $this->scoreTheTenth($key);
            } elseif (count($frame->throw_1) === 10) {
                $this->scoreStrike($key);
            } elseif (isset($frame->throw_2) && count($frame->throw_1) + count($frame->throw_2) === 10) {
                $this->scoreSpare($key);
            } else {
                $this->scoreBasic($key);
            }

            $this->frames[$key]->score = $this->total;
        });

        return $this->frames;
    }

    protected function scoreTheTenth($key)
    {
        $total = $this->total + count($this->frames[$key]->throw_1);

        if (isset($this->frames[$key]->throw_2)) {
            $total = $total + count($this->frames[$key]->throw_2);
        }
        
        if (isset($this->frames[$key]->throw_3)) {
            $total = $total + count($this->frames[$key]->throw_3);
        }

        $this->total = $total;
    }

    private function scoreStrike($key)
    {
        $this->total = $this->total + 10;
        $bonus = 0;

        if (isset($this->frames[$key + 1])) {
            if (count($this->frames[$key + 1]->throw_1) === 10) {
                $bonus = 10;
                
                if ($this->frames[$key]->number === 9 && isset($this->frames[$key + 1]->throw_2)) {
                    $bonus = $bonus + count($this->frames[$key + 1]->throw_2);
                } elseif (isset($this->frames[$key + 2])) {
                    $bonus = $bonus + count($this->frames[$key + 2]->throw_1);
                }
            } else {
                $bonus = count($this->frames[$key + 1]->throw_1);

                if (isset($this->frames[$key + 1]->throw_2)) {
                    $bonus = $bonus + count($this->frames[$key + 1]->throw_2);
                }
            }
        }

        $this->total = $this->total + $bonus;
    }

    private function scoreSpare($key)
    {
        $this->total = $this->total + 10;
        $bonus = 0;

        if (isset($this->frames[$key + 1])) {
            $bonus = count($this->frames[$key + 1]->throw_1);
        }

        $this->total = $this->total + $bonus;
    }

    private function scoreBasic($key)
    {
        $total = $this->total + count($this->frames[$key]->throw_1);

        if (isset($this->frames[$key]->throw_2)) {
            $total = $total + count($this->frames[$key]->throw_2);
        }

        $this->total = $total;
    }
}
