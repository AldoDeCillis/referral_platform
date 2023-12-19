<?php

namespace App\Contracts;

interface EncryptionInterface
{
    public function encrypt(int $id);

    public function decrypt(string $hashed_id);
}
