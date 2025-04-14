<?php

namespace Tests\Feature;

use App\Models\Dojo;
use App\Models\Ninja;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index page loads correctly.
     */


    /**
     * Test the show page displays the correct ninja.
     */


    /**
     * Test the create page loads correctly.
     */
    public function test_create_page_loads_successfully()
    {
        // Create a dojo for the dropdown
        $dojo = Dojo::factory()->create();

        // Make request to the create page
        $response = $this->get('/ninjas/create');

        // Assert response status and that we can see the form
        $response->assertStatus(200);
        $response->assertSee('Create New Ninja');
        $response->assertSee($dojo->name);
    }

    /**
     * Test storing a new ninja.
     */
    public function test_store_creates_new_ninja()
    {
        // Create a dojo for the foreign key
        $dojo = Dojo::factory()->create();

        $ninjaData = [
            'name' => 'Test Ninja',
            'skill' => 75,
            'bio' => 'This is a test ninja with at least twenty characters in the bio.',
            'dojo_id' => $dojo->id
        ];

        $response = $this->post('/ninjas', $ninjaData);

        // Assert it redirects to index
        $response->assertRedirect('/ninjas');

        // Assert the ninja was created in the database
        $this->assertDatabaseHas('ninjas', [
            'name' => 'Test Ninja',
            'skill' => 75,
        ]);
    }

    /**
     * Test validation errors when storing a ninja.
     */
    public function test_store_validation_errors()
    {
        // Submit invalid data
        $response = $this->post('/ninjas', [
            'name' => '', // Missing required field
            'skill' => 150, // Exceeds maximum
            'bio' => 'Too short', // Less than 20 chars
            'dojo_id' => 999 // Non-existent dojo
        ]);

        // Assert validation failed
        $response->assertSessionHasErrors(['name', 'skill', 'bio', 'dojo_id']);
    }

    /**
     * Test deleting a ninja.
     */

}
