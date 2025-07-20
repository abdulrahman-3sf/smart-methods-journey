<?php
// Connect to database
$servername = "localhost";
$username = "root";  // default for xampp
$password = "";
$dbname = "robot_arm_position";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Save Pose form submit
if (isset($_POST['save_pose'])) {
    $s1 = intval($_POST['servo1']);
    $s2 = intval($_POST['servo2']);
    $s3 = intval($_POST['servo3']);
    $s4 = intval($_POST['servo4']);
    $s5 = intval($_POST['servo5']);
    $s6 = intval($_POST['servo6']);

    $stmt = $conn->prepare("INSERT INTO pose (servo1, servo2, servo3, servo4, servo5, servo6) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiii", $s1, $s2, $s3, $s4, $s5, $s6);
    $stmt->execute();
    $stmt->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle Run form submit (insert once, then update)
if (isset($_POST['run'])) {
    $s1 = intval($_POST['servo1']);
    $s2 = intval($_POST['servo2']);
    $s3 = intval($_POST['servo3']);
    $s4 = intval($_POST['servo4']);
    $s5 = intval($_POST['servo5']);
    $s6 = intval($_POST['servo6']);
    $status = 1;

    $result = $conn->query("SELECT ID FROM run LIMIT 1");
    if ($result && $result->num_rows > 0) {
        // Update existing
        $conn->query("UPDATE run SET servo1=$s1, servo2=$s2, servo3=$s3, servo4=$s4, servo5=$s5, servo6=$s6, status=$status LIMIT 1");
    } else {
        // Insert new
        $stmt = $conn->prepare("INSERT INTO run (servo1, servo2, servo3, servo4, servo5, servo6, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiiiii", $s1, $s2, $s3, $s4, $s5, $s6, $status);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle Reset (redirect to clear form)
if (isset($_POST['reset'])) {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle Load pose request
$load_pose = null;
if (isset($_GET['load_pose'])) {
    $pose_id = intval($_GET['load_pose']);
    $result = $conn->query("SELECT * FROM pose WHERE ID = $pose_id LIMIT 1");
    if ($result && $result->num_rows > 0) {
        $load_pose = $result->fetch_assoc();
    }
}

// Handle Remove pose request
if (isset($_GET['remove_pose'])) {
    $pose_id = intval($_GET['remove_pose']);
    $conn->query("DELETE FROM pose WHERE ID = $pose_id");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch all saved poses
$poses = $conn->query("SELECT * FROM pose ORDER BY ID ASC");

// If no pose loaded, set default values
if (!$load_pose) {
    $load_pose = ['servo1' => 90, 'servo2' => 90, 'servo3' => 90, 'servo4' => 90, 'servo5' => 90, 'servo6' => 90];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Robot Arm Control Panel</title>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    .slider-label { width: 70px; display: inline-block; }
    input[type=range] { width: 300px; }
    table { border-collapse: collapse; margin-top: 20px; width: 100%; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
    th { background-color: #f4f4f4; }
    button { padding: 5px 10px; margin: 3px; }
</style>
<script>
function updateValue(slider, displayId) {
    document.getElementById(displayId).innerText = slider.value;
}
</script>
</head>
<body>

<h2>Robot Arm Control Panel</h2>

<form method="post" action="">
  <?php for ($i = 1; $i <= 6; $i++): ?>
    <div>
      <label class="slider-label">Motor <?php echo $i; ?>:</label>
      <input type="range" name="servo<?php echo $i; ?>" min="0" max="180" value="<?php echo $load_pose["servo$i"]; ?>" oninput="updateValue(this, 'val<?php echo $i; ?>')"/>
      <span id="val<?php echo $i; ?>"><?php echo $load_pose["servo$i"]; ?></span>
    </div>
  <?php endfor; ?>

  <br />
  <button type="submit" name="save_pose">Save Pose</button>
  <button type="submit" name="reset">Reset</button>
  <button type="submit" name="run">Run</button>
</form>

<!-- Saved Poses Table -->
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Motor 1</th>
      <th>Motor 2</th>
      <th>Motor 3</th>
      <th>Motor 4</th>
      <th>Motor 5</th>
      <th>Motor 6</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($poses && $poses->num_rows > 0): ?>
      <?php while ($row = $poses->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['ID']; ?></td>
          <td><?php echo $row['servo1']; ?></td>
          <td><?php echo $row['servo2']; ?></td>
          <td><?php echo $row['servo3']; ?></td>
          <td><?php echo $row['servo4']; ?></td>
          <td><?php echo $row['servo5']; ?></td>
          <td><?php echo $row['servo6']; ?></td>
          <td>
            <a href="?load_pose=<?php echo $row['ID']; ?>"><button type="button">Load</button></a>
            <a href="?remove_pose=<?php echo $row['ID']; ?>" onclick="return confirm('Are you sure you want to delete this pose?');">
              <button type="button">Remove</button>
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="8">No saved poses found</td></tr>
    <?php endif; ?>
  </tbody>
</table>

</body>
</html>

<?php
$conn->close();
?>
