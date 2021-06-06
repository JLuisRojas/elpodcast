<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Models\Category;

class ReportController extends Controller
{
    public function generate() {
        $pods = Podcast::all();
        $categories = Category::all();
        $pdf = PDF::loadView('report', [
            'pods' => $pods,
            'categories' => $categories,
        ]);

        return $pdf->stream();
    }
}
