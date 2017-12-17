<?php
include('koneksi.php');
?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<center>
    <form method="post" style="display: none;">   
        <table border="1">
            <?php 
            
                $status_sensor = mysql_fetch_array(mysql_query('SELECT * from tb_status_sensor'));
            ?>
                <tr>
                        <td>
                        <?php if($status_sensor[1] == '1'){ ?>
                          <input type="submit" class="btn btn-danger" value="OFF" name="mati_pir">
                          
                        
                        <?php }else{ ?>
                        <input type="submit" class="btn btn-success" value="ON" name="nyala_pir">
                       
                             
                           
                        <?php } ?>
                    
                        <td>
                          <?php if($status_sensor[2] == '1'){ ?>
                            <input type="submit" class="btn btn-danger" value="OFF" name="mati_ulson">
                  

                        <?php }else{ ?>
                           <input type="submit" class="btn btn-success" value="ON" name="nyala_ulson">
                       
                         

                        <?php } ?>
                        <td style="padding: 5px;">
                        <input type="number" name="min_length" value="<?php echo $status_sensor[3] ?>">
                        <input type="submit" name="length" >
                        <td>
                </tr>
                <tr>
                    <td>SENSOR PIR</td>
                    <td>SENSOR ULSON</td>
                    <td>SENSOR JARAk</td>
                </tr>
        </table>
    </form>
</center>

<br>
<br>
<script type="text/javascript">

        function Ajax() // Ajax itu fungsi javascript yang digunakan untuk proses aksi tanpa pelu reload broser (asynchronous)
        {
            var
                $http,
                $self = arguments.callee;

            if (window.XMLHttpRequest) {
                $http = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                try {
                    $http = new ActiveXObject('Msxml2.XMLHTTP');
                } catch(e) {
                    $http = new ActiveXObject('Microsoft.XMLHTTP');
                }
            }

            if ($http) {
                $http.onreadystatechange = function()
                {
                    if (/4|^complete$/.test($http.readyState)) {
                        document.getElementById('ReloadThis').innerHTML = $http.responseText;
                        setTimeout(function(){$self();}, 1000);
                    }
                };
                $http.open('GET', 'loadtxt.php' + '?' + new Date().getTime(), true);
                $http.send(null);
            }

        }
        // buat nge get data loadtxt.php realtime
    </script>

<!DOCTYPE html>
<html>
<head>
	<title>Intrudder Alert</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
    if (isset ($_POST['mati_pir'])) {
        mysql_query("UPDATE tb_status_sensor SET sensor_pir = '0'");
        echo "<script>document.location.href='index.php?status=1'</script>";
    }
    if (isset ($_POST['nyala_pir'])) {
        mysql_query("UPDATE tb_status_sensor SET sensor_pir = '1'");
        echo "<script>document.location.href='index.php?status=1'</script>";
    }
?>

<?php
    if (isset ($_POST['mati_ulson'])) {
        mysql_query("UPDATE tb_status_sensor SET sensor_ultrasonic = '0'");
        echo "<script>document.location.href='index.php?status=1'</script>";
    }
    if (isset ($_POST['nyala_ulson'])) {
        mysql_query("UPDATE tb_status_sensor SET sensor_ultrasonic = '1'");
        echo "<script>document.location.href='index.php?status=1'</script>";
    }

    if(isset($_POST['length'])){
        mysql_query("UPDATE tb_status_sensor SET batas_jarak = '$_POST[min_length]'");
        echo "<script>document.location.href='index.php?status=1'</script>";
    }
?>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript">
        setTimeout(function() {Ajax();}, 1000);
    </script>
    <div class="container">
    	<div class="row">

		    <div id="ReloadThis" class="" style="font-size: 30px;">Initializing Sensor</div>
    	</div>
    </div>

</body>

</html>


