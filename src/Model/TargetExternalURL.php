<?php

namespace Fromholdio\SuperLinkerTargets\Model;

use Fromholdio\SuperLinker\Extensions\ExternalURLLink;

class TargetExternalURL extends Target
{
    private static $table_name = 'TargetExternalURL';

    private static $extensions = [
        ExternalURLLink::class
    ];
}
