<?php

namespace App\Tests;

use App\SafeBuster;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(SafeBuster::class)]
class SafeBusterTest extends TestCase {
    #[DataProvider('getSafeTestNumbers')]
    public function testBustSafe(string $filePath, int $expectedCount): void {
        $data = file_get_contents(__DIR__. '/Ressources/'.$filePath);
        $dataArray = explode("\n", $data);

        $safeBuster = new SafeBuster();

        $actualCount = $safeBuster->bustSafe($dataArray);
        self::assertEquals($expectedCount, $actualCount);
    }

    public static function getSafeTestNumbers(): array {
        return [
            'test' => [
                'filePath' => 'task_01.txt',
                'expectedCount' => 3,
            ],
        ];
    }
}
