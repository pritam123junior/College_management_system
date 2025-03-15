<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YoutubeGroup;

class YoutubeGroupController extends Controller
{
    // Display list of YouTube Groups
    public function index()
    {
        $groups = YoutubeGroup::all();
        return view('youtube_groups.index', compact('groups'));
    }

    // Show form to create a new group
    public function create()
    {
        return view('youtube_groups.create');
    }

    // Store a newly created group
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:youtube_groups|max:255',
        ]);

        YoutubeGroup::create($request->all());

        return redirect()->route('youtube_groups.index')
                         ->with('success', 'YouTube Group created successfully.');
    }

    // Show details of a specific group
    public function show(YoutubeGroup $youtubeGroup)
    {
        return view('youtube_groups.show', compact('youtubeGroup'));
    }

    // Show form to edit an existing group
    public function edit(YoutubeGroup $youtubeGroup)
    {
        return view('youtube_groups.edit', compact('youtubeGroup'));
    }

    // Update an existing group
    public function update(Request $request, YoutubeGroup $youtubeGroup)
    {
        $request->validate([
            'name' => 'required|max:255|unique:youtube_groups,name,' . $youtubeGroup->id,
        ]);

        $youtubeGroup->update($request->all());

        return redirect()->route('youtube_groups.index')
                         ->with('success', 'YouTube Group updated successfully.');
    }

    // Delete a group
    public function destroy(YoutubeGroup $youtubeGroup)
    {
        $youtubeGroup->delete();

        return redirect()->route('youtube_groups.index')
                         ->with('success', 'YouTube Group deleted successfully.');
    }
}
