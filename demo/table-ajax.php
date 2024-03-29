<?php
  /* 
   * Paging
   */

  $iTotalRecords = 178;
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;

  $status_list = array(
    array("success" => "Pending"),
    array("info" => "Closed"),
    array("danger" => "On Hold"),
    array("warning" => "Fraud")
  );
  if(!empty($_REQUEST['search["value"]'])){
    echo $_REQUEST['search'];
    exit();
  }
  for($i = $iDisplayStart; $i < $end; $i++) {
    $status = $status_list[rand(0, 2)];
    $id = ($i + 1);
    $records["data"][] = array(
      'id'=>'<input type="checkbox" class="checkboxes" name="id[]" value="'.$id.'">',
      //$id,
      'start_date'=>'12/09/2013',
      'name'=>'Jhon Doe',
      'position'=>'Jhon Doe',
      'salary'=>'450.60$',
      'extn'=>rand(1, 10),
      'office'=>'<span class="label label-sm label-'.(key($status)).'">'.(current($status)).'</span>'
      //'<a href="javascript:;" class="btn btn-xs default"><i class="fa fa-search"></i> View</a>',
   );
  }

  // if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
  //   $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
  //   $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
  // }

  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  echo json_encode($records);
?>