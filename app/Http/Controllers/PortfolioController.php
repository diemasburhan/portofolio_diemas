<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Message;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('index', compact('projects'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        Message::create($request->only('name', 'email', 'message'));

        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim! Terima kasih.');
    }
}
