<?php
// Error behind


class DisallowDoubleEmptyLineTest {
    public function echoTest() {
        echo 'test';
        // Oops, i did it again
        


        echo 'truc';

        echo 'truc';

        // No error :)
        
        echo 'truc';

        echo 'truc';
        echo 'truc';
    }
}
