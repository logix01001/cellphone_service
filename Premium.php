<?php

class Premium extends Service {

    public function __construct(){
        $this->_base_charge = 25;
        $this->_html = '<h3>Premium Service</h3><hr>';
    }
    public function nightTime(){
        $this->_day = "(Night Time)";
        $this->_free_minutes = 100;
        $this->_additional_fee = 0.50;

        return $this;
    }

    public function dayTime(){
        $this->_day = "(Day Time)";
        $this->_free_minutes = 75;
        $this->_additional_fee = 0.10;

        return $this;
    }

  


}