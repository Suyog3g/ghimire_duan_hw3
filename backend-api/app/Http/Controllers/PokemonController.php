<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request; // Import the Request class

class PokemonController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */


     public function getAll() {
        $pokemons = Pokemon::all();
        return response()->json($pokemons);
    }

    public function getOne($id) {
        $pokemon = Pokemon::find($id);
        return response()->json($pokemon);
    }

    public function save(Request $request) {
       $this->validate($request, [
           'name' => 'required',
           'weight' => 'required',
           'height' => 'required',
           'abilities' => 'required'
       ]);
       $pokemon = Pokemon::create($request->all());
       return response()->json($pokemon, 201);
   }

   public function update(Request $request, $id) {
    $pokemon = Pokemon::findOrFail($id);

    $this->validate($request, [
        'name' => 'required',
        'weight' => 'required',
        'height' => 'required',
        'abilities' => 'required'
    ]);
    $pokemon->update($request->all());
    return response()->json($pokemon);
    }

    public function delete($id) {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->delete();
        return response()->json(null, 204);
    }
}
