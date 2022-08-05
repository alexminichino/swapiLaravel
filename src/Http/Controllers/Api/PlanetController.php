<?php

namespace AlexMinichino\Swapi\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Photo;
use AlexMinichino\Swapi\Models\People;
use AlexMinichino\Swapi\Models\Planet;

class PlanetController extends Controller
{
   public function index(){
      $planets = Planet::paginate(5)->withQueryString();
      return response()->json($planets);
   }

   public function show($id){
      $planet = Planet::find($id);
      return response()->json($planet);
   }
}
