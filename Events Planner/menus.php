<?php
include_once "Database.php";
include_once "Operation.php";

class Menus extends Database implements Operation
{


   public function add(){

   }
  public  function delete(){
      
  }
  public  function update(){

  }
  public  function GetAll(){
    return parent::GetData("select * from `menus` order by MenuID desc");
  }
  
  public  function GetAllBID(){
      
    return parent::GetData("select * from `menus` where CategoryID ='".$_GET["CategoryID"]."' order by MenuID desc");
  }

 

}

?>