<?php


namespace App\Traits;

use Illuminate\Http\Request;

trait AddsToast
{
    protected function addToast(string $title, string $message, string $type, bool $alwaysShow)
    {
        $toast = [
            'title'      => $title,
            'message'    => $message,
            'type'       => $type,
            'alwaysShow' => $alwaysShow
        ];

        Request::session()->flash('toast', $toast);
    }
}
