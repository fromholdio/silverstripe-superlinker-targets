<?php

namespace Fromholdio\SuperLinkerTargets\Model;

use Fromholdio\SuperLinker\Model\SuperLink;

class Target extends SuperLink
{
    private static $table_name = 'Target';
    private static $singular_name = 'Target';
    private static $plural_name = 'Targets';

    private static $settings = [
        'link_text' => false
    ];

    private static $summary_fields = [
        'URL'
    ];
}
