<?php

declare(strict_types=1);

namespace Hizpark\ValidationContract\Tests\Exception;

use Hizpark\ValidationContract\Exception\UnexpectedValidationResultException;
use PHPUnit\Framework\TestCase;

class UnexpectedValidationResultExceptionTest extends TestCase
{
    public function testExceptionCanBeThrown(): void
    {
        $this->expectException(UnexpectedValidationResultException::class);

        throw new UnexpectedValidationResultException('Unexpected validation result');
    }
}
