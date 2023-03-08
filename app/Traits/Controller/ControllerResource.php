<?php

namespace App\Traits\Controller;

use Illuminate\Support\Str;

trait ControllerResource
{
    protected string $dataKey, $dataKeys;

    /**
     * Set Data Keys
     *
     * @param string $key
     * @return $this
     */
    public function setDataKeys(string $key): static
    {
        $this->dataKey = Str::singular($key);
        $this->dataKeys = Str::plural($key);

        return $this;
    }
}
