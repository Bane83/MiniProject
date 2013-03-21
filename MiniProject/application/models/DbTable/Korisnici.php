<?php

class Application_Model_DbTable_Korisnici extends Zend_Db_Table_Abstract
{

    protected $_name = 'korisnici';
    
    
    public function proba($id){
        
        $db =  Zend_Db_Adapter_Abstract::getDefaultAdapter();
        
        $upit = "SELECT * FROM korisnici WHERE id=".$id;
        
        $rezultat=$db->query($upit);
        
        return $rezultat;
        
    }


}

