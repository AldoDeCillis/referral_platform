<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiCreateUserRequest;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\City;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\ApiCallService;

class ApiController extends Controller
{
    public function __construct(private ApiCallService $apiCallService)
    {

    }

    public function searchCity($cityName)
    {
        $cities = City::where('name', 'like', '%'.$cityName.'%')->get();

        return compact('cities');
    }

    public function userIndex()
    {
        $users = User::all();

        return new UserCollection($users);
    }

    public function userStore(ApiCreateUserRequest $request)
    {
        try {
            $user = UserRepository::create($request);
            $response = new ApiSuccessResponse('Utente creato', 201, $user);
            $this->apiCallService->LogApiCall('success', 201, $request->all(), $response, $user);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response;
    }

    public function userShow(User $user)
    {
        $user = User::find($user->id);

        return new UserResource($user);
    }

    public function userUpdate(User $user, ApiCreateUserRequest $request)
    {
        $user = User::find($user->id);
        $user->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
        ]);

        return $user;
    }

    public function userDestroy(User $user)
    {
        return $user->delete();
    }
}
