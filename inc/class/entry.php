<?php

class entry {
	
	private $name = "";
	private $text = "";
	private $position = "";
	private $images = array();
	
	function __construct($entryID) {
		
		//fetch entry data and add it to the object variables
		$db = getConnectedPDOObject ();		
		$entryQuery = $db->prepare("SELECT name,text,position FROM entrys WHERE entryID == :id");		
		$entryQuery->execute(array(':id' => $entryID));		
		$entyRowCount = $entryQuery->rowCount();		
		$entryRow = $entryQuery->fetch();
		
		if (count($entyRowCount) == 0){
			trigger_error('their is no entry of id:'.$entryID, E_USER_ERROR);
		}
		
		$this->name = $entryRow["name"];
		$this->text = $entryRow["text"];
		$this->position = $entryRow["position"];
		
		//fetch the filename of any images that are atached to this entry and append them to the $images array
		$entryImagesQuery = $db->prepare("SELECT fileName FROM entryToImage WHERE entryID == :id");		
		$entryImagesQuery->execute(array(':id' => $entryID));		
		$entryImagesRows = $entryImagesQuery->fetchAll();	
			
		foreach ($entryImagesRows as $entryImageRow){
				
			$this->images[] = $entryImageRow["fileName"];
				
		}
		
	}
	
	//getter functions
	public function getName(){
		return $this->name;
	}
	public function getPosition(){
		return $this->position;
	}
	public function getText(){
		return $this->text;
	}
	public function getImages(){
		return $this->images;
	}
}