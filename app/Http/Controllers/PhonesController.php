<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Phone;

class PhonesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function createPhone(Request $request){
        $data = $request->json()->all();

        $phone = Phone::create([
                'numero' => $data['numero'],
                'pais' => $data['pais'],
                'ciudad' => $data['ciudad'],
                'user_id' => $data['user_id']
            ]);
            return response()->json($phone,201);
    }

    
}
