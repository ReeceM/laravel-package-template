<?php

namespace [__OWNER__]\[__PACKAGE__];

use Illuminate\Support\Facades\Facade as BaseFacade;

/**
 * @see \[__OWNER__]\[__PACKAGE__]\BaseClass
 */
class Facade extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'base-class';
    }
}
