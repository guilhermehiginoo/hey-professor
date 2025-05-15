<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get};

it('should list the searched question', function () {
    // Arrange
    $user = User::factory()->create();
    Question::factory()->create(['question' => 'Something else?']);
    Question::factory()->create(['question' => 'My question is?']);

    actingAs($user);

    $response = get(route('dashboard', ['search' => 'question']));

    $response->assertDontSee('Something else?');
    $response->assertSee('My question is?');

});
