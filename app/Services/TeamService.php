<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamService {
    public function getAll(): array 
    {
        $teams = Team::get()->toArray();
        return $teams;
    }

    public function find(int $team_id): Team
    {
        $team = Team::findOrFail($team_id);
        return $team;
    }

    public function store(Request $request): Team
    {
        $team = Team::create($request->toArray());
        return $team;
    }

    public function update(Request $request, int $team_id): Team
    {
        $team = $this->find($team_id);
        $team->update($request->toArray());
        return $team;
    }

    public function destroy(int $team_id)
    {
        $team = $this->find($team_id);
        $team->delete();
    }
}