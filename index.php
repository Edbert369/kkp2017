
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
                            

                            case '3':
                                session_destroy();
                                echo "<script>document.location.href='index.php?status=1'</script>";
                                break;    
                        }

                  include "footer.php";  
                        
                    }
                        else {
                            include 'login.php';
                        }
                    ?>
           
       


<?php   ?>

