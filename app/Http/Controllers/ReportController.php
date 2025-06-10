<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('status', 'approved')->with('section')->get();
        return view('home', compact('reports'));
    }

    public function showApplyForm()
    {
        $user = Auth::user();
        $hasApplied = $user->report()->exists();
        $sections = Section::all();
        return view('apply', compact('hasApplied', 'sections'));
    }

    public function apply(Request $request)
    {
        $user = Auth::user();
        if ($user->report()->exists()) {
            return back()->with('error', 'Вы уже отправили заявку!');
        }

        $request->validate([
            'fullname' => 'required|string|max:100',
            'theme' => 'required|string|max:255',
            'section_id' => 'required|exists:sections,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        Report::create([
            'fullname' => $request->fullname,
            'theme' => $request->theme,
            'section_id' => $request->section_id,
            'path_img' => $path,
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Заявка успешно отправлена!');
    }
}
