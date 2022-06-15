<?php


namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

trait AddsToast
{
    protected function addToast(string $title, string $message, string $type)
    {
        $toast = [
            'title'      => $title,
            'message'    => $message,
            'type'       => $type,
        ];
        session()->remember('toast', function ()use ($toast){
            return $toast;
        });

//        Request::session()->flash('toast', $toast);
//        dd(Session::all());
    }
}
