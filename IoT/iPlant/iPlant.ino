#include <ESP8266WiFi.h>
#include<WiFiClient.h>
#include <ESP8266HTTPClient.h>

String macaddress = "";

void setup() {
  Serial.begin(115200);
  Serial.println("Starting system");

    while(WiFi.status() != WL_CONNECTED){
    Serial.println("Connection failed, trying again...");
    delay(500);
    ESP.restart();
  }
  
  Serial.println("Ready");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  macaddress = WiFi.macAddress();
}

void loop() {
  HTTPClient http;

  String sensor, postData;
  int sensorValue = analogRead(A0);

  postData = "sensor=" + String(sensorValue) + "&macaddress=" + macaddress;

  http.begin("http://ismartin.xyz/iplant/restapi.php");
  http.addHeader("Content-Type","application/x-www-form-urlencoded");

  int httpCode = http.POST(postData);
  Serial.println(postData);
  
  http.end();
  delay(5000);
}
