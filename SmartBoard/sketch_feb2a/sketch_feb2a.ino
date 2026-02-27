int tlacitko = 7; // definuje pin tlačidla
int led = 12;     // definuje pin LED diódy

void setup() { // kód, ktorý sa spustí iba raz

  pinMode(tlacitko, INPUT_PULLUP); // nastaví počiatočný stav tlačidla na HIGH
  pinMode(led, OUTPUT);            // nastaví LED diódu ako výstup
  
}

void loop() { // kód, ktorý sa spúšťa opakovane

  int stavtlacidla = digitalRead(tlacitko); // definujeme premennú, ktorá číta stav tlačidla (HIGH alebo LOW)
  
  if (stavtlacidla == HIGH) { // ak je tlačidlo stlačené, zapne prúd na pine 12 a tým sa zapne LED dióda
    DigitalWrite(12, HIGH);        // zapne sa prúd na pine 12
  } else {                    // ak tlačidlo nie je stlačené, vypne prúd na pine 12 a tým sa vypne LED dióda
    DigitalWrite(12, LOW);         // vypne sa prúd na pine 12
  }
}
