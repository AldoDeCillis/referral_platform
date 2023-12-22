<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository implements RepositoryInterface
{
    public static function create(Request $request)
    {
        $payload = self::getPayload($request);

        return User::create($payload);
    }

    private static function getPayload(Request $request)
    {
        $payload = $request->validated();
        if ($request->input('city_id')) {
            $city = City::find($request->input('city_id'));
            $payload = array_merge($payload, ['city' => $city?->name, 'province' => $city?->province, 'region' => $city?->region]);
        }

        return $payload;
    }
}
