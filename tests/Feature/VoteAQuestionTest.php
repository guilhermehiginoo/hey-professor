<?php

use App\Models\{User};

use function Pest\Laravel\{actingAs, assertDatabaseHas, post};

it('should be able to like a question', function () {
    $user     = User::factory()->create();
    $question = App\Models\Question::factory()->create();

    actingAs($user);

    post(route('question.like', $question))
        ->assertRedirect();

    assertDatabaseHas('votes', [
        'question_id' => $question->id,
        'like'        => 1,
        'unlike'      => 0,
        'user_id'     => $user->id,
    ]);

    // SELECT * FROM votes WHERE question_id = ?
    // AND like = 1 AND unlike = 0 AND USER_ID = ? EXISTS

});

it('should not be to like more than 1 time', function () {
    $user     = User::factory()->create();
    $question = App\Models\Question::factory()->create();

    actingAs($user);

    post(route('question.like', $question));

    expect($user->votes()->where('question_id', '=', $question->id)->get())->toHaveCount(1);
});

it('should be able to unlike a question', function () {
    $user     = User::factory()->create();
    $question = App\Models\Question::factory()->create();

    actingAs($user);

    post(route('question.unlike', $question))
        ->assertRedirect();

    assertDatabaseHas('votes', [
        'question_id' => $question->id,
        'like'        => 0,
        'unlike'      => 1,
        'user_id'     => $user->id,
    ]);

    // SELECT * FROM votes WHERE question_id = ?
    // AND unlike = 1 AND ununlike = 0 AND USER_ID = ? EXISTS

});

it('should not be to unlike more than 1 time', function () {
    $user     = User::factory()->create();
    $question = App\Models\Question::factory()->create();

    actingAs($user);

    post(route('question.unlike', $question));

    expect($user->votes()->where('question_id', '=', $question->id)->get())->toHaveCount(1);
});
