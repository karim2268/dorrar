<?php

namespace App\Repository;

interface StudentRepositoryInterface{


 //  Get_Student
 public function Get_Student();

    // Get Add Form Student
    public function Create_Student();
  // Get classrooms
  public function Get_classrooms($id);

  //Get Sections
  public function Get_Sections($id);



  
}


