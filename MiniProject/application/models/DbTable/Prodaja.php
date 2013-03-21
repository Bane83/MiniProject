<?php

class Application_Model_DbTable_Prodaja extends Zend_Db_Table_Abstract
{

    protected $_name = 'prodaja';
    
    
    public static function proba($id){
        
       $params = array ('host'     => 'localhost',   
                 'username' => 'root',                
                 'password' => '',         
                 'dbname'   => 'CSV');
       
        $db = Zend_Db::factory('PDO_MYSQL', $params);  
        
        $upit="SELECT naziv_proizvoda FROM prodaja WHERE id=".$id;
        
        $rezultat=$db->query($upit);
        
        return $rezultat;
        
            
        
    }
        
    
    
    
    
    
    


}

