<?php

namespace App;

class SafeBuster {
    public function bustSafe(array $instructions): int {
        $zeroCounter = 0;
        $currentNumber = 50;
        foreach($instructions as $instruction) {
            if($instruction === '') {
                return $zeroCounter;
            }
            $currentNumber = $this->solveWithInstruction($instruction, $currentNumber);

            if($currentNumber === 0) {
                $zeroCounter++;
            }
        }
        return $zeroCounter;
    }

    private function solveWithInstruction(string $instruction, int $currentNumber): int {
        $direction = $instruction[0];
        $amount = (int) substr($instruction, 1);

        if($direction === 'L') {
            $currentNumber -= $amount;
        }else {
            $currentNumber += $amount;
        }

        return (($currentNumber % 100) + 100) % 100;
    }
}
