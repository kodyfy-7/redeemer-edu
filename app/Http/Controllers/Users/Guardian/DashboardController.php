<?php

namespace App\Http\Controllers\Users\Guardian;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Services\YearService;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function __construct(YearService $yearService)
    {
        $this->middleware('auth:guardian');
        $this->yearService = $yearService;
    }

    public function index()
    {
        $year = $this->yearService->checkYear();
        return view('guardian.dashboard', [
            'year' => $year,
        ]);
    }
}
