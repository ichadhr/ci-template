<?php

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2'                                       => TRUE,
        'array_indentation'                           => TRUE,
        'array_syntax'                                => ['syntax' => 'short'],
        'combine_consecutive_unsets'                  => TRUE,
        'multiline_whitespace_before_semicolons'      => TRUE,
        'single_quote'                                => TRUE,
        'cast_spaces'                                 => TRUE,
        'concat_space'                                => ['spacing' => 'one'],
        'declare_equal_normalize'                     => TRUE,
        'function_typehint_space'                     => TRUE,
        'include'                                     => TRUE,
        'lowercase_cast'                              => TRUE,
        'no_multiline_whitespace_around_double_arrow' => TRUE,
        'no_spaces_around_offset'                     => TRUE,
        'no_whitespace_before_comma_in_array'         => TRUE,
        'no_whitespace_in_blank_line'                 => TRUE,
        'object_operator_without_whitespace'          => TRUE,
        'single_blank_line_before_namespace'          => TRUE,
        'trim_array_spaces'                           => TRUE,
        'unary_operator_spaces'                       => TRUE,
        'whitespace_after_comma_in_array'             => TRUE,
        'constant_case'                               => ['case' => 'upper'],
        'no_trailing_whitespace_in_comment'           => TRUE,
        'no_empty_comment'                            => TRUE,
        'elseif'                                      => TRUE,
        'simplified_if_return'                        => TRUE,
        'switch_case_semicolon_to_colon'              => TRUE,
        'function_typehint_space'                     => TRUE,
        'combine_consecutive_issets'                  => TRUE,
        'combine_consecutive_unsets'                  => TRUE,
        'blank_line_after_namespace'                  => TRUE,
        'clean_namespace'                             => TRUE,
        'new_with_braces'                             => TRUE,
        'object_operator_without_whitespace'          => TRUE,
        'ternary_operator_spaces'                     => TRUE,
        'ternary_to_null_coalescing'                  => TRUE,
        'blank_line_after_opening_tag'                => TRUE,
        'phpdoc_indent'                               => TRUE,
        'semicolon_after_instruction'                 => TRUE,
        'no_spaces_inside_parenthesis'                => TRUE,

        'phpdoc_no_alias_tag' => [
            'replacements' => [
                'property-read'  => 'property',
                'property-write' => 'property',
                'type'           => 'var',
                'link'           => 'website'
            ]
        ],
        'echo_tag_syntax' => [
            'format' => 'long'
        ],
        'concat_space' => [
            'spacing' => 'one'
        ],
        'return_type_declaration' => [
            'space_before' => 'one'
        ],
        'yoda_style' => [
            'always_move_variable' => TRUE
        ],
        'no_extra_blank_lines' => [
            'tokens' => [
                'break', 'case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block', 'return', 'square_brace_block', 'switch', 'throw', 'use', 'use_trait'
            ]
        ],
        'braces' => [
            'allow_single_line_closure' => TRUE,
        ],
        'binary_operator_spaces' => [
            'default'   => 'single_space',
            'operators' => [
                '=>' => 'align_single_space_minimal',
                '='  => 'align',
            ]
        ],
    ])
    ->setIndent("\t")
    ->setLineEnding("\n");
