<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $ownedSkills = Skill::where('skill_type', 'owned')->latest()->get();
        $neededSkills = Skill::where('skill_type', 'needed')->latest()->get();

        return view('skills.index', compact('ownedSkills', 'neededSkills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'skill_type' => 'required|in:owned,needed',
        ]);

        Skill::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'skill_type' => $request->skill_type,
            'user_id' => auth()->id(),
        ]);

        return redirect('/skills')
            ->with('success', 'Skill berhasil ditambahkan');
    }

    public function show(Skill $skill)
    {
        return view('skills.show', compact('skill'));
    }

    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'skill_type' => 'required|in:owned,needed',
        ]);

        $skill->update([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'skill_type' => $request->skill_type,
        ]);

        return redirect('/skills')
            ->with('success', 'Skill berhasil diperbarui');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect('/skills')
            ->with('success', 'Skill berhasil dihapus');
    }
}
