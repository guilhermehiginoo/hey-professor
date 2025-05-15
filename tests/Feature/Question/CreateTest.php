<?php

// Utilizando pest, temos um conceito mais simplificado para escrita

// a diferença de test e it é que uma função it() adiciona "it" na frente

use App\Models\User;

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, post};

it('should be able to create a new question bigger than 255 characters', function () {
    // Arrange :: preparar
    $user = User::factory()->create();
    actingAs($user);
    // função que faz eu logar no meu teste como usuário

    // Act :: agir
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',

    ]);
    // Assert :: verificar
    $request->assertRedirect();
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260) . '?']);

});

it('should create as a draft all the time', function () {
    // Arrange :: preparar
    $user = User::factory()->create();
    actingAs($user);
    // função que faz eu logar no meu teste como usuário

    // Act :: agir
    post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',

    ]);

    // Assert :: verificar
    assertDatabaseHas('questions', [
        'question' => str_repeat('*', 260) . '?',
        'draft'    => true]);

});

it('should check if ends with question mark ?', function () {
    // Arrange :: preparar
    $user = User::factory()->create();
    actingAs($user);

    // Act :: agir
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 10),

    ]);

    // Assert :: verificar
    $request->assertSessionHasErrors([
        'question' => 'Are you sure that is a question? It is missing the question mark (?) in the end.',
    ]);
    assertDatabaseCount('questions', 0);

});

it('should have at least 10 characters', function () {
    // Arrange :: preparar
    $user = User::factory()->create();

    actingAs($user);

    // Act :: agir
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 8) . '?',

    ]);

    // Assert :: verificar
    $request->assertSessionHasErrors(['question' => __('validation.min.string', ['min' => 10, 'attribute' => 'question'])]);
    assertDatabaseCount('questions', 0);

});

test('only authenticated users can create questions', function () {
    post(route('question.store'), [
        'question' => str_repeat('*', 8) . '?',
    ])->assertRedirect(route('login'));
});

test('question shold be unique', function () {
    $user = User::factory()->create();
    actingAs($user);

    \App\Models\Question::factory()->create(['question' => 'Any question?']);

    post(route('question.store'), [
        'question' => 'Any question?',
    ])->assertSessionHasErrors(['question' => 'This question already exists.']);

});
