const int redLedPin = 13;
const int greenLedPin = 12;
const int blueLedPin = 11;

const int redButtonPin = 8;
const int greenButtonPin = 4;
const int blueButtonPin = 2;

int redButtonState = 0;
int greenButtonState = 0;
int blueButtonState = 0;

void setup() {
  pinMode(redLedPin, OUTPUT);
  pinMode(greenButtonPin, OUTPUT);
  pinMode(blueButtonPin, OUTPUT);
  
  pinMode(redButtonPin, INPUT);
  pinMode(greenButtonPin, INPUT);
  pinMode(blueButtonPin, INPUT);
}

void loop() {
  redButtonState = digitalRead(redButtonPin);
  greenButtonState = digitalRead(greenButtonPin);
  blueButtonState = digitalRead(blueButtonPin);

  digitalWrite(redLedPin, redButtonState);
  digitalWrite(greenLedPin, greenButtonState);
  digitalWrite(blueLedPin, blueButtonState);
}
