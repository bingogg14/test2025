<?php
declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__.'/app',
        __DIR__.'/routes',
//        __DIR__.'/tests',
    ])
    ->name('*.php')
    ->exclude([
        'bootstrap',
        'resources/lang',
        'vendor',
        'storage',
        'var',
    ])
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setUsingCache(true)
    ->setCacheFile(__DIR__.'/var/cache/.php-cs.cache')
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12'                             => true,
        'declare_strict_types'               => true,
        'array_syntax'                       => ['syntax' => 'short'],
        'binary_operator_spaces'             => [
            'default'   => 'align_single_space_minimal',
            'operators' => ['=>' => 'align_single_space_minimal'],
        ],
        'trailing_comma_in_multiline'        => ['elements' => ['arrays']],
        'method_argument_space'              => [
            'on_multiline'                     => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => true,
        ],
        'no_unused_imports'                  => true,
        'ordered_imports'                    => ['sort_algorithm' => 'alpha'],
        'single_blank_line_before_namespace' => true,
        'blank_lines_before_namespace'       => false,
        'blank_line_before_statement'        => ['statements' => ['return']],
        'blank_line_after_namespace'         => true,
        'blank_line_after_opening_tag'       => true,
        'single_line_after_imports'          => true,
        'no_trailing_whitespace_in_string'   => true,
        'no_extra_blank_lines'               => ['tokens' => ['extra']],
        'class_attributes_separation'        => ['elements' => ['method' => 'one']],
        'phpdoc_trim'                        => true,
        'phpdoc_align'                       => ['align' => 'left'],
        'phpdoc_separation'                  => false,
        'phpdoc_order'                       => true,
        'phpdoc_summary'                     => false,
        'no_superfluous_phpdoc_tags'         => true,
        'return_type_declaration'            => ['space_before' => 'none'],
        'new_with_braces'                    => true,
        'concat_space'                       => ['spacing' => 'one'],
    ])
    ->setFinder($finder);
