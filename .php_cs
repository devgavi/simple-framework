<?php

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'strict_param' => false,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setUsingCache(false)
    ->setFinder(
      PhpCsFixer\Finder::create()
        ->in(__DIR__ . '/app/')
    );
;
