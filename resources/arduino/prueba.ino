#include <Ethernet.h>
// Configuracion del Ethernet Shield
byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFF, 0xEE}; // Direccion MAC
IPAddress server (192,168,1,3);
IPAddress ip (192,168,1,10);
byte subnet [] = { 255,255,255,0 };
EthernetClient client;//objeto del ethernet
bool printWebData = true;

#include <MFRC522.h>
#include <SPI.h>

#define SS_PIN 53
#define RST_PIN 49
#define LED_G 5 //define green LED pin
#define LED_R 4 //define red LED
#define RELAY 3 //relay pin
#define BUZZER 2 //buzzer pin
#define ACCESS_DELAY 500
#define DENIED_DELAY 1000
MFRC522 mfrc522(SS_PIN, RST_PIN); // Create MFRC522 instance.
String content="";
String rfid="";

void setup() 
{
  Serial.begin(9600);   // Initiate a serial communication
  while (!Serial) {
  }
  SPI.begin();          // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522
  Ethernet.begin(mac, ip, subnet); //Inicializamos el Ethernet Shield
  pinMode(LED_G, OUTPUT);
  pinMode(LED_R, OUTPUT);
  pinMode(RELAY, OUTPUT);
  pinMode(BUZZER, OUTPUT);
  noTone(BUZZER);
  digitalWrite(RELAY, LOW);
  
  
  Serial.print("Conectando al componente Ethernet Shield: ");
  Serial.println(ip);
  Serial.print("Conectando al servidor de base de datos: ");
  Serial.println(server);
  
  Serial.println("Favor pasar su tarjeta por el sensor...");
  Serial.println();
  delay(1000);///////////////
  
}
void loop() 
{
  // Look for new cards
  if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {
    return;
  }
  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {
    return;
  }
  //Show UID on serial monitor
  Serial.print("ID Tarjeta :");
  content= "";
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
     Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
     Serial.print(mfrc522.uid.uidByte[i], HEX);
     content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
     content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  Serial.println();
  Serial.print("Message : ");
  content.toUpperCase();
  if (content.substring(1) == "47 54 2C 2C") //change here the UID of the card/cards that you want to give access
  {
    Serial.println("Acceso autorizado");
    Serial.println();
    delay(500);
    digitalWrite(RELAY, HIGH);
    digitalWrite(LED_G, HIGH);
    tone(BUZZER, 1100);
    delay(ACCESS_DELAY);
    digitalWrite(RELAY, LOW);
    digitalWrite(LED_G, LOW);
    noTone(BUZZER);                                                                                                       
  }
 
 else   {
    Serial.println("Acceso denegado");
    digitalWrite(LED_R, HIGH);                                                                              
    tone(BUZZER, 810);
    delay(DENIED_DELAY);
    digitalWrite(LED_R, LOW);
    noTone(BUZZER);
  }

      httpRequest ( ) ;
}
void httpRequest() {
  rfid = "";
  if ( client. connect ( server , 80 ) ) {

    client.println("GET /sistema_acceso/resources/arduino/conexion_arduino.php?HTTP/1.1"); // Enviamos los datos por GET
    client.println(server);
    rfid = content; 
    client.print("GET /sistema_acceso/resources/arduino/conexion_arduino.php?rfid_php=");
    client.print(rfid);
    Serial.println("Conexion: cerrada");
    Serial.println();
   
    client.println(" HTTP/1.1");
    client.print("Servidor: ");
    client.println(server);
    Serial.println("Envio con exito");
    Serial.println();
  } else {
    Serial.println("Fallo en la conexion");
  }
  while (client.connected()) {
    int len = client.available();
    if (len > 0) {
      byte buffer[80];
    if (len > 80) len = 80;
    client.read(buffer, len);
    if (printWebData) {
      Serial.write(buffer, len);
    }
    }
    }
    if (!client.connected()) {
    Serial.println();
    Serial.println("Desconectando...");
  }
 }
