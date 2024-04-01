<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokemonController extends Controller {
    /**
     * Get all Pokémon
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll() {
        $pokemon = Pokemon::all();
        return response()->json($pokemon);
    }

    /**
     * Get a single Pokémon by ID
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getOne($id) {
        $pokemon = Pokemon::find($id);
        if (!$pokemon) {
            return response()->json(['message' => 'Pokémon not found'], 404);
        }
        return response()->json($pokemon);
    }

    /**
     * Save a new Pokémon
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request) {
        // Validate the request
        $this->validate($request, [
            'name' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'abilities' => 'required|array',
        ]);

        // Create the Pokémon
        $pokemon = new Pokemon([
            'name' => $request->name,
            'weight' => $request->weight,
            'height' => $request->height,
            'abilities' => $request->abilities,
        ]);
        $pokemon->save();

        return response()->json($pokemon, 201);
    }

    /**
     * Update an existing Pokémon
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $pokemon = Pokemon::findOrFail($id);

        // Validate the request
        $this->validate($request, [
            'name' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'abilities' => 'required|array',
        ]);

        // Update the Pokémon
        $pokemon->update([
            'name' => $request->name,
            'weight' => $request->weight,
            'height' => $request->height,
            'abilities' => $request->abilities,
        ]);

        return response()->json($pokemon);
    }

    /**
     * Delete a Pokémon
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->delete();
        return response()->json(null, 204);
    }
}
