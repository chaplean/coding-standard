<?php

/**
 * Disallow double consecutive empty lines in file.
 *
 * @author    Tom - Chaplean <tom@chaplean.com>
 * @copyright 2014 - 2015 Chaplean (http://www.chaplean.com)
 * @since     1.1.0
 */
class ChapleanStandard_Sniffs_File_DisallowDoubleEmptyLineSniff implements PHP_CodeSniffer_Sniff
{
    protected $consecutiveLines = 0;

    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array
     */
    public function register()
    {
        return array(
            T_WHITESPACE
        );
    }

    /**
     * Processes the tokens that this sniff is interested in.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file where the token was found.
     * @param int                  $stackPtr  The position in the stack where
     *                                        the token was found.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $token = $tokens[$stackPtr];

        /**
         * We want only spaces or endlines on our lines
         */
        $containsNewLineCharacter = preg_match('/\n/', $token['content']);
        $nextLine = $token['column'] == 1 && $containsNewLineCharacter;

        // Cause it's really annoying to show something... [For test purpuse only]
//        $phpcsFile->addWarning($this->consecutiveLines . ' ' . json_encode($token['content']) . ' ' . intval($containsNewLineCharacter) . ' ' . $token['line'] . '-' . $token['column'] . ' ' . var_export($nextLine, true), $stackPtr, 'Test');

        if ($nextLine) {
            $this->consecutiveLines++;

            if ($this->consecutiveLines >= 2) {
                $this->consecutiveLines = 0;

                $error = 'You can\'t have two consecutives empty lines or more.';
                $phpcsFile->addError($error, $stackPtr);
            }

            return;
        }

        $this->consecutiveLines = 0;
    }
}
