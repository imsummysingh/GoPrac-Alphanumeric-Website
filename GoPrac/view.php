<?php
    header("Access-Control-Allow-Origin: *");
    include "db.php";


    if(isset($_GET['order']) && $_GET['order'] == 'asc'){
        $order = 'asc';
    } else {
        $order = 'desc';
    }
    if(isset($_GET['sort']) && $_GET['sort'] == 'end_date'){
        $sort = 'End_Date';
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'code') {
        $sort = 'Codes';
    } else{
        $sort = 'Start_Date';
    }

    $code = $_GET['code'];
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    $where = [];
    if($start_date !== "null" && $end_date == "null"){
        array_push($where, "Start_Date >= '$start_date'");
    } elseif($end_date !== "null" && $start_date == "null"){        
        array_push($where, "End_Date <= '$end_date'");
    } elseif($start_date == "null" && $end_date == "null"){
    } elseif($start_date !== "null" && $end_date !== "null"){
        array_push($where, "Start_Date >= '$start_date' and End_Date <= '$end_date'");
    }


    if($code !== "null"){
        array_push($where, "Codes like '%$code%'");
    }

    if(count($where)){
        $where = "where ".join(" and ", $where);
    } else {
        $where = "";
    }
    
    $recordPerPage=5;
    $page=1;
    if(isset($_GET['page']))
    {
        $page=(int)$_GET['page'];
    }
    $start_from=($page-1)*$recordPerPage;
    $count = $db->prepare("SELECT count(*) cnt FROM codes_table $where");
    $count->execute();
    $total_pages=$count->fetchObject();
    $total_records=(int)$total_pages->cnt;
    $total_pages=ceil($total_records/$recordPerPage); 

    $stmt=$db->prepare("SELECT * FROM codes_table $where ORDER BY $sort $order LIMIT $start_from,$recordPerPage");
    $stmt->execute();
    $myarr=array();
    while($data=$stmt->fetchObject())
    {
        $myarr[]=$data;
    }
    echo json_encode(array("codes" => $myarr, "total_pages" => $total_pages));
    
    
?>