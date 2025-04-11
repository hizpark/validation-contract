<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->name('*.php');

return (new PhpCsFixer\Config())
    ->setRules([
        // ✅ 遵循 PSR-12 标准
        '@PSR12' => true,

        // ✅ 强制开启严格类型声明（文件顶部必须有 declare(strict_types=1);）
        'declare_strict_types' => true,

        // ✅ 使用短数组语法 []
        'array_syntax' => ['syntax' => 'short'],

        // ✅ 二元运算符对齐，增强可读性
        'binary_operator_spaces' => ['default' => 'align_single_space_minimal'],

        // ✅ return 前强制添加空行
        'blank_line_before_statement' => ['statements' => ['return']],

        // ✅ import 顺序按字母排序
        'ordered_imports' => ['sort_algorithm' => 'alpha'],

        // ✅ 删除未使用的 use 引入
        'no_unused_imports' => true,

        // ✅ 使用单引号（除非字符串中包含变量或需要转义）
        'single_quote' => true,

        // ✅ 使用严格比较 === 和 !== 替代 == 和 !=
        'strict_comparison' => true,

        // ✅ 多行结构统一添加结尾逗号，减少 git diff 干扰
        'trailing_comma_in_multiline' => [
            'elements' => ['arrays', 'arguments', 'parameters', 'match'],
        ],
    ])
    ->setFinder($finder);
