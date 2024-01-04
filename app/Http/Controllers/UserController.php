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
        $user->update(['crm_status' => 'referrer']);
        Auth::login($user);

        return redirect()->route('home')->with('userCreated', 'l\'utente è stato correttamente creato');
    }

    public function refereeRegister($hashed_id, CreateUserRequest $request)
    {
        $payload = UserRepository::create($request);
        $payload->update(['crm_status' => 'referee']);

        return redirect()->route('home')->with('userCreated', 'l\'utente è stato correttamente creato');
    }
}
