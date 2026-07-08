<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Message;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::all();
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('projects', 'messages'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'category' => 'required|string|max:255',
            'brief' => 'required|string|max:10000',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $project = Project::findOrFail($id);
        
        $project->name = $request->name;
        $project->url = $request->url;
        $project->category = $request->category;
        $project->brief = $request->brief;

        if ($request->hasFile('screenshot')) {
            $file = $request->file('screenshot');
            // Slugify the project name to get a clean file name
            $filename = Str::slug($request->name) . '-' . time() . '.' . $file->getClientOriginalExtension();
            
            // Delete old file if exists
            if ($project->screenshot && file_exists(public_path('images/screenshots/' . $project->screenshot))) {
                @unlink(public_path('images/screenshots/' . $project->screenshot));
            }
            
            $file->move(public_path('images/screenshots'), $filename);
            $project->screenshot = $filename;
        }

        $project->save();

        return redirect()->route('admin.dashboard')->with('success', 'Project berhasil diperbarui!');
    }
}
