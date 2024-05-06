<?php

declare(strict_types=1);

// require __DIR__ . '/vendor/autoload.php';
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths(
        [
            __DIR__ . '/application/controllers',
            __DIR__ . '/application/migrations',
            __DIR__ . '/application/models',
        ]
    );

    $rectorConfig->sets(
        [
            SetList::CODE_QUALITY,
            SetList::CODING_STYLE,
            SetList::DEAD_CODE,
            SetList::PHP_82,
        ]
    );

    $rectorConfig->rules([AddVoidReturnTypeWhereNoReturnRector::class]);

    $rectorConfig->skip([]);
};
