<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lead;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $leadsCount = Lead::where('assigned_to', $user->id)->count();

        $leadIds = Lead::where('assigned_to', $user->id)->pluck('id');

        $tasksCount = Task::whereIn('lead_id', $leadIds)->count();

        $pendingTasks = Task::whereIn('lead_id', $leadIds)
            ->where('is_done', false)
            ->count();

        return view('dashboard', compact('leadsCount', 'tasksCount', 'pendingTasks'));
    }
}
