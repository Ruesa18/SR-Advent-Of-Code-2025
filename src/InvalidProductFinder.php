<?php

namespace App;

class InvalidProductFinder {
    public function findSumOfInvalidProductsByFileContent(string $inputProductIdRanges): int {
        $productIdRanges = explode(',', $inputProductIdRanges);
        return $this->findInvalidProductsSum($productIdRanges);
    }

    /**
     * @param array<string> $productIdRanges
     * @return int
     */
    private function findInvalidProductsSum(array $productIdRanges): int {
        return array_sum(
            array_map(function(string $productIdRange) {
                $parts = explode('-', $productIdRange);
                return $this->findInvalidProductIdSumInRange((int) $parts[0], (int) $parts[1]);
            }, $productIdRanges)
        );
    }

    private function findInvalidProductIdSumInRange(int $start, int $end): int {
        $sum = 0;

        for($id = $start; $id <= $end; $id++) {
            if($this->isInvalidId($id)) {
                $sum += $id;
            }
        }
        return $sum;
    }

    public function isInvalidId(int $id): bool {
        if(strlen($id) % 2 === 0) {
            $halfLength = strlen($id) / 2;
            $start = substr($id, 0, $halfLength);
            $end = substr($id, $halfLength);
            if($start === $end) {
                return true;
            }
        }
        return false;
    }
}
