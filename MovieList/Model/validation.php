<?php

class validation{
    public static function withinRange($min, $max, $year) {
        
        if($year > $min and year < $max){
            return true;
        } else {
            
            return false;    
        }
        
    }
}
