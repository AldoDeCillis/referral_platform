<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function referrerRegister($hashed_id, CreateUserRequest $request)
    {
        $user = UserRepository::create($request);
        Auth::login($user);

        return redirect()->route('home')->with('userCreated', 'l\'utente è stato correttamente creato');
    }

    public function refereeRegister($hashed_id, CreateUserRequest $request)
    {
        $user = UserRepository::create($request);

        return redirect()->route('home')->with('userCreated', 'l\'utente è stato correttamente creato');
    }
}
