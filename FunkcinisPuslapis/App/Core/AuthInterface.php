<?php

namespace App\Core;

interface AuthInterface {
    public function prisijungti($pastas, $slaptazodis);

    public function atsijungti();
}
