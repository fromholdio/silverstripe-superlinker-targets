<?php

namespace Fromholdio\SuperLinkerTargets\Model;

use Fromholdio\GlobalAnchors\GlobalAnchors;
use Fromholdio\SuperLinker\Extensions\GlobalAnchorLink;

class TargetGlobalAnchor extends Target
{
    private static $table_name = 'TargetGlobalAnchor';

    private static $extensions = [
        GlobalAnchorLink::class,
        GlobalAnchors::class
    ];

    public function getGlobalAnchors()
    {
        return GlobalAnchors::get_anchors();
    }
}
