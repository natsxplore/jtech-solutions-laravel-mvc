<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        protected DashboardService $dashboardService
    ) {
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $data = $this->dashboardService->getDashboardData($user);

        return view('pages.dashboard', [
            ...$data,
            'currentStoreName' => session('current_store_name'),
            'currentStoreId' => session('current_store_id'),
        ]);
    }
}

