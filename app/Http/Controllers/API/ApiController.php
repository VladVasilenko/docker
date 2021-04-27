<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Services\DashboardService\DashboardService;

class ApiController extends Controller
{
    public function getUsers()
    {
        $users = DashboardService::info();
        return response()->json($users);
    }

}
