# 🔌 Arduino Task 1 - Button-Controlled RGB LEDs

## 📁 Repository
**Path:** `Electronics and IoT Department/Task 1`  
**Files:**
- `task1.ino` — Arduino code that controls the LEDs.
- `task1_design.png` — Circuit schematic for the project.

## 📝 Task Description
This is the **first task** in the Smart Methods internship under the Electronics and IoT Department.

In this project, we connect **three push buttons** to an Arduino Uno to control **three LEDs** (Red, Green, and Blue):

- Pressing **Button 1** turns on the **Red LED** for one second.
- Pressing **Button 2** turns on the **Green LED** for one second.
- Pressing **Button 3** turns on the **Blue LED** for one second.

Each LED turns off automatically after one second, and each button only controls its own LED.

## 🔧 Components Used
- Arduino Uno  
- 3 x Push Buttons  
- 3 x LEDs (Red, Green, Blue)  
- 3 x 220Ω Resistors (for LEDs)  
- Breadboard + Jumper wires  

## 🖼 Circuit Design
Refer to `task1_design.png` for the full wiring layout.

## 🚀 How to Run
1. Build the circuit using the schematic image.
2. Upload `task1.ino` to your Arduino using the Arduino IDE.
3. Press any button to light up the corresponding LED.

---

✅ This task demonstrates basic **digital input/output** and **timing control** in Arduino.
