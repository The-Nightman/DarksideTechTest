<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCreateRequest;
use App\Http\Requests\FormUpdateRequest;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class FormController extends Controller
{
    /**
     * Show the form view.
     */
    public function create(): Response
    {
        // Fetch form data from the database
        $formData = Form::first();

        if (is_null($formData)) {
            // Create a new form data if it doesn't exist
            $formData = new Form();
            $formData->id = null;
        }

        // Pass the form data to the view
        return Inertia::render('Form', [
            'formData' => $formData,
        ]);
    }

    /**
     * Create form data with payload from frontend.
     */
    public function store(FormCreateRequest $request): RedirectResponse
    {
        // Validate the form data
        $validated = $request->validated();

        // Create the form data
        Form::create($validated);

        return to_route('myDetails');
    }

    /**
     * Update form data with payload from frontend.
     */
    public function update(FormUpdateRequest $request): RedirectResponse
    {
        // Validate the form data
        $validated = $request->validated();

        // Get the form data ID from the validated form
        $id = $validated['id'];

        // Find the form data by ID
        $formData = Form::findOrFail($id);

        // Create the form data
        $formData->update($validated);

        return to_route('myDetails');
    }

    /**
     * Update form data with payload from frontend.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate to make sure the id is present
        $validated = $request->validate([
            'id' => 'required|integer',
        ]);

        // Find the form data by ID
        $formData = Form::findOrFail($validated['id']);

        // Delete the form data
        $formData->delete();

        return to_route('myDetails');
    }
}
