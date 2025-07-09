# Task 2: Servo Motor Control
## Smart Methods Journey - Electronics and IoT Department
### What is this task?
This project uses **4 servo motors** controlled by an Arduino Uno. All servos sweep together in synchronized movement for exactly 2 seconds, then stop at the center position (90 degrees).

### How it works
1. All 4 servos start sweeping from 0° to 180° and back to 0°
2. This sweeping motion continues for exactly 2 seconds
3. After 2 seconds, all servos move to 90° (center position)
4. All servos hold the 90° position permanently
5. The system stops all further movement

### Components needed
- Arduino Uno
- 4 Servo Motors (SG90 or similar)
- Breadboard
- Jumper wires
- External power supply (recommended for multiple servos)

### Files in this project
- `task2.ino` - Arduino code for servo motor control
- `task2_design.png` - Circuit wiring diagram

### How to build it
1. **Build the Circuit:**
   - Follow the wiring in `task2_design.png`
   - Connect servo signal wires to Arduino pins 10, 11, 12, 13
   - Connect servo power (red) to 5V or external power supply
   - Connect servo ground (brown/black) to Arduino ground
   - Use external power supply for stable servo operation

2. **Upload Code:**
   - Open `task2.ino` in Arduino IDE
   - Select Arduino Uno board
   - Upload code to your Arduino

3. **Test:**
   - Power on the Arduino
   - Watch all 4 servos sweep together for 2 seconds
   - Observe servos stop at 90° position

### Example result
```
Power ON → All servos sweep 0°-180°-0° for 2 seconds → All servos move to 90° → STOP
```

### Code explanation
- **Setup:** Attaches 4 servos to pins 10-13
- **Loop:** Uses `millis()` to time the 2-second sweep period
- **Sweep:** All servos move in sync from 0° to 180° and back
- **Stop:** After 2 seconds, all servos set to 90° and program halts

### What I learned
- Servo motor control with Arduino
- Synchronized movement of multiple servos
- Timing control using `millis()` function
- Arduino Servo library usage
- Power considerations for multiple servos
- Program flow control and infinite loops

---
*Part of Smart Methods Journey - Learning Electronics and IoT*
