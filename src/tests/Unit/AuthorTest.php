<?php
use App\Models\Author;

test('create Author', function () {
    $author = Author::factory()->make();
    $response = $this->postJson('/api/v1/authors', $author->attributestoArray());
    $response->assertStatus(201);

    $this->assertDatabaseHas('authors', $author->attributestoArray());
});

test('get Author', function () {
    $author = Author::factory()->create();

    $response = $this->get("/api/v1/authors/{$author->id}");

    $response->assertOk();
    $response->assertJsonFragment([
        "id" => $author->id,
        "name" => $author->name
    ]);
});


test('put Author', function () {
    $author = Author::factory()->create();
    $updatedAuthor = [
        'name' => 'new author name' . $author->name,
    ];

    $this->assertDatabaseHas('authors', $author->attributesToArray());

    $this->putJson("/api/v1/authors/{$author->id}", $updatedAuthor)
    ->assertStatus(200);
    $this->assertDatabaseHas('authors', ["id" => $author->id , ...$updatedAuthor]);
});

test('patch Author', function () {
    $author = Author::factory()->create();
    $updatedAuthor = [
        'name' => 'new author 2'. $author->name,
    ];

    $this->assertDatabaseHas('authors', $author->attributesToArray());

    $this->putJson("/api/v1/authors/{$author->id}", $updatedAuthor)
    ->assertStatus(200);
    $this->assertDatabaseHas('authors', ["id" => $author->id , ...$updatedAuthor]);
});

test('delete Author', function () {
    $author = Author::factory()->create();
    $response = $this->deleteJson("/api/v1/authors/{$author->id}");
    $response->assertStatus(200);
});

test('get failed Author', function () {
    $response = $this->getJson("/api/v1/authors/disallowed_id");

    $response->assertStatus(500);
});
