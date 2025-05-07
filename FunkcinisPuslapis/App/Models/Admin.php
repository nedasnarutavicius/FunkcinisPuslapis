<?php

namespace App\Models;

use App\Core\AbstractUser;
use App\Core\AuthInterface;
use App\Core\LoggerTrait;

class Admin extends AbstractUser implements AuthInterface {
    use LoggerTrait;

    public function gautiVartotojoTipa() {
        return "Administratorius";
    }

    public function prisijungti($pastas, $slaptazodis) {
        if ($pastas === $this->pastas && password_verify($slaptazodis, $this->slaptazodis)) {
            $this->loguotiVeiksma("Administratorius {$this->vardas} prisijungė.");
            return "Administratorius sėkmingai prisijungė!";
        }
        return "Neteisingi prisijungimo duomenys.";
    }

    public function atsijungti() {
        $this->loguotiVeiksma("Administratorius {$this->vardas} atsijungė.");
        return "Administratorius atsijungė.";
    }
}
