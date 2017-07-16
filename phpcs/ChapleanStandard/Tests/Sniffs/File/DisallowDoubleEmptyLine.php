<?php

namespace Sniffs\File;

/**
 * Class DisallowDoubleEmptyLineTest.
 *
 * @package   Sniffs\File
 * @author    Tom - Chaplean <tom@chaplean.coop>
 * @copyright 2014 - 2016 Chaplean (http://www.chaplean.coop)
 * @since     1.1.0
 */
class DisallowDoubleEmptyLineTest
{
    /**
     * @return void
     */
    public function echoTest()
    {
        echo 'test';
        // I WANT AN ERROR BEHIND


        echo 'truc';

        echo 'truc';

        // No error please

        echo 'truc';

        echo 'truc';
        echo 'truc';
    }
}
