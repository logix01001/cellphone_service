<?php

class Regular extends Service implements ServiceInt{


    public function __construct(){
        
        $this->_base_charge = 10;
        $this->_free_minutes = 50;
        $this->_additional_fee = 0.20;
        $this->_html = '<br><h3>Official Receipt</h3><h4>Regular Service</h4><hr>';

    }




}