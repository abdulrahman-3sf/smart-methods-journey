const int pirPin = 7;      // PIR motion sensor
const int potPin = A0;     // Potentiometer
const int ledPin = 2;      // LED

void setup() {
  pinMode(pirPin, INPUT);
  pinMode(ledPin, OUTPUT);
  Serial.begin(9600);
}

void loop() {
  int motion = digitalRead(pirPin);
  int potValue = analogRead(potPin);

  Serial.print("Motion: ");
  Serial.print(motion);
  Serial.print(" | Potentiometer: ");
  Serial.println(potValue);

  if (motion == HIGH) {
    digitalWrite(ledPin, HIGH); // Turn on LED
  } else if (potValue > 600) {
    digitalWrite(ledPin, HIGH);
    delay(200);
    digitalWrite(ledPin, LOW);
    delay(200);
  } else {
    digitalWrite(ledPin, LOW);
  }
}
