# Task 1: Button-Controlled RGB LEDs

## Smart Methods Journey - Electronics and IoT Department

### What is this task?
This project uses **3 push buttons** to control **3 colored LEDs** (Red, Green, Blue) with an Arduino Uno. When you press a button, its matching LED lights up for exactly one second.

### How it works
1. Press Button 1 → Red LED turns on for 1 second
2. Press Button 2 → Green LED turns on for 1 second  
3. Press Button 3 → Blue LED turns on for 1 second
4. Each LED automatically turns off after 1 second
5. Each button only controls its own LED

### Components needed
- Arduino Uno
- 3 Push Buttons
- 3 LEDs (Red, Green, Blue)
- 3 × 220Ω Resistors
- Breadboard
- Jumper wires

### Files in this project
- `task1.ino` - Arduino code for button and LED control
- `task1_design.png` - Circuit wiring diagram

### How to build it
1. **Build the Circuit:**
   - Follow the wiring in `task1_design.png`
   - Connect buttons and LEDs to Arduino pins
   - Use resistors to protect the LEDs

2. **Upload Code:**
   - Open `task1.ino` in Arduino IDE
   - Select Arduino Uno board
   - Upload code to your Arduino

3. **Test:**
   - Press any button
   - Watch the matching LED light up for 1 second
   - Try all three buttons

### Example result
```
Press Button 1 → Red LED ON for 1 second → OFF
Press Button 2 → Green LED ON for 1 second → OFF
Press Button 3 → Blue LED ON for 1 second → OFF
```

### What I learned
- Digital input/output with Arduino
- Button reading and LED control
- Timing control in programming
- Basic electronics and circuit building
- Arduino IDE programming

---
*Part of Smart Methods Journey - Learning Electronics and IoT*
