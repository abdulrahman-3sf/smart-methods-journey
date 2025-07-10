<?php
// Database connection
$host = 'localhost';
$dbname = 'task2';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle form submission
if (isset($_POST['action']) && $_POST['action'] == 'add' && !empty($_POST['name']) && !empty($_POST['age'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    
    $stmt = $pdo->prepare("INSERT INTO users (name, age, status) VALUES (?, ?, 0)");
    $stmt->execute([$name, $age]);
    
    // Redirect to prevent form resubmission
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Handle status toggle
if (isset($_POST['action']) && $_POST['action'] == 'toggle' && !empty($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    
    $stmt = $pdo->prepare("UPDATE users SET status = CASE WHEN status = 0 THEN 1 ELSE 0 END WHERE id = ?");
    $stmt->execute([$user_id]);
    
    // Redirect to prevent form resubmission
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Get all users
$stmt = $pdo->query("SELECT * FROM users ORDER BY id");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-container { background: #f4f4f4; padding: 20px; margin-bottom: 20px; }
        .form-row { display: flex; gap: 10px; align-items: center; }
        input[type="text"], input[type="number"] { padding: 8px; border: 1px solid #ddd; }
        button { padding: 8px 16px; background: #007cba; color: white; border: none; cursor: pointer; }
        button:hover { background: #005a87; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #007cba; color: white; }
        .toggle-btn { background: #28a745; }
        .toggle-btn:hover { background: #218838; }
        .status-0 { color: red; }
        .status-1 { color: green; }
        .no-users { text-align: center; padding: 20px; color: #666; }
    </style>
</head>
<body>
    <h1>User Management System</h1>
    
    <!-- Add User Form -->
    <div class="form-container">
        <form method="POST">
            <div class="form-row">
                <label>Name:</label>
                <input type="text" name="name" required>
                
                <label>Age:</label>
                <input type="number" name="age" min="1" required>
                
                <input type="hidden" name="action" value="add">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <!-- Users Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($users)): ?>
            <tr>
                <td colspan="5" class="no-users">No users found. Add some users to get started!</td>
            </tr>
            <?php else: ?>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['ID'] ?></td>
                <td><?= htmlspecialchars($user['Name']) ?></td>
                <td><?= $user['Age'] ?></td>
                <td class="Status-<?= $user['Status'] ?>">
                    <?= $user['Status'] == 1 ? 'Active' : 'Inactive' ?>
                </td>
                <td>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="user_id" value="<?= $user['ID'] ?>">
                        <input type="hidden" name="action" value="toggle">
                        <button type="submit" class="toggle-btn">Toggle</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>