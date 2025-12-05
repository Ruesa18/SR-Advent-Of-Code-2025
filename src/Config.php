<?php

namespace App;

class Config {
    public function getTaskSolutions(): array {
        return [
            '01-1' => function(array $input) {
                return new SafeBuster()->bustSafe($input);
            },
            '01-2' => function(array $input) {
                return new SafeBuster()->bustSafeWithAllZeroes($input);
            },
            '02' => function(array $input) {
                return new InvalidProductFinder()->findSumOfInvalidProductsByFileContent($input[0]);
            }
        ];
    }
}
