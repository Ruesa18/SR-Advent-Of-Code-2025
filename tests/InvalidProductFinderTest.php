<?php

use App\InvalidProductFinder;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(InvalidProductFinder::class)]
class InvalidProductFinderTest extends TestCase {
    #[DataProvider('provideIsInvalidIdData')]
    public function testIsInvalidId(int $id, bool $expected): void {
        $invalidProductFinder = new InvalidProductFinder();

        $actual = $invalidProductFinder->isInvalidId($id);
        self::assertSame($expected, $actual);
    }

    public static function provideIsInvalidIdData(): array {
        return [
            [
                'id' => 11,
                'expected' => true,
            ],
            [
                'id' => 12,
                'expected' => false,
            ],
            [
                'id' => 22,
                'expected' => true,
            ],
            [
                'id' => 1010,
                'expected' => true,
            ],
            [
                'id' => 1011,
                'expected' => false,
            ],
            [
                'id' => 1188511885,
                'expected' => true,
            ],
        ];
    }

    public function testFindInvalidProductsSum(): void {
        $data = file_get_contents(__DIR__. '/Ressources/task_02.txt');
        $dataArray = explode("\n", $data);

        $invalidProductFinder = new InvalidProductFinder();

        $actualSum = $invalidProductFinder->findSumOfInvalidProductsByFileContent($dataArray[0]);
        self::assertEquals(1227775554, $actualSum);
    }
}
