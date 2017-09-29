<?php

namespace jjpmann\EE\Minify;

class Output extends \EE_Output
{

    protected $_output;
    protected $_ext;

    public function __construct()
    {
        parent::__construct();
    }

    static public function replaceOutput($ext = false)
    {
        // new
        $output = new self;

        // backup
        $output->_output = ee()->output;
        $output->_ext = $ext;
        
        // remove
        ee()->remove('output');
        unset($GLOBALS['OUT']);

        //replace       
        ee()->set('output', $output);
        $GLOBALS['OUT'] = $output;

    }

    /**
     * Display the final output
     *
     * @access  public
     * @return  void
     */
    function _display($output = '')
    {
        
        if ($output == '')
        {
            $output = $this->final_output;
        }

        ob_start();
        parent::_display($output);
        $html = ob_get_contents();
        ob_end_clean();

        // minify??
        $html = Minify::run($html);
        
        echo $html;
    }

}
