<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function exemplo()
    {
        $nome = "Fernando Pontes";

        //return view('exemplo')->with(array('nome' => $nome));
        return view('exemplo', compact('nome'));
    }
}
