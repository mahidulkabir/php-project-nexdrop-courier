<?php
require('./configs/config.php');

if(isset($_GET['page'])){
    $page=$_GET['page'];
    if($page==1){
        include('./pages/users/add_user.php');
    }
    else if($page==2){
        include('./pages/users/manage_user.php');
    }
    else if($page==3){
        include('./pages/users/edit_user.php');
    }
    else if($page==4){
        include('./pages/branches/add_branch.php');
    }
    else if($page==5){
        include('./pages/branches/manage_branch.php');
    }
    else if($page==6){
        include('./pages/branches/edit_branch.php');
    }
    else if($page==7){
        include('./pages/parcels/add_parcel.php');
    }
    else if($page==8){
        include('./pages/parcels/manage_parcel.php');
    }
    else if($page==9){
        include('./pages/parcels/edit_parcel.php');
    }
    else if($page==10){
        include('./pages/parcels/view_print.php');
    }
    else if($page==11){
        include('./pages/dashboard/dashboard.php');
    }
    else if ($page == 12){
        include('./pages/parcels/track_parcel.php');
    }
    else if($page==13){
        include('./pages/reports/report.php');
    }
    else{
       echo "Welcome to my Dashboard";
    }
}
?>