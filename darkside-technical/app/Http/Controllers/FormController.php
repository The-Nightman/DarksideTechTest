<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCreateRequest;
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
}
