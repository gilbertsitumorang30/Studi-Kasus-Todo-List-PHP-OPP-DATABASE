<?php

namespace Helper{

    class InputHelper{

        static public function getInput(string $keterangan){
            echo $keterangan . " : ";
            $input = fgets(STDIN);

            return trim($input);
        }
    }
}