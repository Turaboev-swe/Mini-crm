<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Lead;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;

class TaskController extends Controller
{
    use AuthorizesRequests, DispatchesJobs;

    /**
     * Task create
     */
    public function store(StoreTaskRequest $request, Lead $lead)
    {
        $this->authorize('update', $lead);

        $lead->tasks()->create($request->validated());

        return redirect()->route('leads.show', $lead)
            ->with('success', 'Task qo‘shildi!');
    }

    /**
     * Task update
     */
    public function update(UpdateTaskRequest $request, Lead $lead, Task $task)
    {
        $this->authorize('update', $lead);

        $data = $request->validated();


        $data['is_done'] = $request->has('is_done');

        $task->update($data);
        return redirect()->route('leads.show', $lead)
            ->with('success', 'Task yangilandi!');
    }

    /**
     * Task deleted
     */
    public function destroy(Lead $lead, Task $task)
    {
        $this->authorize('update', $lead);

        $task->delete();

        return redirect()->route('leads.show', $lead)
            ->with('success', 'Task o‘chirildi!');
    }
}
