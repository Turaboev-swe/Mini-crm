<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Lead;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request, Lead $lead)
    {
        $this->authorize('update', $lead);

        $lead->tasks()->create($request->validated());

        return redirect()->route('leads.show', $lead)->with('success', 'Task added!');
    }
    public function update(UpdateTaskRequest $request, Lead $lead, Task $task)
    {
        $this->authorize('update', $lead);
        $task->update([
            'is_done' => $request->has('is_done')
        ]);

        $task->update($request->validated());

        return redirect()->route('leads.show', $lead)->with('success', 'Task updated!');
    }

    public function destroy(Lead $lead, Task $task)
    {
        $this->authorize('update', $lead);

        $task->delete();

        return redirect()->route('leads.show', $lead)->with('success', 'Task deleted!');
    }

}
