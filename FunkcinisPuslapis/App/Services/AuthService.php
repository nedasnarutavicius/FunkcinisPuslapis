<?php

namespace App\Services;

use App\Core\AuthInterface;


class AuthService {

    public function autentifikuoti(AuthInterface $vartotojas, $pastas, $slaptazodis) {
        return $vartotojas->prisijungti($pastas, $slaptazodis);
    }

}
