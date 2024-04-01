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
        $pokemons = Pokemon::find($id);
        return response()->json($pokemons);
    }

    public function save(Request $request) {
       $this->validate($request, [
           'name' => 'required',
           'weight' => 'required',
           'height' => 'required',
           'abilities' => 'required'
       ]);
       $pokemons = Pokemon::create($request->all());
       return response()->json($pokemons, 201);
   }

   public function update(Request $request, $id) {
    $pokemons = Pokemon::findOrFail($id);

    $this->validate($request, [
        'name' => 'required',
        'weight' => 'required',
        'height' => 'required',
        'abilities' => 'required'
    ]);
    $pokemons->update($request->all());
    return response()->json($pokemons);
    }

    public function delete($id) {
        $pokemons = Pokemon::findOrFail($id);
        $pokemons->delete();
        return response()->json(null, 204);
    }
}
