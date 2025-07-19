# Task 3.2: Digital and Analog Sensor Integration
## Smart Methods Journey - Electronics and IoT Department

### What is this task?
This task demonstrates using both a digital sensor (PIR motion sensor) and an analog sensor (potentiometer) together to control an LED. Each sensor controls the LED under different conditions.

### How it works
1. PIR sensor detects motion → LED turns ON
2. If no motion, Arduino checks the potentiometer value
3. If the potentiometer value is above 600, the LED blinks
4. Otherwise, the LED remains OFF
5. The result is real-time control using combined sensors

### Components needed
- Arduino Uno
- PIR Motion Sensor
- Potentiometer
- LED
- 220Ω Resistor
- Breadboard
- Jumper wires

### Files in this project
- `task 3-2.ino` - Arduino code for digital and analog sensor control
- `Task 3.2 design.png` - Circuit wiring diagram

### How to build it
1. **Build the Circuit:**
   - Connect PIR Sensor:  
     - VCC to 5V  
     - GND to GND  
     - OUT to pin 2
   - Connect Potentiometer:  
     - One side to 5V  
     - Other side to GND  
     - Middle pin to A0
   - Connect LED:  
     - Anode (+) to pin 8 via 220Ω resistor  
     - Cathode (–) to GND

2. **Upload Code:**
   - Open `task 3-2.ino` in Arduino IDE
   - Select Arduino Uno board
   - Upload the code

3. **Test:**
   - Simulate motion → LED turns ON
   - Without motion, increase potentiometer → LED blinks
   - If no motion and low analog input → LED OFF

### Example result
```
Motion detected → LED ON
No motion + Pot > 600 → LED blinking
No motion + Pot < 600 → LED OFF
```

### Code explanation
- Uses digital input from PIR to detect motion
- Reads analog values from potentiometer
- Controls LED based on combined conditions
- Demonstrates priority logic and multiple input handling

### What I learned
- Using digital and analog sensors together
- Conditional logic handling in Arduino
- Building responsive systems with multiple inputs
- Real-world use cases of PIR and analog input blending
