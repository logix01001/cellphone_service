<?php

Abstract class Service implements ServiceInt {
    
    protected   $_free_minutes,
                $_base_charge,
                $_minutes_excess_charge = 0,
                $_minutes,
                $_additional_fee,
                $_total_bill = 0,
                $_html = '',
                $_day = '(Regular)',
                $_account_number;

    public function set_minutes(Int $minutes){

        $this->_minutes = $minutes;
        $this->_html .= "Minutes Consume {$this->_day} : {$minutes} <br>";
        
        if($this->_minutes <=  $this->_free_minutes){
            $this->_additional_fee = 0;
            $this->_minutes_excess_charge = 0;
        }else{

            $this->_minutes_excess_charge = ($this->_minutes - $this->_free_minutes) * $this->_additional_fee;
        }


        if( $this->_total_bill == 0 ){
            $this->_total_bill = $this->_base_charge + $this->_minutes_excess_charge;
        }else{
            $this->_total_bill += $this->_minutes_excess_charge;
    
        }
       
        return $this;
    }

    public function set_account_number(string $account_number){
        $this->_html .= "Account Number: {$account_number} <br>";
        $this->_account_number = $account_number;

    }

    public function get_account_number(){

        return $this->_account_number;

    }
    
    public function compute(){
        $this->_html .= "<hr>Total {$this->_day} : \${$this->_total_bill} <br>";
        return $this->_total_bill;

    }

    public function render(){
        
        return  $this->_html;

    }
   

  
   







}