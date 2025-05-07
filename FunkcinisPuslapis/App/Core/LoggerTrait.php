<?php

namespace App\Core;

trait LoggerTrait {
    public function loguotiVeiksma($zinute) {
        echo "[VEIKSMO ŽURNALAS]: " . $zinute . "<br>";
    }
}
