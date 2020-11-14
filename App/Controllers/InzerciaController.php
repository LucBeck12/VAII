<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Inzerat;

class InzerciaController extends AControllerBase
{

    public function index()
    {
        return Inzerat::getAll();
    }
}