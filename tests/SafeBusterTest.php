<?php

namespace App\Tests;

use App\SafeBuster;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SafeBuster::class)]
class SafeBusterTest extends TestCase {
    public function testBustSafe(): void {
        $data = file_get_contents(__DIR__ . '/Ressources/task_01.txt');
        $dataArray = explode("\n", $data);

        $safeBuster = new SafeBuster();

        $actualCount = $safeBuster->bustSafe($dataArray);
        self::assertEquals(3, $actualCount);
    }

    public function testBustSafeWithAllZeroes(): void {
        $data = file_get_contents(__DIR__. '/Ressources/task_01.txt');
        $dataArray = explode("\n", $data);

        $safeBuster = new SafeBuster();

        $actualCount = $safeBuster->bustSafeWithAllZeroes($dataArray);
        self::assertEquals(6, $actualCount);
    }
}
