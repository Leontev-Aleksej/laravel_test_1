<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Report::with(['user', 'section'])->get();
        return view('admin.dashboard', compact('reports'));
    }

    public function approve(Report $report)
    {
        $report->update(['status' => 'approved']);
        return redirect()->route('admin.dashboard')->with('success', 'Заявка одобрена.');
    }

    public function reject(Report $report)
    {
        $report->update(['status' => 'rejected']);
        return redirect()->route('admin.dashboard')->with('success', 'Заявка отклонена.');
    }
}
