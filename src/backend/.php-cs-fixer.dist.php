<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    // チェックするディレクトリの指定
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ . '/routes',
        __DIR__ . '/lang',
        __DIR__ . '/tests',
    ]);

$config = new PhpCsFixer\Config();

return $config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2'             => true,
        '@PhpCsFixer'       => true,
        'no_unused_imports' => true,
        'no_superfluous_phpdoc_tags' => false,
        'phpdoc_summary' => false,
    ])
    ->setFinder($finder);
