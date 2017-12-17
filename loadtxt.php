    <?php
    include ("koneksi.php");
    $status_sensor2 = mysql_fetch_array(mysql_query('SELECT * from tb_status_sensor'));

    // error_reporting(0);
        $file = "get_ultrasonic/jarak.txt";
        $f = fopen($file, "r"); // buat buka file jarak.txt   r itu read
        while ( $line = fgets($f, 1000)) { //dia akan ngambil data per 1000 second sekali
        	
         
            if($line!="Out of range"){
                $int = preg_replace('/[^0-9]+/', '', $line);  // buat ngambil angka nya doang dari blabla cm //jarak
                $state = explode("#", $line);  //buat memecah kata2 berdasarkan objek nya itu #    //pir
            }
        }
        //kalau nilai dlam array ke 1 bernilai 1 maka true
         if($status_sensor2[1] == '1'){ 
        echo "Parameter Gerak :".$state[1];
         }else{
          echo "Parameter Gerak : Please turn the sensor ON";
         } 

        if($status_sensor2[2] == '1'){ 
        echo "<br>Parameter Jarak &nbsp;: ".$int." cm";
         }else{
          echo "<br>Parameter Jarak : Please turn the sensor ON";
         } 


          

        echo "<br>";
        // kalo 0 ga bakalan masuk ke database
        if($status_sensor2[2] != '0' && $status_sensor2[1] != '0'){

           $new_motion_status = explode(" ", $state[1]);
           $liveStatus =  strcmp($new_motion_status[2], "Detected");// strcmp == string compare // apakah ada kata2 detected nya
           
           if($liveStatus == 2 && $int<$status_sensor2[3]){//livestatus == kalau ada serangan && dibawah jarak yg dikehendaki
              echo "<font class='blink'>Ada Serangan</font>";
          
              $data_penjaga = "1";
              $jaraknya = $int;
              mysql_query("INSERT INTO `tb_alert` (`id_alert`, `jarak_ke_benda`,`alert_time`, `id_penjaga`)
               VALUES (NULL, '$jaraknya' ,CURRENT_TIMESTAMP, '$data_penjaga');");//timestamp otomatis generate waktu server
           }else{
              echo "<font style='color:green;'>Tidak ada Serangan</font>";
           }
        }


         
    ?>

<style type="text/css">
    	@-webkit-keyframes blinker {
  from {opacity: 1.0;}
  to {color:red;}
}
.blink{
	text-decoration: blink;
	-webkit-animation-name: blinker;
	-webkit-animation-duration: 0.5s;
	-webkit-animation-iteration-count:infinite;
	-webkit-animation-timing-function:ease-in-out;
	-webkit-animation-direction: alternate;
}
    </style>