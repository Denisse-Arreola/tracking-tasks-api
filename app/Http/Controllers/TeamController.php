<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamService;

class TeamController extends Controller
{
    public function __construct(private TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    public function index(Request $request)
    {
        $result = $this->teamService->getAll();
        return response()->json(['data' => $result], 200);
    }

    public function find(Request $request, int $teamId)
    {
        $result = $this->teamService->find($teamId);
        return response()->json(['data' => $result], 200);
    }

    public function store(Request $request)
    {
        $result = $this->teamService->store($request);
        return response()->json(['data' => $result], 201);
    }

    public function update(Request $request, int $teamId)
    {
        $result = $this->teamService->update($request, $teamId);
        return response()->json(['data' => $result], 201);
    }

    public function destroy(Request $request, int $teamId)
    {
        $this->teamService->destroy($teamId);
        return response()->json([], 204);
    }
}
