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
    $request->assertRedirect(route('dashboard'));
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260) . '?']);

});

it('should check if ends with question mark ?', function () {

});

it('should have at least 10 characters', function () {

});

/*
test('titulo qualquer', function() {
    expect(true)->toBeTrue();
});
 */
