
<?php

    session_start();
    error_reporting(0);
    include ("koneksi.php");
    

    if ($_SESSION['id']) {
        # code...
  ?>
<!--<a href="index.php?status=1">status</a>
<a href="index.php?status=2">laporan</a>

<a href="index.php?status=3">logout</a>-->
   
        
           
                  <?php  
                    include "header.php";

                        switch ($_GET['status']) {
                            case '1':
                                include 'status.php';
                                break;
                            

                            case '2':
                                include 'laporan.php';
                                break;
                            

                            case '5':
                                include 'laporan_ulson.php';
                                break;
                            

                            case '6':
                                include 'laporan_peer.php';
                                break;
                            

                            case '3':
                                $status_sensor = mysql_fetch_array(mysql_query('SELECT * from tb_status_sensor'));
                                    if($status_sensor[1]=='1' && $status_sensor[2]=='1'){
                                        echo "<script>alert('Silahkan Matikan sensor Terlebih dahulu')</script>";
                                        echo "<script>document.location.href='index.php?status=1'</script>";
                                    }else{
                                        session_destroy();
                                        echo "<script>document.location.href='index.php?status=1'</script>";
                                    }                                
                                break;    
                        }

                  include "footer.php";  
                        
                    }
                        else {
                            include 'login.php';
                        }
                    ?>
           
       


<?php   ?>

