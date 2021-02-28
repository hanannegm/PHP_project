<?php

include_once "Operation.php";
include_once "database.php";
class Customer extends Database implements Operation
{

    var  $ClientID;var	$FirstName; var $LastName;	var $Email;var $Phone; var $Password;

    public function SetID($id)
    {
        $this->ClientID=$id;
    }

    public function SetEmail($Email)
    {
        $this->Email=$Email;
    }
    public function SetPhone($Phone)
    {
        $this->Phone=$Phone;
    }
    public function SetPassword($Password)
    {
        $this->Password=$Password;
    }
    public function SetFirstName($FirstName)
    {
        $this->FirstName=$FirstName;
    }
    public function SetLastName($LastName)
    {
        $this->LastName=$LastName;
    }

    public function getFirstName()
    {
        return $this->FirstName;
    }
    public function getLastName()
    {
        return $this->LastName;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function getPhone()
    {
        return $this->Phone;
    }
    public function getPassword()
    {
        return $this->Password;
    }
    public function getClientID()
    {
        return $this->ClientID;
    }
    public function add(){
        $m=parent::RunDML("insert into `client` values (Default,'".$this->getFirstName()."','".$this->getLastName()."','".$this->getEmail()."','".$this->getPassword()."','".$this->getPhone()."')"); 
        return $m;
    }
   public function delete(){
    $m=parent::RunDML("delete from `client`  where ClientID ='".$_SESSION["id"]."'");
    return $m;

    }
  public  function update(){
    $m=parent::RunDML("update `client` set FirstName='".$this->getFirstName()."', LastName='".$this->getLastName()."', Email= '".$this->getEmail()."',Password='".$this->getPassword()."',Phone= '".$this->getPhone()."' where ClientID ='".$_SESSION["id"]."' ");
    return $m;
 }
  public  function GetAll(){

    }

    public function Login(){
        $rs= parent::GetData("select * from `client`  where  (Email='".$this->getEmail()."' and Password='".$this->getPassword(). "' )");
        
       return $rs;
    }
   

    public function GetUserBYID(){
        $rs= parent::GetData("select * from `client` where ClientID ='" .$_SESSION["id"]."'");
       return $rs;
    }
    public function GetUserBYID2(){
        $rs= parent::GetData("select * from `client` where ClientID  ='".$_GET["uid"]."'");
       return $rs;
    }
    public function GetUserBYEmail(){
        $rs= parent::GetData("select * from `client` where Email ='" .$this->getEmail()."'");
       return $rs;
    }
}

?>