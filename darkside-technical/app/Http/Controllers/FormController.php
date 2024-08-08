<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FormController extends Controller
{
    public function create(): Response
    {
        // Fetch form data from the database
        $formData = Form::where('id', 1)->first();

        if (is_null($formData)) {
            // Create a new form data if it doesn't exist
            $formData = new Form();
            $formData->id = null;
            $formData->save();
        }

        // Pass the form data to the view
        return Inertia::render('Form', [
            'formData' => $formData,
        ]);
    }
}
