<?php
namespace App;

class Poker {

    const AS_VALUE = 14;
    const MAX_VALUE = 14;
    const MIN_VALUE = 2;
    const MAX_QUANTITY = 7;

    public function isStraight(Array $cardList = []){
        $this->isValid($cardList);


        if($this->hasRepeatingElements($cardList)){
            return false;
        }

        sort($cardList);
        $beforeValue = null;

        foreach ($cardList as $value) {
            $this->isValidValue($value);

            if($beforeValue != null && $value != self::AS_VALUE && $value != ($beforeValue + 1)){
                return false;
            }

            // validamos los casos asociados al AS
            if($value == self::AS_VALUE){

                $return = false;

                if($cardList[0] == self::MIN_VALUE){
                    $return = true;
                }

                if($beforeValue == (self::AS_VALUE - 1)){
                    $return = true;
                }

                if(!$return){
                    return false;
                }
            }

            $beforeValue = $value;
        }

        return true;
    }

    private function isValid($cardList)
    {
        if(empty($cardList)){
            throw new \Exception('El listado de cartas se encuentra vacío.');
        }

        if(count($cardList) > self::MAX_QUANTITY){
            throw new \Exception('La cantidad de elementos super el máximo de 7.');
        }
    }

    private function isValidValue($value)
    {
        if($value < self::MIN_VALUE || $value > self::MAX_VALUE){
            throw new \Exception('Existen valores que no corresponden.');
        }
    }

    private function hasRepeatingElements($cardList)
    {
        if( count($cardList) > count( array_unique($cardList) ) ){
            return true;
        }

        return false;
    }
}