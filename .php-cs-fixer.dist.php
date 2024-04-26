<?php

use PhpCsFixer\Config;

return (new Config())
    ->setRules([
        '@PHP73Migration' => true,
        '@PhpCsFixer' => true,
        '@PSR12' => true,
        'class_attributes_separation' => ['elements' => ['method' => 'one']],
        'class_definition' => ['single_line' => true, 'inline_constructor_arguments' => false, 'space_before_parenthesis' => true],
        'class_reference_name_casing' => true,
        'concat_space' => ['spacing' => 'one'],
        'echo_tag_syntax' => ['format' => 'short'],
        'empty_loop_body' => true,
        'empty_loop_condition' => true,
        'explicit_string_variable' => false,
        'increment_style' => false,
        'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
        'no_superfluous_phpdoc_tags' => ['allow_mixed' => true],
        'no_trailing_comma_in_singleline_array' => false,
        'no_trailing_comma_in_singleline_function_call' => false,
        'no_unneeded_import_alias' => true,
        'ordered_class_elements' => [
            'order' => [
                'use_trait',
                'case',
                'constant_public',
                'constant_protected',
                'constant_private',
                'property_public',
                'property_protected',
                'property_private',
            ],
        ],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'php_unit_test_class_requires_covers' => false,
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_separation' => false,
        'phpdoc_summary' => false,
        'simple_to_complex_string_variable' => false,
        'single_line_comment_style' => ['comment_types' => ['hash']],
        'single_line_empty_body' => false,
        'space_after_semicolon' => ['remove_in_empty_for_expressions' => true],
    ])
    ->setLineEnding("\n")
;
