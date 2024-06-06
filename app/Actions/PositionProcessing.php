<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

trait PositionProcessing 
{
    /**
     * @param string $tbl
     * @param int $nextPosition
     * @param $prevPosition
     */
    public function movePosition(string $tbl, int $nextPosition, $prevPosition)
    {
        if($prevPosition != null) { // move position
            if($prevPosition < $nextPosition) { // move down
                DB::Statement("UPDATE {$tbl} SET position = position - 1 WHERE position > {$prevPosition} AND position <= $nextPosition");
            }elseif ($prevPosition > $nextPosition) { // move up
                DB::Statement("UPDATE {$tbl} SET position = position + 1 WHERE position >= {$nextPosition} AND position < $prevPosition");
            }
        }
        else { // add to middle
            DB::Statement("UPDATE {$tbl} SET position = position + 1 WHERE position >= {$nextPosition}");
        }
    }

    /**
     * @param string $tbl
     * @param int $nextPosition
     * @param $prevPosition
     * @param string $key
     * @param string $value
     */
    public function movePositionKey(string $tbl, int $nextPosition, $prevPosition, string $key, string $value)
    {
        if($prevPosition != null) { // move position
            if($prevPosition < $nextPosition) { // move down
                DB::Statement("UPDATE {$tbl} SET position = position - 1 WHERE position > {$prevPosition} AND position <= $nextPosition AND {$key} = {$value}");
            }elseif ($prevPosition > $nextPosition) { // move up
                DB::Statement("UPDATE {$tbl} SET position = position + 1 WHERE position >= {$nextPosition} AND position < $prevPosition AND {$key} = {$value}");
            }
        }
        else { // add to middle
            DB::Statement("UPDATE {$tbl} SET position = position + 1 WHERE position >= {$nextPosition} AND {$key} = {$value}");
        }
    }
}
