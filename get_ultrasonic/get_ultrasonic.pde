import processing.serial.*;
//   import processing.serial.*; guna nya buat import library yg dibutuhkan untuk membaca transaksi pada port USB
PrintWriter output;

Serial myPort;  // Create object from Serial class
String val;     // Data received from the serial port

void setup()
{
  // I know that the first port in the serial list on my mac
  // is Serial.list()[0].
  // On Windows machines, this generally opens COM1.
  // Open whatever port is the one you're using.
  //String portName = Serial.list()[0]; //change the 0 to a 1 or 2 etc. to match your port
  myPort = new Serial(this, "COM3", 9600);// port yang kita pakai
 // output = createWriter("jarak.txt"); //buat nulis file yg dimasukin ke php
}

void draw()
{
  val = myPort.readStringUntil('\n');// val itu variable yg buat menampung parameter ouput dari isi proses arduino
  if(val!=null){
    if(val!="Out of range"){
       print(val); //isi dari proses arduino itu masuk ke RAM
       output = createWriter("jarak.txt"); //buat file jarak.txt
       output.write(val);// nulis dari variabel val ke jarak.txt
       output.flush();  // baru di save jadi jarak.txt ada isinya 
    }
    delay(900);
  }
}