<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Services\Dashboard\DashboardService;

class ApiController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new DashboardService();
    }
    public function getUsers()
    {

        $users = $this->service->info();
        return response()->json($users);
    }

}
