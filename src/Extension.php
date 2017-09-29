<?php

namespace jjpmann\EE\Minify;

use EE\Addons\Extension\BaseExtension;

class Extension extends BaseExtension
{
    public $name = MINIFY_NAME;
    public $slug = MINIFY_SLUG;
    public $version = MINIFY_VERSION;
    public $description = MINIFY_DESCRIPTION;
    public $settings_exist = 'n';
    public $docs_url = '';
    public $settings = [];

    protected $settings_default = [
    ];

    protected $hooks = [
        'sessions_start'    => 'hookSessionsStart',
        'core_boot'         => 'hookCoreBoot',
    ];

    public function __construct($settings = [])
    {
        parent::__construct($settings);
    }

    public function hookSessionsStart($sess)
    {
        return;
    }


    public function hookCoreBoot()
    {
        if (REQ != 'CP') {
            // Do work only on control panel requests
            Output::replaceOutput($this);
        }
    }

}
