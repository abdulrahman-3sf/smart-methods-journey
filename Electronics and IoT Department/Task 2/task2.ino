#include <Servo.h>

Servo servo1;
Servo servo2;
Servo servo3;
Servo servo4;

int pos = 0;

void setup() {
  servo1.attach(10); // Pin for Servo 1
  servo2.attach(11);  // Pin for Servo 2
  servo3.attach(12);  // Pin for Servo 3
  servo4.attach(13);  // Pin for Servo 4
}

void loop() {
  unsigned long startTime = millis();

  // Sweep all servos for 2 seconds
  while (millis() - startTime < 2000) {
    for (pos = 0; pos <= 180; pos += 1) {
      servo1.write(pos);
      servo2.write(pos);
      servo3.write(pos);
      servo4.write(pos);
      delay(5);
    }
    for (pos = 180; pos >= 0; pos -= 1) {
      servo1.write(pos);
      servo2.write(pos);
      servo3.write(pos);
      servo4.write(pos);
      delay(5);
    }
  }

  // Set all servos to 90 degrees and stop further movement
  servo1.write(90);
  servo2.write(90);
  servo3.write(90);
  servo4.write(90);

  while (true); // Infinite loop to hold position
}
