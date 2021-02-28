<?php

include_once "Operation.php";
include_once "database.php";
class Event extends Database implements Operation
{

     var $EventID;	 var $EventDate;	 	 var $StartTime;	 var $EndTime;	 
    	var $EventName;  
    public function SetID($id)
    {
        $this->EventID=$id;
    }
    public function SetEventDate($EDate)
    {
        $this->EventDate=$EDate;
    }
  
    public function SetStartTime($STime)
    {
        $this->StartTime=$STime;
    }
    public function SetEndTime($ETime)
    {
        $this->EndTime=$ETime;
    }
  
    public function SetEventName($EName)
    {
        $this->EventName=$EName;
    }
  
    

    public function getID()
    {
        return $this->EventID;
    }
    public function getEventDate()
    {
        return $this->EventDate;
    }
  
    public function getStartTime()
    {
        return $this->StartTime;
    }
    public function getEndTime()
    {
        return $this->EndTime;
    }
  
  
    public function getEventName()
    {
        return $this->EventName;
    }
   
    //EventID	EventDate		StartTime	EndTime		EventName

    public function add(){
        $e=parent::RunDML("insert into `event` values (Default,'".$this->getEventDate()."','".$this->getStartTime()."','".$this->getEndTime()."','".$this->getEventName()."','".$_SESSION["id"]."')"); 
        return $e;
    }
    public function delete(){
        $m=parent::RunDML("delete from `event`  where EventID ='".$_SESSION["eid"]."'");
        return $m;
    
        }
      public  function update(){
        $m=parent::RunDML("update `event` set EventDate='".$this->getEventDate()."',Places='".$this->getPlaces()."',StartTime='".$this->getStartTime()."',EndTime='".$this->getEndTime()."',Food='".$this->getFood()."',Decorating='".$this->getDecorating()."',Music='".$this->getMusic()."',Lights='".$this->getLights()."',EventName='".$this->getEventName()."'  " ); 
        return $m;
     }
    public  function GetAll(){

    }
   // public function Book(){
        //$rs= parent::GetData("select * from `event`  where  EventID ='" .$_SESSION["eid"]."'");
           
         //return $rs;
       //}
    public function GetEventBYID(){ 
        $rs= parent::GetData("select * from `event` ");
       return $rs;
    }

}
?> 