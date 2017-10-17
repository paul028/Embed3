#include <SoftwareSerial.h>
#include <OneWire.h> 
#include "ESP8266.h"
String configs[]={"nonat","password","192.168.43.234"}; 
SoftwareSerial esp(2,3); // RX, T`X
ESP8266 wifi(esp);
OneWire ds(9);
void setup() {
 pinMode(13,OUTPUT);
 pinMode(A0,INPUT); //pH 
 pinMode(A1,INPUT); //Temp
 pinMode(A2,INPUT); //Turbidity
 Serial.begin(9600);
 esp.begin(9600);
 Connect_Wifi();
}

void loop() {
delay(10);
esp.listen();
receive_data("pH=" +(String)analogRead(A1) +"&temp=" +
getTemp()+"&tbt="+analogRead(A0));
}

void Connect_Wifi()
{
wifi.joinAP(configs[0],configs[1]);
}

void receive_data(String data) // for on off using app
{
    esp.println("AT+CIPSTART=\"TCP\",\"" + configs[2] + "\",80");
    delay(10);
    if (esp.find("OK"))
      {
        digitalWrite(13,HIGH);
      }     
             String postRequest = "POST /DAQ/php/insertdata.php?"+data + " HTTP/1.1\r\nHost: "+configs[2]+"\r\n\r\n";
             esp.print(F("AT+CIPSEND="));
             esp.println(postRequest.length());
             delay(10);
             if (esp.find(">"))
                {
                   esp.println(postRequest);
                   esp.println();
                  if (esp.find("SEND OK"))
                  {
                    digitalWrite(13,LOW);
                    esp.println(F("AT+CIPCLOSE"));
                 }
            }
  }
float getTemp(){
  //returns the temperature from one DS18S20 in DEG Celsius

  byte data[12];
  byte addr[8];

  if ( !ds.search(addr)) {
      //no more sensors on chain, reset search
      ds.reset_search();
      return -1000;
  }

  if ( OneWire::crc8( addr, 7) != addr[7]) {
      Serial.println("CRC is not valid!");
      return -1000;
  }

  if ( addr[0] != 0x10 && addr[0] != 0x28) {
      Serial.print("Device is not recognized");
      return -1000;
  }

  ds.reset();
  ds.select(addr);
  ds.write(0x44,1); // start conversion, with parasite power on at the end

  byte present = ds.reset();
  ds.select(addr);    
  ds.write(0xBE); // Read Scratchpad

  for (int i = 0; i < 9; i++) { // we need 9 bytes
    data[i] = ds.read();
  }

  ds.reset_search();

  byte MSB = data[1];
  byte LSB = data[0];

  float tempRead = ((MSB << 8) | LSB); //using two's compliment
  float TemperatureSum = tempRead / 16;

  return TemperatureSum;
}
