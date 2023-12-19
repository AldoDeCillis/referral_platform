<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository implements RepositoryInterface
{
    public static function create(Request $request)
    {
        return User::create($request->validated());
    }
}
