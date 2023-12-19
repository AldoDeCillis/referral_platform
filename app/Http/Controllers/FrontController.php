<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\EncryptionService;

class FrontController extends Controller
{
    public function __construct(EncryptionService $encryptionService)
    {
        $this->encryptionService = $encryptionService;
    }

    public function home()
    {
        return view('welcome');
    }

    public function referrerRegister($hashed_id)
    {
        // $seller = User::findOrFail($this->encryptionService->decrypt($hashed_seller_id));

        return view('referrer.register', compact('hashed_id'));
    }

    public function refereeRegister($hashed_id)
    {
        return view('referee.register', compact('hashed_id'));
    }
}
