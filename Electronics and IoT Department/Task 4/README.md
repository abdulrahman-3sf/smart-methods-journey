# Task 4: Smart Motor Control & Obstacle Avoidance
## Smart Methods Journey - Electronics and IoT Department

### What is this task?
This task combines two projects:
1. **Task 4.1** — DC motor movement control using L293D.
2. **Task 4.2** — Obstacle detection with ultrasonic sensor and servo motor.

### How it works

#### Task 4.1:
- Four DC motors connected to L293D driver.
- Perform a sequence:
  1. Move forward (30 sec)
  2. Move backward (60 sec)
  3. Alternate left-right (60 sec)

#### Task 4.2:
- Robot moves forward with obstacle detection.
- If an object is closer than 10 cm:
  - Motors stop and reverse direction.
  - Servo motor may rotate for scanning (optional).

### Components
- Arduino Uno
- 4x DC Motors
- 1x Servo Motor
- 1x Ultrasonic Sensor
- 1x L293D Motor Driver
- Breadboard
- Jumper Wires
- Power Supply

### Files
- `task4_1.ino` — DC motor movement.
- `Task 4.1 desgin.png` Arduino design.
- `task4_2.ino` — Obstacle avoidance with sensor and servo.
- `Task 4.2 desgin.png` Arduino design.

### How to build it
1. Follow Task 4.1 wiring for motors and L293D.
2. Add ultrasonic sensor and servo as described in Task 4.2.
3. Upload each sketch to test its behavior.

### Example Result
- Task 4.1: Robot moves in set patterns.
- Task 4.2: Robot reacts to obstacles and changes direction.

### What I learned
- Motor control with L293D
- Timing and logic with Arduino
- Distance sensing with ultrasonic
- Servo motor integration
- Building smart behaviors with sensors
