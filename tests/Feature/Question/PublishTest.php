<?php

use function Pest\Laravel\{actingAs, put};

it('should be abe to publish a question', function () {
    $user     = \App\Models\User::factory()->create();
    $question = \App\Models\Question::factory()->create(['draft' => true]);

    actingAs($user);

    put(route('question.publish', $question))
        ->assertRedirect();

    $question->refresh();
    expect($question)
        ->draft->toBeFalse();

});

it('should make sure that only the person who has created the question can publish it', function () {

});
