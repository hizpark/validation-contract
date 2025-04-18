# validation-contract

![License](https://img.shields.io/github/license/hizpark/validation-contract)
![PHP](https://img.shields.io/badge/PHP-8.0%20to%208.4%20-blue)
![Code Style](https://img.shields.io/badge/code_style-PSR--12-lightgrey)
![Static Analysis](https://img.shields.io/badge/static_analysis-PHPStan-blue)
![Tests](https://img.shields.io/badge/tests-PHPUnit-brightgreen)
![Codecov](https://img.shields.io/codecov/c/github/hizpark/validation-contract)
![CI](https://github.com/hizpark/validation-contract/actions/workflows/ci.yml/badge.svg)

> Lightweight, framework-agnostic validation contract for PHP.

一个轻量级、与框架无关的验证契约包，提供通用的验证器接口与验证结果接口，旨在帮助开发者构建统一、可测试、易扩展的验证逻辑，适用于上传验证、表单验证、自定义规则等各类验证场景。

## ✨ 特性

- 轻量、无依赖、框架无关
- 明确定义验证器与验证结果接口
- 同时支持异常式与结果式验证流程
- 可作为独立组件使用或集成进大型架构中

## 📦 安装

```bash
composer require hizpark/validation-contract
```

## 📂 目录结构

```txt
src
├── Contracts
│    ├── ValidationResultContract.php
│    └── ValidatorContract.php
├── DTO
│    └── ValidationResult.php
└── Exception
     └── UnexpectedValidationResultException.php
```

## 🚀 用法示例

### 示例 1：自定义 Email 验证器

```php
use Hizpark\ValidationContract\Contracts\ValidatorContract;
use Hizpark\ValidationContract\Contracts\ValidationResultContract;
use Hizpark\ValidationContract\DTO\ValidationResult;

class EmailValidator implements ValidatorContract
{
    public function validate(mixed $target): ValidationResultContract
    {
        if (!is_string($target) || !filter_var($target, FILTER_VALIDATE_EMAIL)) {
            return ValidationResult::fail('Invalid email address.');
        }

        return ValidationResult::ok();
    }
}
```

### 示例 2：执行验证并处理结果

```php
$validator = new EmailValidator();

$result = $validator->validate('hello@example.com');

if (!$result->isValid()) {
    echo $result->getError();
}
```

## 📐 接口说明

### `ValidatorContract`

> 用于定义验证逻辑

```php
namespace Hizpark\ValidationContract\Contracts;

interface ValidatorContract
{
    public function validate(mixed $target): ValidationResultContract;
}
```

### `ValidationResultContract`

> 表示验证结果状态

```php
namespace Hizpark\ValidationContract\Contracts;

interface ValidationResultContract
{
    public function isValid(): bool;
    public function getCode(): ?string;
    public function getError(): ?string;
}
```

### `ValidationResult`

> `ValidationResultContract` 接口实现及扩展

```php
namespace Hizpark\ValidationContract\DTO;

ValidationResult::ok();                   // 构造成功结果
ValidationResult::fail('error message');  // 构造失败结果
```

## 🎯 代码风格

使用 PHP-CS-Fixer 工具检查代码风格：

```bash
composer cs:chk
```

使用 PHP-CS-Fixer 工具自动修复代码风格问题：

```bash
composer cs:fix
```

## 🔍 静态分析

使用 PHPStan 工具进行静态分析，确保代码的质量和一致性：

```bash
composer stan
```

## ✅ 单元测试

执行 PHPUnit 单元测试：

```bash
composer test
```

执行 PHPUnit 单元测试并生成代码覆盖率报告：

```bash
composer test:coverage
```

## 🤝 贡献指南

欢迎 Issue 与 PR，建议遵循以下流程：

1. Fork 仓库
2. 创建新分支进行开发
3. 提交 PR 前请确保测试通过、风格一致
4. 提交详细描述

## 📝 License

MIT License. See the [LICENSE](LICENSE) file for details.
