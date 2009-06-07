<?php

class usuario {
/**
   * Class Constructure
   * 
   * @param string $dbConn
   * @param array $settings
   * @return void
   */
   var $CPF;
    public function __toString() {
                return $this->CPF;
        }
   function usuario($CPF){
	$this->CPF=$CPF;
   
   }
   
   }