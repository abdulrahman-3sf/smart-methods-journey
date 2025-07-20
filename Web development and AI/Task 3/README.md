# Task 3: Robot Arm Control System  
## Smart Methods Journey - Robotics, AI, and Web Development Department

### What is this task?  
This project builds a **robot arm control system** using PHP and MySQL. It allows users to control 6 servo motors by saving specific positions (poses), running them, and resetting the system. The system interacts with a database to save and update servo values in real time.

### How it works  
1. Open the control page in a browser (requires XAMPP)
2. Move sliders to set servo motor positions
3. Click **Save Pose** to store the values in the database
4. Click **Load** to load a saved pose from the database
5. Click **Run** to save values to the `run` table (inserts once, then updates)
6. Click **Reset** to clear the sliders
7. Click **Remove** to delete the selected pose from the database
8. Use background scripts like `get_run_pose.php` and `update_status.php` to fetch or update robot arm state

### What’s included in the system  
- 🎛️ Sliders to set servo1–servo6 positions  
- 💾 Save Pose functionality (saved in `pose` table)  
- 📥 Load pose and apply to sliders  
- ▶️ Run to insert or update the `run` table  
- 🔄 Reset button to clear sliders  
- ❌ Remove button to delete saved poses  
- 🔌 PHP + MySQL integration for full backend logic  
- 📦 REST-like support files to fetch or update values

### Files in this project  
- `robot_arm_control.php` - Main UI and backend for saving/loading/running poses  
- `get_run_pose.php` - Returns current run pose in the format: `1,s190,s2189,...`  
- `update_status.php` - Updates `status` field to `0` in `run` table  

**Database:**  
- Database name: `robot_arm_position`  
- Table 1: `pose (ID, servo1, servo2, servo3, servo4, servo5, servo6)`  
- Table 2: `run (ID, servo1, servo2, servo3, servo4, servo5, servo6, status)`  

### How to use it  
1. **Setup:**  
   - Install XAMPP  
   - Start Apache and MySQL services  
   - Create a database named `robot_arm_position`  
   - Create tables `pos` and `run` as described  
   - Place all `.php` files inside the `htdocs` folder  

2. **Using the System:**  
   - Move servo sliders  
   - Save the pose to database  
   - Load saved poses  
   - Run the pose → updates `run` table  
   - Use `get_run_pose.php` for live control  
   - Use `update_status.php` to reset status  

### Example result  
A working robotic arm control system that:  
- Controls 6 servo motors via sliders  
- Saves, loads, and deletes servo positions  
- Updates the `run` table only once, avoiding duplicates  
- Exposes support scripts for real-time robot control  
- Stores all servo values in MySQL for persistence  

---  
*Part of Smart Methods Journey - Learning Robotics and Web Programming*
