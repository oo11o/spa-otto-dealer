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


        $result = TetraUsers::select('user.*','tetra_customer.saldo')->where('email', $request->login)
            ->where('pass_md5', md5($request->pass))
            ->leftJoin('tetra_customer', 'user.id_tetra' , '=', 'tetra_customer.id_tetra')
            ->get()
            ->toArray();

        return new AuthResource($result);
    }
}
