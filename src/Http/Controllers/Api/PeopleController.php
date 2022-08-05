<?php

namespace AlexMinichino\Swapi\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Photo;
use AlexMinichino\Swapi\Models\People;
use AlexMinichino\Swapi\Models\Planet;

class PeopleController extends Controller
{
   public function index(){
      $people = People::with('planet')->paginate(5)->withQueryString();
      $people->makeHidden('homeworld_id');
      return response()->json($people);
   }

   public function show($id){
      $people = People::with('planet')->find($id);
      $people->makeHidden('homeworld_id');
      return response()->json($people);
   }
}
