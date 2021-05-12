<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\DashboardService;
use App\Services\Profile\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public $service;

    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }

    public function index() {

        return view('dashboard.dashboard', ['users' => $this->service->info()]);
    }
}
