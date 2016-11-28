<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Things;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;

class ThingController extends Controller
{
    public function thingAndChannel()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $things = Things::with('channels')->where('user_id', $user->id)->get();

        return response()->json([
                'success' => true,
                'data' => compact('things')
            ]

        );

    }
}
