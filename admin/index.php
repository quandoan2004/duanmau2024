<?php
include "../Model/pdo.php";
include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $tenloai=$_POST['tenloai'];
                $spl="insert into danhmuc(name) values('$tenloai')";
                pdo_execute($spl);
                $thongbao="Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'lisdm':
            $spl="select * from danhmuc order by id desc";
            $listdanhmuc = pdo_query($spl);
            include "danhmuc/list.php";
            break;
        case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $spl= "delete  from danhmuc where id=".$_GET['id'];
                    pdo_execute($spl);
                }
                $spl="select * from danhmuc order by id desc";
                $listdanhmuc=pdo_query($spl);
                include "danhmuc/list.php";
                break;


            default:
                include "home.php";
                break;
    }
}else {
    include "home.php";
}

include "footer.php";
