<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCreateRequest;
use App\Http\Requests\FormUpdateRequest;
use App\Models\Form;
use Illuminate\Http\Request;
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
    public function store(FormCreateRequest $request): Response
    {
        // Validate the form data
        $validated = $request->validated();

        // Create the form data
        $formData = Form::create($validated);

        return Inertia::render('Form', [
            'formData' => $formData,
        ]);
    }

    /**
     * Update form data with payload from frontend.
     */
    public function update(FormUpdateRequest $request): Response
    {
        // Validate the form data
        $validated = $request->validated();

        // Get the form data ID from the validated form
        $id = $validated['id'];

        // Find the form data by ID
        $formData = Form::findOrFail($id);

        // Create the form data
        $formData->update($validated);

        return Inertia::render('Form', [
            'formData' => $formData,
        ]);
    }

    /**
     * Update form data with payload from frontend.
     */
    public function destroy(Request $request): Response
    {
        // Validate to make sure the id is present
        $validated = $request->validate([
            'id' => 'required|integer',
        ]);

        // Find the form data by ID
        $formData = Form::findOrFail($validated['id']);

        // Delete the form data
        $formData->delete();

        return Inertia::render('Form', [
            'message' => 'Form data deleted successfully.',
        ]);
    }
}
