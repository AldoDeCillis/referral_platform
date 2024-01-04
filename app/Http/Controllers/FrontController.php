<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ApiCallService;
use App\Services\EncryptionService;

class FrontController extends Controller
{
    public $es;

    public function __construct(EncryptionService $es)
    {
        $this->es = $es;
    }

    public function home()
    {
        return view('welcome');
    }

    public function reservedArea()
    {
        return view('reserved-area');
    }

    public function referrerRegister($hashed_id)
    {
        $referrer = User::findOrFail($this->es->decrypt($hashed_id));

        return $referrer->id == $this->es->decrypt($hashed_id) ? view('referrer.register', compact('hashed_id')) : abort(404);
    }

    public function refereeRegister($hashed_id, ApiCallService $apiCallService)
    {
        $referrer = User::findOrFail($this->es->decrypt($hashed_id));

        return $referrer->id == $this->es->decrypt($hashed_id) ? view('referee.register', compact('hashed_id')) : abort(404);
    }
}
