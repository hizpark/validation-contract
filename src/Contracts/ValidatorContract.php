<?php

declare(strict_types=1);

namespace Hizpark\ValidationContract\Contracts;

use Hizpark\ValidationContract\Exception\UnexpectedValidationResultException;

interface ValidatorContract
{
    /**
     * @throws UnexpectedValidationResultException 当结果非 ValidationResultContract 实例
     */
    public function validate(mixed $target): ValidationResultContract;
}
