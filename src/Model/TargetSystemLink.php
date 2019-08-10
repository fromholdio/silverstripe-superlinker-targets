<?php

namespace Fromholdio\SuperLinkerTargets\Model;

use Fromholdio\SuperLinker\Extensions\SystemLink;

class TargetSystemLink extends Target
{
    private static $table_name = 'TargetSystemLink';

    private static $extensions = [
        SystemLink::class
    ];
}
