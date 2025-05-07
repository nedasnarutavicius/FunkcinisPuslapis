<?php

namespace App\Core;

abstract class AbstractUser {
    protected $vardas;
    protected $pastas;
    protected $slaptazodis;

    
    public function __construct($vardas, $pastas, $slaptazodis) {
        $this->vardas = $vardas;
        $this->pastas = $pastas;
        $this->slaptazodis = password_hash($slaptazodis, PASSWORD_DEFAULT); // slaptažodžio hash
    }

    public function gautiVarda() {
        return $this->vardas;
    }

    public function gautiPasta() {
        return $this->pastas;
    }

    abstract public function gautiVartotojoTipa();
}
