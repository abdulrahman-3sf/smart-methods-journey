# Task 3.1: Auto Power Control Using Pushbutton
## Smart Methods Journey - Electronics and IoT Department

### What is this task?
This project simulates a smart auto power control system using a **pushbutton** and an **Arduino Uno**. It automatically turns an LED ON when a button is pressed and turns it OFF after a short period of inactivity.

### How it works
1. User presses a button to simulate "usage"
2. Each press resets an internal timer
3. The LED turns ON with a button press
4. If no button press is detected for more than 5 seconds, the LED turns OFF
5. The system resets again on the next button press

### Components needed
- Arduino Uno
- Pushbutton
- 10kΩ Resistor (for pull-down)
- LED
- 220Ω Resistor
- Breadboard
- Jumper wires

### Files in this project
- `task 3-1.ino` - Arduino code for button-controlled power switch
- `Task 3.1 design.png` - Circuit wiring diagram

### How to build it
1. **Build the Circuit:**
   - Connect the pushbutton:  
     - One leg to **5V**  
     - One leg to **Digital Pin 2**  
     - Pull-down resistor (10kΩ) between Pin 2 and GND
   - Connect the LED:  
     - Anode (+) to **pin 8** via 220Ω resistor  
     - Cathode (–) to **GND**

2. **Upload Code:**
   - Open `task 3-1.ino` in Arduino IDE
   - Select Arduino Uno board
   - Upload the code to your Arduino

3. **Test:**
   - Press the button → LED turns ON
   - Wait 5 seconds → LED turns OFF automatically
   - Press again to restart

### Example result
```
Button Pressed → LED ON
No press for 5 seconds → LED OFF
```

### Code explanation
- Uses a pushbutton to simulate device usage
- Resets `millis()` timer on each press
- LED represents device power state
- Implements inactivity timeout using `millis()`

### What I learned
- Debouncing and reading digital input from a button
- Using `millis()` for time-based logic
- Simulating auto power-off behavior
- Writing clean and efficient state-based Arduino code
