<?php

class Application_Model_DbTable_Korisnici extends Zend_Db_Table_Abstract
{

    protected $_name = 'korisnici';
    
    
    public function proba($id){
        //ovo bi trebalo da bude samo primer neke funkcije kojoj kad prosledis ID iz tabele korisnici treba da dohvati 
        //sve iz te tabele. Naravno to nece da radi, i trenutno ludim zbog toga. Ne znam kako da uopste uradim neki query 
        //kad vec imam parametre unete u application.ini
        $db =  Zend_Db_Adapter_Abstract::getDefaultAdapter();
        
        $upit = "SELECT * FROM korisnici WHERE id=".$id;
        
        $rezultat=$db->query($upit);
        
        return $rezultat;
        
    }


}

