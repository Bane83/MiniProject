<?php

class LogovanjeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $prodaja = Application_Model_DbTable_Prodaja::proba(1);
        
        echo $prodaja;
        
       
        
        
                
        
        
        
    }

    public function loginAction()
    {
        
        if(Zend_Auth::getInstance()->hasIdentity()){
            $this->_redirect('Logovanje/opcije');
        }
        
        $form = new Application_Form_Logovanje();
                $this->view->form=$form;
        
        $request=$this->getRequest();
        if($request->isPost()){
            if($form->isValid($this->_request->getPost())){
                
                

                $authAdapter = $this->getAuthAdapter();

                $username=$form->getValue('username');
                $password=$form->getValue('password');
                

                $authAdapter->setIdentity($username)
                            ->setCredential($password);

                $auth = Zend_Auth::getInstance();
                $rezultat = $auth->authenticate($authAdapter);

                if($rezultat->isValid()){

                    $korisnik_podaci= $authAdapter->getResultRowObject();

                    $authStorage = $auth->getStorage();
                    $authStorage->write($korisnik_podaci);

                    $this->_redirect('Logovanje/opcije');
            
                   
                    
                 }else{
                     $this->view->greska = "Pogresno ste uneli username ili password!";
                 }
                
            }
            
        }
        
        
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('Logovanje/login');
    }

    private function getAuthAdapter()
    {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('korisnici')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('password');
        
        return $authAdapter;
        
    }

    public function opcijeAction()
    {
        $identify=  Zend_Auth::getInstance()->getStorage()->read();
        $uloga=$identify->uloga;
        
        $this->view->Uloga=$uloga;
        
        
        
        
    }


}



