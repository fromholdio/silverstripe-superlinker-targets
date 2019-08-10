<?php

namespace Fromholdio\SuperLinkerTargets\Model;

use Fromholdio\SuperLinker\Extensions\EmailLink;

class TargetEmail extends Target
{
    private static $table_name = 'TargetEmail';

    private static $extensions = [
        EmailLink::class
    ];
}
