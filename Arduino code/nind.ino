#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <Fuzzy.h>
#include <Servo.h>

//water
int sensorPin = D7;
volatile long pulse;
unsigned long lastTime;
float volume;

Servo myservo;
#define servoPin D5
int angle = 0;

//wifi
const char* ssid = "Indang"; //ganti nama hotspot
const char* pass = "indang1234";//ganti password

const char* ip_server = "172.20.10.2";//buka cmd - ketik "ipconfig" - copy iipv4
//akhir wifi

#define trigPin  D2
#define echoPin  D3
//const int trigPin = 2;
//const int echoPin = 3;
long duration;
int air;

#define rainAnalogPin A0
//int rainAnalogPin = A0;
//int rainDigitalPin = 2;

// Instantiating a Fuzzy object
Fuzzy *fuzzy = new Fuzzy();
//rain
FuzzySet *tidak_hujan = new FuzzySet(0, 0, 20, 50);
FuzzySet *hujan = new FuzzySet(20, 50, 100, 100);

//ultra
FuzzySet *rendah = new FuzzySet(0, 0, 10, 13);
FuzzySet *sedang = new FuzzySet(10, 12.9, 13, 16);
FuzzySet *tinggi = new FuzzySet(13, 16, 21, 21);

// output
FuzzySet *portalrendah = new FuzzySet(50, 50, 70, 80);
FuzzySet *portaltinggi = new FuzzySet(70, 120, 180, 180);



void setup()
{
  myservo.attach(servoPin);
  attachInterrupt(digitalPinToInterrupt(sensorPin), increase, RISING);
  pinMode(rainAnalogPin, INPUT);

  pinMode(trigPin, OUTPUT); // mengatur trigerpin sebagai output
  pinMode(echoPin, INPUT); // mengatur trigerpin sebagai input

  Serial.begin(9600);

  // Instantiating a FuzzyInput object
  FuzzyInput *rain = new FuzzyInput(1);
  rain->addFuzzySet(tidak_hujan);
  rain->addFuzzySet(hujan);
  fuzzy->addFuzzyInput(rain);

  FuzzyInput *ultra = new FuzzyInput(2);
  ultra->addFuzzySet(rendah);
  ultra->addFuzzySet(sedang);
  ultra->addFuzzySet(tinggi);
  fuzzy->addFuzzyInput(ultra);

  // Instantiating a FuzzyOutput objects
  FuzzyOutput *portal = new FuzzyOutput(1);
  portal->addFuzzySet(portalrendah);
  portal->addFuzzySet(portaltinggi);
  fuzzy->addFuzzyOutput(portal);


  //fuzzy rules
  //==============================================================
  FuzzyRuleAntecedent *tidakhujandannormal = new FuzzyRuleAntecedent();
  tidakhujandannormal->joinWithAND(tidak_hujan, rendah);

  FuzzyRuleConsequent *portal1 = new FuzzyRuleConsequent();
  portal1->addOutput(portalrendah);

  FuzzyRule *fuzzyRule01 = new FuzzyRule(1, tidakhujandannormal, portal1);
  fuzzy->addFuzzyRule(fuzzyRule01);

  //==============================================================
  FuzzyRuleAntecedent *tidakhujandantinggi = new FuzzyRuleAntecedent();
  tidakhujandantinggi->joinWithAND(tidak_hujan, tinggi);

  FuzzyRuleConsequent *portal2 = new FuzzyRuleConsequent();
  portal2->addOutput(portaltinggi);

  FuzzyRule *fuzzyRule02 = new FuzzyRule(1, tidakhujandantinggi, portal2);
  fuzzy->addFuzzyRule(fuzzyRule02);

  //==============================================================
  FuzzyRuleAntecedent *hujandannormal = new FuzzyRuleAntecedent();
  hujandannormal->joinWithAND(hujan, rendah);

  FuzzyRuleConsequent *portal3 = new FuzzyRuleConsequent();
  portal3->addOutput(portalrendah);

  FuzzyRule *fuzzyRule03 = new FuzzyRule(1, hujandannormal, portal3);
  fuzzy->addFuzzyRule(fuzzyRule03);

  //==============================================================
  FuzzyRuleAntecedent *hujandantinggi = new FuzzyRuleAntecedent();
  hujandantinggi->joinWithAND(hujan, tinggi);

  FuzzyRuleConsequent *portal4 = new FuzzyRuleConsequent();
  portal4->addOutput(portaltinggi);

  FuzzyRule *fuzzyRule04 = new FuzzyRule(1, hujandantinggi, portal4);
  fuzzy->addFuzzyRule(fuzzyRule04);


  //==============================================================
  FuzzyRuleAntecedent *tidakhujandansedang = new FuzzyRuleAntecedent();
  hujandantinggi->joinWithAND(tidak_hujan, sedang);

  FuzzyRuleConsequent *portal5 = new FuzzyRuleConsequent();
  portal4->addOutput(portalrendah);

  FuzzyRule *fuzzyRule05 = new FuzzyRule(1, tidakhujandansedang, portal5);
  fuzzy->addFuzzyRule(fuzzyRule05);

  //==============================================================
  FuzzyRuleAntecedent *hujandansedang = new FuzzyRuleAntecedent();
  hujandantinggi->joinWithAND(hujan, sedang);

  FuzzyRuleConsequent *portal6 = new FuzzyRuleConsequent();
  portal4->addOutput(portalrendah);

  FuzzyRule *fuzzyRule06 = new FuzzyRule(1, hujandansedang, portal6);
  fuzzy->addFuzzyRule(fuzzyRule06);

  //setup  and connecting wifi
  Serial.print(" Connect to : ");
  Serial.println(ssid);
  WiFi.begin(ssid, pass);
  while (WiFi.status() != WL_CONNECTED)
  {
    Serial.println("Please wait...");
  }
  Serial.print("\n");
  Serial.print("IP address : ");
  Serial.print(WiFi.localIP());
  Serial.print("\n");
  Serial.print("Connect to : ");
  Serial.println(ssid);
}

void loop()
{
  int rains = analogRead(rainAnalogPin);
  Serial.print("Rain sensor : ");
  int rain = map(rains, 0, 1024, 100, 0);
  Serial.println(rain);
  String kondisi;
  if (rain <= 35) {
    kondisi = "tidak_hujan";
  }
  else if (rain >= 36) {
    kondisi = "Hujan";
  }
  Serial.print("kondisi : ");
  Serial.println(kondisi);

  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  duration = pulseIn(echoPin, HIGH);
  // airs adalah rumus mencari jarak
  int  airs = duration * 0.034 / 2;
  Serial.print("Tinggi Air : ");
  int air = map(airs, 0, 23, 23, 0);
  Serial.print(air);
  Serial.println(" Cm");

  // Printing something
  // Set the value as an input
  fuzzy->setInput(1, rain);
  fuzzy->setInput(2, air);
  // Running the Fuzzification
  fuzzy->fuzzify();
  // Running the Defuzzification
  float output = fuzzy->defuzzify(1);
  // Printing something
  Serial.print("Servo : ");
  Serial.print(int(output));
  Serial.println("°");
  myservo.write(int(output));

  String kportal;
  if (kondisi == "tidak_hujan" && air <= 15) {
    kportal = "Tertutup";
  }
  else if (kondisi == "tidak_hujan" && air >= 16) {
    kportal = "Terbuka";
  }
  else if (kondisi == "Hujan" && air <= 15) {
    kportal = "Tertutup";
  }
  else if (kondisi == "Hujan" && air >= 16) {
    kportal = "Terbuka";
  }
  Serial.print("Portal : ");
  Serial.println(kportal);

  //water
  volume = 2.663 * pulse / 1000 * 30;
  if (millis() - lastTime > 2000) {
    pulse = 0;
    lastTime = millis();
  }
  Serial.print("volume :  ");
  Serial.print(volume);
  Serial.println(" L/m");


  WiFiClient client;
  const int port = 80;

  //data transfer
  if (!client.connect(ip_server, port)) {
    Serial.println("Gagal connect server");
    Serial.println(" ");
    return ;
  }
  String Link ;
  HTTPClient http ;
  Link = "http://" + String(ip_server) + "/sibenoo/monitoringsensor/kirim/A11/" + String(volume) + "/" + String(air) + "/" + String(kondisi) + "/" + String(kportal);
  Serial.println(Link);
  http.begin(client, Link);
  //mode
  http.GET();
  //tutupkoneksi
  http.end();
  //akhir //data transfer


  Serial.println("berhasil");
  Serial.println(" ");

  delay(2000);

}

ICACHE_RAM_ATTR void increase() {
  pulse++;
}
