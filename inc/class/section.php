<?php

class section {
	
	private $name = "";
	private $position = "";
	private $entrys = array();
	
	//pass the class the id of the section you wish it to become
	function __construct($sectionID) {
		
		//fetch section data and add it to the object variables
		$db = getConnectedPDOObject ();		
		$sectionQuery = $db->prepare("SELECT name,position FROM sections WHERE sectionID == :id");				
		$sectionQuery->execute(array(':id' => $sectionID));		
		$sectionRowCount = $sectionQuery->rowCount();		
		$sectionRow = $sectionQuery->fetch();
				
		if (count($sectionRowCount) == 0){			
			trigger_error('their is no section of id:'.$sectionID, E_USER_ERROR);			
		}
				
		$this->name = $sectionRow["name"];
		$this->position = $sectionRow["position"];
		
		//fetch the ids of any entrys that are atached to this section and append them to the $entrys array
		$entrysQuery = $db->prepare("SELECT entryID FROM sectionToEntry WHERE sectionID == :id");		
		$entrysQuery->execute(array(':id' => $sectionID));		
		$entrysRows = $entrysQuery->fetchAll();
		
		foreach ($entrysRows as $entryRow){
			
			$this->entrys[] = new entry($entryRow["entryID"]);
			
		}
		
	}
	
	//getter functions
	public function getName(){
		return $this->name;
	}
	public function getPosition(){
		return $this->position;
	}
	public function getEntrys(){
		return $this->entrys;
	}
	
}