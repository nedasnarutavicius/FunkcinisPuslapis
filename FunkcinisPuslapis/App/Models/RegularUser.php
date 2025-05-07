<?php

namespace App\Models;

use App\Core\AbstractUser;
use App\Core\AuthInterface;

class RegularUser extends AbstractUser implements AuthInterface {

    public function gautiVartotojoTipa() {
        return "Paprastas vartotojas";
    }

    public function prisijungti($pastas, $slaptazodis) {
        if ($pastas === $this->pastas && password_verify($slaptazodis, $this->slaptazodis)) {
            return "Paprastas vartotojas sėkmingai prisijungė!";
        }
        return "Neteisingi prisijungimo duomenys.";
    }

    public function atsijungti() {
        return "Paprastas vartotojas atsijungė.";
    }
}
