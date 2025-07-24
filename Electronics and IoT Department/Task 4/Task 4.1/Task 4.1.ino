// First L293D (Motors 1 & 2)
int IN1 = 2;  // Motor A
int IN2 = 3;
int IN3 = 4;  // Motor B
int IN4 = 5;

// Second L293D (Motors 3 & 4)
int IN5 = 8;  // Motor C
int IN6 = 9;
int IN7 = 10;  // Motor D
int IN8 = 11;

void setup() {
  // Set all motor control pins as OUTPUT
  pinMode(IN1, OUTPUT);
  pinMode(IN2, OUTPUT);
  pinMode(IN3, OUTPUT);
  pinMode(IN4, OUTPUT);
  pinMode(IN5, OUTPUT);
  pinMode(IN6, OUTPUT);
  pinMode(IN7, OUTPUT);
  pinMode(IN8, OUTPUT);
}

void loop() {
  // Step 1: Move all motors forward for 30 seconds
  digitalWrite(IN1, HIGH); digitalWrite(IN2, LOW);
  digitalWrite(IN3, HIGH); digitalWrite(IN4, LOW);
  digitalWrite(IN5, HIGH); digitalWrite(IN6, LOW);
  digitalWrite(IN7, HIGH); digitalWrite(IN8, LOW);
  delay(30000);  // 30 seconds

  // Step 2: Move all motors backward for 60 seconds
  digitalWrite(IN1, LOW); digitalWrite(IN2, HIGH);
  digitalWrite(IN3, LOW); digitalWrite(IN4, HIGH);
  digitalWrite(IN5, LOW); digitalWrite(IN6, HIGH);
  digitalWrite(IN7, LOW); digitalWrite(IN8, HIGH);
  delay(60000);  // 60 seconds

  // Step 3: Alternate right and left for 1 minute
  for (int i = 0; i < 6; i++) {
    // Turn right (left-side motors forward only)
    digitalWrite(IN1, HIGH); digitalWrite(IN2, LOW);  // Motor 1
    digitalWrite(IN3, LOW);  digitalWrite(IN4, HIGH); // Motor 2
    digitalWrite(IN5, HIGH); digitalWrite(IN6, LOW);  // Motor 3
    digitalWrite(IN7, LOW);  digitalWrite(IN8, HIGH); // Motor 4
    delay(5000);

    // Turn left (right-side motors forward only)
    digitalWrite(IN1, LOW);  digitalWrite(IN2, HIGH); // Motor 1
    digitalWrite(IN3, HIGH); digitalWrite(IN4, LOW);  // Motor 2
    digitalWrite(IN5, LOW);  digitalWrite(IN6, HIGH); // Motor 3
    digitalWrite(IN7, HIGH); digitalWrite(IN8, LOW);  // Motor 4
    delay(5000);
  }
}
