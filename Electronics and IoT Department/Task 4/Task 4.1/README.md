# Task 4.1: DC Motor Movement Control
## Smart Methods Journey - Electronics and IoT Department

### What is this task?
This task controls **four DC motors** using the **L293D motor driver**. The motors perform a specific set of movements using Arduino code.

### How it works
- The four DC motors are connected through the **L293D driver**.
- Motors perform the following:
  1. Move **forward** for 30 seconds.
  2. Move **backward** for 1 minute.
  3. Alternate between **left and right** for 1 minute.

### Components
- 4x DC Motors (2-terminal)
- L293D Motor Driver IC
- Arduino Uno
- Jumper Wires
- Breadboard
- External Power Supply (if needed)

### Files
- `task4.1.ino` — Arduino sketch to run the motor sequence.
- `Task 4.1 desgin.png` Arduino design.

### How to build it
1. Connect the DC motors to the L293D pins:
   - Motor 1 → Pin 3 & 6
   - Motor 2 → Pin 11 & 14
   - Motor 3 → Pin 2 & 7
   - Motor 4 → Pin 10 & 15
2. Connect L293D:
   - Pin 1, 9 → Arduino 5V (Enable Pins)
   - Pin 4, 5, 12, 13 → GND
   - Pin 8 → Motor power (e.g., 6V battery)
3. Connect control pins to Arduino:
   - IN1, IN2, IN3, IN4, etc. → Arduino digital pins (as defined in the code)
4. Upload the sketch and observe the motor movements.

### Example Result
The robot will move forward → backward → alternate left-right according to the time delays.

### What I learned
- How to control multiple DC motors using L293D.
- How to sequence motor movement using timing and logic.
- Basics of motor direction control in Arduino.

