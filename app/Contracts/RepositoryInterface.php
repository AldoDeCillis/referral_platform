<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface RepositoryInterface
{
    public static function create(Request $request);
}
