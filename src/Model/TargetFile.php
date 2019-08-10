<?php

namespace Fromholdio\SuperLinkerTargets\Model;

use Fromholdio\SuperLinker\Extensions\FileLink;

class TargetFile extends Target
{
    private static $table_name = 'TargetFile';

    private static $extensions = [
        FileLink::class
    ];
}
