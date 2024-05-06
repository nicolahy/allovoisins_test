<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = (new Finder())
    ->in(__DIR__ . '/application/controllers')
    ->in(__DIR__ . '/application/migrations')
    ->in(__DIR__ . '/application/models')
    ->append([__DIR__ . '/rector.php', __FILE__])
;

return (new Config())
    ->setRules(
        [
            '@PhpCsFixer' => true,
            'blank_line_before_statement' => [
                'statements' => [
                    'case',
                    'continue',
                    'declare',
                    'default',
                    'exit',
                    'goto',
                    'include',
                    'include_once',
                    'phpdoc',
                    'require',
                    'require_once',
                    'return',
                    'switch',
                    'throw',
                    'try',
                    'yield',
                    'yield_from',
                ],
            ],
            'concat_space' => ['spacing' => 'one'],
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last',
                'sort_algorithm' => 'none',
            ],
            'php_unit_internal_class' => false,
            'php_unit_test_class_requires_covers' => false,
            'phpdoc_no_empty_return' => false,
            'no_superfluous_phpdoc_tags' => false,
            'single_line_empty_body' => false,
        ]
    )
    ->setFinder($finder)
;
