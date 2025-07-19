const int activityPin = 2;    // Example: motion sensor or any input signal
const int loadPin = 6;        // Relay or MOSFET controlling the load
const unsigned long timeout = 3000; // 10 seconds of inactivity before turning off

unsigned long lastActiveTime = 0;
bool isOn = false;

void setup() {
  pinMode(activityPin, INPUT);     // HIGH when active
  pinMode(loadPin, OUTPUT);
  digitalWrite(loadPin, LOW);      // Start OFF
  Serial.begin(9600);
}

void loop() {
  bool active = digitalRead(activityPin);

  if (active) {
    lastActiveTime = millis();
    if (!isOn) {
      digitalWrite(loadPin, HIGH); // Turn ON load
      isOn = true;
      Serial.println("Device turned ON");
    }
  }

  // Auto-OFF after timeout of inactivity
  if (isOn && (millis() - lastActiveTime > timeout)) {
    digitalWrite(loadPin, LOW);  // Turn OFF load
    isOn = false;
    Serial.println("Device turned OFF due to inactivity");
  }
}
