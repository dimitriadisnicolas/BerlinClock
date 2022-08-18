<?php

class BerlinClock
{
    //Here is the class BerlinClock by modifie 123
    private $clock;
    private $date;
    private $minute;
    private $hour;
    private $second;
    /**
     * Clock constructor.
     */
    public function __construct()
    {
        date_default_timezone_set('Europe/Berlin');
        $this->clock = array(5);
        $this->date = date("H:i:s");
        $this->minute = substr($this->date,-5,2);
        $this->hour = substr($this->date,-8,2);
        $this->second = substr($this->date,-2,2);
    }

    public function bloc1minute($minute){
        $this->clock[4] = '';

        for($i = 0 ; $i < 4; $i++){
            if($i <= $minute%5-1){
                $this->clock[4].="y";
            }
            else{
                $this->clock[4].="n";
            }
        }
        return $this->clock[4];
    }

    public function bloc5minutes($minute){
        $this->clock[3] = '';

        for($i = 0; $i < 11; $i++){
            if($minute >= 5){
                $this->clock[3].='y';
                $minute -= 5;
            }else
                $this->clock[3].='n';

        }
        return $this->clock[3];
    }

    public function bloc1hour($hour){
        $this->clock[2] = '';

        for($i = 0 ; $i < 4; $i++){
            if($i <= $hour%5-1){
                $this->clock[2].='y';
            }
            else{
                $this->clock[2].='n';
            }
        }
        return $this->clock[2];
    }

    public function bloc5Hours($hour){
        $this->clock[1] = '';

        for($i = 0; $i < 4; $i++){
            if($hour >= 5){
                $this->clock[1].='y';
                $hour -= 5;
            }else
                $this->clock[1].='n';
        }
        return $this->clock[1];
    }

    public function blocSecond($second){
        $this->clock[0]='';
        if($second % 2 == 0)
            $this->clock[0].='y';
        else
            $this->clock[0].='n';

        return $this->clock[0];
    }

    public function all($date){
        $this->date = $date;
        $this->minute = substr($this->date,-5,2);
        $this->hour = substr($this->date,-8,2);
        $this->second = substr($this->date,-2,2);
        $this->bloc1hour($this->hour);
        $this->bloc5hours($this->hour);
        $this->bloc1minute($this->minute);
        $this->bloc5minutes($this->minute);
        $this->blocSecond($this->second);

        return $this->clock;
    }
}