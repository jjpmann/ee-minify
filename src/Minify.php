<?php

namespace jjpmann\EE\Minify;

use zz\Html\HTMLMinify;

class Minify
{
    static public function run($html)
    {
        return HTMLMinify::minify($html, ['optimizationLevel' => 1]);
    }


}
