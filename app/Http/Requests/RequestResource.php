<?php

namespace App\Http\Requests;

interface RequestResource
{
    public function getCreateRules(): array;

    public function getUpdateRules(): array;

    public function getDeleteRules(): array;
}
