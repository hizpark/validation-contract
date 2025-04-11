<?php

declare(strict_types=1);

namespace Hizpark\ValidationContract\Tests\DTO;

use Hizpark\ValidationContract\DTO\ValidationResult;
use PHPUnit\Framework\TestCase;

class ValidationResultTest extends TestCase
{
    public function testOkReturnsValidTrueAndNullError(): void
    {
        $result = ValidationResult::ok();

        $this->assertTrue($result->isValid());
        $this->assertNull($result->getError());
    }

    public function testFailReturnsValidFalseAndErrorMessage(): void
    {
        $error  = 'Invalid input';
        $result = ValidationResult::fail($error);

        $this->assertFalse($result->isValid());
        $this->assertSame($error, $result->getError());
    }

    public function testManualConstruction(): void
    {
        $result = new ValidationResult(false, 'Something went wrong');

        $this->assertFalse($result->isValid());
        $this->assertEquals('Something went wrong', $result->getError());
    }
}
