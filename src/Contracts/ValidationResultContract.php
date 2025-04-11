<?php

declare(strict_types=1);

namespace Hizpark\ValidationContract\Contracts;

interface ValidationResultContract
{
    public function isValid(): bool;
    public function getError(): ?string;
    public function getCode(): ?string;
}
