<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateLeadRequest;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LeadController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        $query = Lead::where('assigned_to', auth()->id());

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }

        $leads = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('leads.index', compact('leads'));
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);


        $validated['assigned_to'] = auth()->id();

        Lead::create($validated);


        return redirect()->back()->with('success', 'Lead created successfully!');
    }
    public function create()
    {
        return view('leads.create');
    }
    public function show(Lead $lead)
    {
        $this->authorize('view', $lead);
        return view('leads.show', compact('lead'));
    }

    public function edit(Lead $lead)
    {
        $this->authorize('update', $lead);
        return view('leads.edit', compact('lead'));
    }

    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        $this->authorize('update', $lead);

        $lead->update($request->validated());

        return redirect()->route('leads.index')->with('success', 'Lead updated successfully!');
    }

    public function destroy(Lead $lead)
    {
        $this->authorize('delete', $lead);

        $lead->delete();

        return redirect()->route('leads.index')->with('success', 'Lead deleted successfully!');
    }
}
