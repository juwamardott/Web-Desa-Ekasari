<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class VisitorController extends Controller
{
    //
    public function getVisitors()
    {
        $visitors = Visitor::selectRaw('DATE(date) as date, SUM(count) as total_visits')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        return response()->json($visitors);
    }
}