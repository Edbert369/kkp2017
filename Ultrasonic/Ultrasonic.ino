//deklarasi meletakkan dimana
int ledPin = 13;                // choose the pin for the LED
int inputPin = 11;               // choose the input pin (for PIR sensor)
int pirState = LOW;             // we start, assuming no motion detected
int val = 0;                    // variable for reading the pin status
String hasilPir = "";
int integerPir = 0;

#define trigPin 8
#define echoPin 9

//inisialisasi berfungsi untuk apa
void setup() {  
  pinMode(ledPin, OUTPUT);      // declare LED as output
  pinMode(inputPin, INPUT);     // declare sensor as input
  
  Serial.begin (9600);
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  int duration;
}


void loop() {

  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  
  
  int duration = pulseIn(echoPin, HIGH);//buat ngambil gelombang nya / nge trigger 
  
  int distance = (duration/2) / 29.1;
  

   sensorPir(); //manggil fungsi sensor pir yg ada dibawah 
     if(distance<0){
         distance = 1;
     }//kalau misalnya distance nya minus bakal jadi 1
    Serial.print(distance);
    Serial.print(" cm # ");
    Serial.println(hasilPir);

     if (integerPir == 1  && distance < 20) {
       digitalWrite(ledPin, HIGH);  // turn LED ON
     }else{
        digitalWrite(ledPin, LOW);
     }

  delay(1000);
}

void sensorPir(){
  val = digitalRead(inputPin);  // read input value
  if (val == HIGH) {            // check if the input is HIGH // kalau sensor nya nyala  
      
    if (pirState == LOW) {
      // we have just turned on
      hasilPir = "Motion Detected";
      integerPir = 1;
      // We only want to print on the output change, not state
      pirState = HIGH;
    }
  }  else {
      if (pirState == HIGH){
      // we have just turned off
      hasilPir = "Motion Ended";
      integerPir = 0;
      // We only want to print on the output change, not state
      // Inside Of The Serial Port
      pirState = LOW;
    }
  }
}



