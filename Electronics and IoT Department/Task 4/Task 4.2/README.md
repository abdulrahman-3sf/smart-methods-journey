# Task 4.2: Servo & Obstacle Detection with Ultrasonic Sensor
## Smart Methods Journey - Electronics and IoT Department

### What is this task?
This task connects a **servo motor**, **ultrasonic distance sensor**, and **L293D-controlled motors**. The robot moves normally until it detects an obstacle within **10 cm**, then changes direction.

### How it works
- The **ultrasonic sensor** continuously measures distance.
- When an object is closer than 10 cm:
  - DC motors **stop**.
  - Motors **reverse direction** briefly to avoid the obstacle.
- The servo motor may be used to rotate a sensor or simulate radar (optional).

### Components
- 1x Servo Motor
- 1x Ultrasonic Sensor (HC-SR04 or similar)
- 2x DC Motors
- L293D Motor Driver
- Arduino Uno
- Jumper Wires
- Breadboard

### Files
- `task4.2.ino` — Arduino sketch for obstacle detection and motor control.
- `Task 4.2 desgin.png` Arduino design.

### How to build it
1. Connect DC motors to L293D (2 motors for testing).
2. Connect Ultrasonic:
   - VCC → 5V
   - GND → GND
   - SIG/Trig/Echo → Arduino pins
3. Connect Servo:
   - VCC → 5V
   - GND → GND
   - Signal → Arduino PWM pin (e.g., D9)
4. Upload the code and test by placing obstacles in front of the sensor.

### Example Result
The motors will stop and reverse when an object is detected at 10 cm. The servo may rotate for scanning if included.

### What I learned
- How to use ultrasonic sensor for real-time obstacle detection.
- How to stop and change motor direction with conditions.
- Basics of using a servo motor with Arduino.

