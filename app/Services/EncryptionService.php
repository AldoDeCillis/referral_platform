<?php

namespace App\Services;

use App\Contracts\EncryptionInterface;
use Hashids\Hashids;

class EncryptionService implements EncryptionInterface
{
    private $hasher;

    public function __construct()
    {
        $this->hasher = new Hashids('jslwnry820knb46729wdshfiw3', 8);
    }

    public function encrypt(int $id)
    {
        return $this->hasher->encode($id);
    }

    public function decrypt(string $hashed_id)
    {
        if (count($this->hasher->decode($hashed_id))) {
            return $this->hasher->decode($hashed_id)[0];
        } else {
            return null;
        }
    }
}
