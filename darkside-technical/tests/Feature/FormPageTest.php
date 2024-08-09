<?php

namespace Tests\Feature;

use App\Models\Form;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the form page loads and returns a successful response.
     */
    public function test_form_page_returns_a_successful_response(): void
    {
        $response = $this->get('/my-details');

        $response->assertStatus(200);
    }

    /**
     * Test that the form data has successfully been created and the user redirected.
     */
    public function test_form_data_has_been_created(): void
    {
        $formData = [
            'name' => 'John Doe',
            'email' => 'john.doe@testmail.com',
            'phone' => '1234567890',
            'house_number' => '1234',
            'address_1' => 'Test Address',
            'address_2' => 'Test Address 2',
            'postcode' => '12345',
            'city' => 'Test City',
            'state' => 'Test State',
            'country' => 'Test Country',
        ];

        $response = $this->post('/add-details', $formData);

        $response->assertStatus(302);
        $response->assertRedirect('/my-details');

        $this->assertDatabaseHas('form', $formData);
    }

    /**
     * Test that the form data has successfully been updated and the user redirected.
     */
    public function test_form_data_has_been_updated(): void
    {
        $formData = [
            'name' => 'John Doe',
            'email' => 'john.doe@testmail.com',
            'phone' => '1234567890',
            'house_number' => '1234',
            'address_1' => 'Test Address',
            'address_2' => 'Test Address 2',
            'postcode' => '12345',
            'city' => 'Test City',
            'state' => 'Test State',
            'country' => 'Test Country',
        ];

        $this->post('/add-details', $formData);

        $createdForm = Form::where($formData)->first();

        $updatedFormData = array_merge($createdForm->toArray(), ['name' => 'Jane Doe']);

        $response = $this->put('/edit-details', $updatedFormData);

        $response->assertStatus(302);
        $response->assertRedirect('/my-details');

        $this->assertDatabaseHas('form', $updatedFormData);
    }

    /**
     * Test that the form data has successfully been deleted and the user redirected.
     */
    public function test_form_data_has_been_deleted(): void
    {
        $formData = [
            'name' => 'John Doe',
            'email' => 'john.doe@testmail.com',
            'phone' => '1234567890',
            'house_number' => '1234',
            'address_1' => 'Test Address',
            'address_2' => 'Test Address 2',
            'postcode' => '12345',
            'city' => 'Test City',
            'state' => 'Test State',
            'country' => 'Test Country',
        ];

        $this->post('/add-details', $formData);

        $createdForm = Form::where($formData)->first();

        $response = $this->delete('/delete-details', ['id' => $createdForm->id]);

        $response->assertStatus(302);
        $response->assertRedirect('/my-details');

        $this->assertDatabaseMissing('form', $createdForm->toArray());
    }
}
