<?php

namespace Fromholdio\SuperLinkerTargets\Model;

use Fromholdio\GlobalAnchors\GlobalAnchors;
use Fromholdio\SuperLinker\Extensions\SiteTreeLink;

class TargetSiteTree extends Target
{
    private static $table_name = 'TargetSiteTree';

    private static $extensions = [
        SiteTreeLink::class,
        GlobalAnchors::class
    ];
}
