<?php

namespace Fromholdio\SuperLinkerTargets\Model;

use Fromholdio\SuperLinker\Extensions\SiteTreeLink;

class TargetSiteTree extends Target
{
    private static $table_name = 'TargetSiteTree';

    private static $extensions = [
        SiteTreeLink::class
    ];
}
