<?php
class RbacCommand extends CConsoleCommand
{
   
    private $_authManager;
 
    
	public function getHelp()
	{
		
		$description = "DESCRIPTION\n";
		$description .= '    '."This command generates an initial RBAC authorization hierarchy.\n";
		return parent::getHelp() . $description;
	}

	
	/**
	 * The default action - create the RBAC structure.
	 */
	public function actionIndex()
	{
		 
		$this->ensureAuthManagerDefined();
		
		//provide the oportunity for the use to abort the request
		$message = "This command will create four roles: Korisnik, Klijent, Content Manager i Admin\n";
//		$message .= " and the following permissions:\n";
////		$message .= "create, read, update and delete user\n";
////		$message .= "create, read, update and delete project\n";
////		$message .= "create, read, update and delete issue\n";
		$message .= "Would you like to continue?";
	    
	    //check the input from the user and continue if 
		//they indicated yes to the above question
	    if($this->confirm($message)) 
		{
		     //first we need to remove all operations, 
			 //roles, child relationship and assignments
			 $this->_authManager->clearAll();

			 //operacije za korisnika
			 $this->_authManager->createOperation(
				"citajKorisnika",
				"pregled podataka o korisniku");  
			 $this->_authManager->createOperation(
				"azurirajKorisnika",
				"azuriraj podatke o korisniku");
                         $this->_authManager->createOperation(
                                 "ispuniAnketu",
                                 "ispuni anketu"
                                 );
                         $this->_authManager->createOperation(
                                 "citajAnkete",
                                 "procitaj popis anketa"
                                 );
                         
                         //operacije za klijenta
                         $this->_authManager->createOperation(
                                 "pregledajIzvjesca", //klijent može pregledavati izvješća za ankete koje je stvorio
                                 "pregledaj izvjesca za svoje ankete"
                                 );
                         
                         $this->_authManager->createOperation(
                                 "stvoriAnketu",
                                 "stvori anketu"
                                 );
                         $this->_authManager->createOperation(
                                 "citanjeKlijenta",
                                 "citanje podataka o klijentu"
                                 );
                         $this->_authManager->createOperation(
                                 "azurirajKlijenta",
                                 "azuriranje podataka o klijentu"
                                 );

                         //operacije za content managera
//                         $this->_authManager->createOperation(
//                                 "pregledajIzvjesca",
//                                 "pregledaj izvjesca o anketama za content manageru dodijeljene korisnike"
//                                 );
                         $this->_authManager->createOperation(
                                 "stvoriKlijenta",
                                 "stvori klijenta"
                                 );
                         $this->_authManager->createOperation(
                                 "stvoriTemu",
                                 "stvori temu"
                                 );
                         $this->_authManager->createOperation(
                                 "azurirajTemu",
                                 "azuriraj temu"
                                 );
                         
//			 $this->_authManager->createOperation(
//				"createProject",
//				"create a new project"); 
//			 $this->_authManager->createOperation(
//				"readProject",
//				"read project information"); 
//	 		 $this->_authManager->createOperation(
//				"updateProject",
//				"update project information"); 
//			 $this->_authManager->createOperation(
//				"deleteProject",
//				"delete a project"); 

			 //create the lowest level operations for issues
//			 $this->_authManager->createOperation(
//				"createIssue",
//				"create a new issue"); 
//			 $this->_authManager->createOperation(
//				"readIssue",
//				"read issue information"); 
//			 $this->_authManager->createOperation(
//				"updateIssue",
//				"update issue information"); 
//			 $this->_authManager->createOperation(
//				"deleteIssue",
//				"delete an issue from a project");     

			 //create the reader role and add the appropriate 
			 //permissions as children to this role
			 $role=$this->_authManager->createRole("korisnik"); 
			 $role->addChild("citajKorisnika");
                         $role->addChild("azurirajKorisnika");
                         $role->addChild("ispuniAnketu");
                         $role->addChild("citajAnkete");
                         
                         $role = $this->_authManager->createRole("klijent");
                         $role->addChild("pregledajIzvjesca");
                         $role->addChild("stvoriAnketu");
                         $role->addChild("citanjeKlijenta");
                         $role->addChild("azurirajKlijenta");
                         $role->addChild("citajAnkete");
                         
                         $role = $this->_authManager->createRole("content_manager");
                         $role->addChild("klijent");
                         $role->addChild("korisnik");
                         $role->addChild("stvoriKlijenta");
                         $role->addChild("stvoriTemu");
                         $role->addChild("azurirajTemu");
                         
                         $role = $this->_authManager->createRole("admin");
                         $role->addChild("content_manager");
//			 $role->addChild("readProject"); 
//			 $role->addChild("readIssue"); 

			 //create the member role, and add the appropriate 
			 //permissions, as well as the reader role itself, as children
//			 $role=$this->_authManager->createRole("klijent"); 
//			 $role->addChild("reader"); 
//			 $role->addChild("createIssue"); 
//			 $role->addChild("updateIssue"); 
//			 $role->addChild("deleteIssue"); 

			 //create the owner role, and add the appropriate permissions, 
			 //as well as both the reader and member roles as children
//			 $role=$this->_authManager->createRole("content_manager"); 
//			 $role->addChild("reader"); 
//			 $role->addChild("member");    
//			 $role->addChild("createUser"); 
//			 $role->addChild("updateUser"); 
//			 $role->addChild("deleteUser");  
//			 $role->addChild("createProject"); 
//			 $role->addChild("updateProject"); 
//			 $role->addChild("deleteProject");	
		
		     //provide a message indicating success
		     echo "Authorization hierarchy successfully generated.\n";
        }
 		else
			echo "Operation cancelled.\n";
    }

	public function actionDelete()
	{
		$this->ensureAuthManagerDefined();
		$message = "This command will clear all RBAC definitions.\n";
		$message .= "Would you like to continue?";
	    //check the input from the user and continue if they indicated 
	    //yes to the above question
	    if($this->confirm($message)) 
	    {
			$this->_authManager->clearAll();
			echo "Authorization hierarchy removed.\n";
		}
		else
			echo "Delete operation cancelled.\n";
			
	}
	
	protected function ensureAuthManagerDefined()
	{
		//ensure that an authManager is defined as this is mandatory for creating an auth heirarchy
		if(($this->_authManager=Yii::app()->authManager)===null)
		{
		    $message = "Error: an authorization manager, named 'authManager' must be con-figured to use this command.";
			$this->usageError($message);
		}
	}
}
