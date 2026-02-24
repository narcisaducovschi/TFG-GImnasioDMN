<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index(): string
    {
        return view('users/index');
    }

    public function routine(): string
    {
        return view('users/routine/routine');
    }
    public function createRoutine(): string
    {
        return view('users/routine/routine_new');
    }
}
