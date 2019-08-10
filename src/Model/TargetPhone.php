<?php

namespace Fromholdio\SuperLinkerTargets\Model;

use Fromholdio\SuperLinker\Extensions\PhoneLink;

class TargetPhone extends Target
{
    private static $table_name = 'TargetPhone';

    private static $extensions = [
        PhoneLink::class
    ];
}
