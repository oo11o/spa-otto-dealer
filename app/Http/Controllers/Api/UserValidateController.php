<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Models\TetraUsers;
use App\Models\User;
use Illuminate\Http\Request;

class UserValidateController extends Controller
{
    public function index(Request $request){


        $result = TetraUsers::where('email', $request->login)
            ->where('pass_md5', md5($request->pass))
            ->get()
            ->toArray();

        return new AuthResource($result);
    }
}
