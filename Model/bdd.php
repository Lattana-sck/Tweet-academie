<?php

class myDatabase {

	protected $_bdd;

    public function __construct(){
		
        try {
			$this->_bdd = new PDO('mysql:host=localhost;dbname=tweetacademie;charset=utf8', 'root', 'root');
		
		} 
		catch (PDOexception $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}
		// echo "connectée a la BDD" . PHP_EOL;
	}
}

