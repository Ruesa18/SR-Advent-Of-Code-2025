<?php

namespace App;

class Config {
    public function getTaskSolutions(): array {
        return [
            '01' => function(array $input) {
                return new SafeBuster()->bustSafe($input);
            }
        ];
    }
}
