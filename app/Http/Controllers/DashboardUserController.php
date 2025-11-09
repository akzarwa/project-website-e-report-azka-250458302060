<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function indexUser()
    {
        return view('User.dashboardUser');
    }
}
