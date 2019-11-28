#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
IPAddress server(192, 168, 1, 177 );
EthernetClient client;

int p = 0;

void setup() {

p = 50;

Serial.begin(9600);

  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
  
    for(;;)
    ;
    }

  delay(1000);
  
Serial.println("connecting");

  if (client.connect(server, 80)) {
    Serial.println("connected");
    client.print("GET /telemetria.php?cardId=");
    client.print(p);
    client.println("HTTP/1.0");
    client.println();
    }
    
  else {
  
    Serial.println("connection failed");
  }
}



void loop()
{
  
  if (client.available()) {
    char c = client.read();
    Serial.print(c);
  }

  if (!client.connected()) {
    Serial.println();
    Serial.println("disconnecting.");
    client.stop();
    
    for(;;)
    ;
  }
}
