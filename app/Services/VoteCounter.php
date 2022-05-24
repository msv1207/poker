<?php
namespace App\Services;

class VoteCounter
{
    public static function index($rooms)
    {
        $rooms->choose->groupBy('title')->flatMap(function ($items) {

            $quantity = sizeof($items);

            return $items->map(function ($item) use ($quantity) {
                $item->quantity = $quantity;

                return $item;

            });

        });
        $rooms->choose=$rooms->choose->unique('title');
        return $rooms;
    }
}
