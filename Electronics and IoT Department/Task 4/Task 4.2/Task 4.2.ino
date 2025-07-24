#include <Servo.h>

Servo myServo;

const int motor1Pin1 = 2;
const int motor1Pin2 = 3;
const int motor2Pin1 = 4;
const int motor2Pin2 = 5;

const int servoPin = 9;
const int ultrasonicPin = 7;

long duration;
int distance;

void setup() {
  pinMode(motor1Pin1, OUTPUT);
  pinMode(motor1Pin2, OUTPUT);
  pinMode(motor2Pin1, OUTPUT);
  pinMode(motor2Pin2, OUTPUT);

  myServo.attach(servoPin);
  pinMode(ultrasonicPin, OUTPUT); // for trigger
  digitalWrite(ultrasonicPin, LOW);

  Serial.begin(9600);
}

void loop() {
  // Trigger ultrasonic pulse
  pinMode(ultrasonicPin, OUTPUT);
  digitalWrite(ultrasonicPin, LOW);
  delayMicroseconds(2);
  digitalWrite(ultrasonicPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(ultrasonicPin, LOW);

  // Switch to input to read echo
  pinMode(ultrasonicPin, INPUT);
  duration = pulseIn(ultrasonicPin, HIGH);

  distance = duration * 0.034 / 2;
  Serial.print("Distance: ");
  Serial.println(distance);

  if (distance < 10) {
    // Stop motors
    stopMotors();
    delay(500);

    // Change direction
    reverseMotors();
    delay(1000);

    // Move servo
    myServo.write(90); // center
    delay(500);
    myServo.write(0);  // scan left
    delay(500);
    myServo.write(180); // scan right
    delay(500);
  } else {
    // Move forward
    forwardMotors();
  }

  delay(100);
}

void forwardMotors() {
  digitalWrite(motor1Pin1, HIGH);
  digitalWrite(motor1Pin2, LOW);
  digitalWrite(motor2Pin1, HIGH);
  digitalWrite(motor2Pin2, LOW);
}

void reverseMotors() {
  digitalWrite(motor1Pin1, LOW);
  digitalWrite(motor1Pin2, HIGH);
  digitalWrite(motor2Pin1, LOW);
  digitalWrite(motor2Pin2, HIGH);
}

void stopMotors() {
  digitalWrite(motor1Pin1, LOW);
  digitalWrite(motor1Pin2, LOW);
  digitalWrite(motor2Pin1, LOW);
  digitalWrite(motor2Pin2, LOW);
}
