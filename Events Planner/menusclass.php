<?php
 include_once "database.php";
 include_once "Operation.php";

 class Category extends Database implements Operation
 {
    var $CategoryID;
    var $CategoryName;

   Public function setCategoryID($catid)
   {
    $this->CategoryID=$catid;

   } 
 
    public function SetCategoryName($MName)
    {
        $this->CategoryName=$MName;
    }
    public function getCategoryID()
    {
        return $this->CategoryID;
    }
    public function getCategoryName()
    {
        return $this->CategoryName;
    }

    public function add(){
       
    }
    public function delete(){

    }
    public  function update(){

    }
    public  function GetAll(){
          $rs=parent::GetData("select * from `menucategory` ");
          return $rs;
    }

 }

?>
