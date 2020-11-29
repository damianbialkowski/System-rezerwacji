<?php

namespace Modules\Admin\src\AbilityManager;

use Silber\Bouncer\Bouncer;

class AbilityManager
{
    protected $bouncer;

    public function __construct(Bouncer $bouncer)
    {
        $this->bouncer = $bouncer;
        dd($this->bouncer);
    }
}
