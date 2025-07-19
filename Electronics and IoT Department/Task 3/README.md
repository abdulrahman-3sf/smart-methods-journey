# Task 3: Smart Auto Control Using Pushbutton and Sensor Inputs
## Smart Methods Journey - Electronics and IoT Department

### What is this task?
This project combines two tasks to demonstrate automatic power control using Arduino. Task 3.1 uses a pushbutton to control an LED with an inactivity timeout. Task 3.2 combines a PIR motion sensor and a potentiometer to control an LED based on both digital and analog input.

---

## 🔹 Task 3.1: Auto Power Control Using Pushbutton

### How it works
1. User presses button to simulate activity
2. LED turns ON
3. If no press for 5 seconds → LED turns OFF

### Components
- Arduino Uno  
- Pushbutton  
- 10kΩ resistor  
- LED  
- 220Ω resistor  
- Jumper wires

### Files
- `task 3-1.ino`  
- `Task 3.1 design.png`

---

## 🔹 Task 3.2: Digital and Analog Sensor Integration

### How it works
1. PIR sensor detects motion → LED ON
2. No motion + Pot > 600 → LED blinks
3. No motion + Pot < 600 → LED OFF

### Components
- Arduino Uno  
- PIR Sensor  
- Potentiometer  
- LED  
- 220Ω resistor  
- Jumper wires

### Files
- `task 3-2.ino`  
- `Task 3.2 design.png`

---

## How to build both circuits
1. Build the circuit for each task separately
2. Connect components as shown in the circuit diagrams
3. Upload the respective `.ino` files to your Arduino Uno

---

## Example results
```
Task 3.1:
Button Pressed → LED ON
No press for 5 seconds → LED OFF

Task 3.2:
Motion detected → LED ON
No motion + Pot > 600 → LED blinking
No motion + Pot < 600 → LED OFF
```

---

## What I learned
- Button-based digital input handling
- Auto power-off using `millis()`
- Working with PIR motion sensors
- Reading analog values from potentiometer
- Designing conditional logic with multiple sensors

---
*Part of Smart Methods Journey - Learning Electronics and IoT*
