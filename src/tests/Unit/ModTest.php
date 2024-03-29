<?php

use App\Models\Mod;

test('create Mod', function () {
    $mod = Mod::factory()->make();
    $response = $this->postJson('/api/v1/mods', $mod->attributestoArray());
    $response->assertStatus(201);

    $this->assertDatabaseHas('mods', $mod->attributestoArray());
});

test('get Mod', function () {
    $mod = Mod::factory()->create();

    $response = $this->get("/api/v1/mods/{$mod->id}");

    $response->assertOk();
    $response->assertJsonFragment([
        "id" => $mod->id,
        "name" => $mod->name,
        "author" => $mod->author_id,
    ]);
});


test('put Mod', function () {
    $mod = Mod::factory()->create();
    $updatedMod = [
        'name' => 'new mod name' . $mod->name,
    ];

    $this->assertDatabaseHas('mods', $mod->attributesToArray());

    $this->putJson("/api/v1/mods/{$mod->id}", $updatedMod)
    ->assertStatus(200);
    $this->assertDatabaseHas('mods', ["id" => $mod->id , ...$updatedMod]);
});

test('patch Mod', function () {
    $mod = Mod::factory()->create();
    $updatedMod = [
        'name' => 'new mod 2'. $mod->name,
    ];

    $this->assertDatabaseHas('mods', $mod->attributesToArray());

    $this->putJson("/api/v1/mods/{$mod->id}", $updatedMod)
    ->assertStatus(200);
    $this->assertDatabaseHas('mods', ["id" => $mod->id , ...$updatedMod]);
});

test('delete Mod', function () {
    $mod = Mod::factory()->create();
    $response = $this->deleteJson("/api/v1/mods/{$mod->id}");
    $response->assertStatus(200);
    $this->assertDatabaseMissing('mods', ["id" => $mod->id ]);
});

test('get failed Mod', function () {
    $response = $this->getJson("/api/v1/mods/disallowed_id");

    $response->assertStatus(500);
});
