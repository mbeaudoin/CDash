<?php
/*=========================================================================

  Program:   CDash - Cross-Platform Dashboard System
  Module:    $RCSfile: common.php,v $
  Language:  PHP
  Date:      $Date$
  Version:   $Revision$

  Copyright (c) 2002 Kitware, Inc.  All rights reserved.
  See Copyright.txt or http://www.cmake.org/HTML/Copyright.html for details.

     This software is distributed WITHOUT ANY WARRANTY; without even 
     the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR 
     PURPOSE.  See the above copyright notices for more information.

=========================================================================*/
include("ctestparser.php");
include_once("common.php");

$putdata = fopen("php://input", "r");
$contents = "";
$content = fread($putdata,1000);
while($content)
  {
  $contents .= $content;
  $content = fread($putdata,1000);
  }

$projectname = $_GET["project"];
$projectid = get_project_id($projectname);

ctest_parse($contents,$projectid);
?>
