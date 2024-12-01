<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../public/css/webpage.css">
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <h2>Create User</h2>
    <form method="POST" action="../public/admin_dashboard.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="create">Create User</button>
    </form>

    <h2>All Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td>
                        <!-- Update Form -->
                        <form method="POST" action="../public/admin_dashboard.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
                            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                            <button type="submit" name="update">Update</button>
                        </form>

                        <!-- Delete Link -->
                        <a href="../public/admin_dashboard.php?delete=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No users found.</td></tr>
        <?php endif; ?>
    </table>
    <br><br>

    <a href="../views/add_location.php">Add New Location</a>
    <br><br>
    <p><a href="../views/home.php?action=Logout">Logout</a></p>
</body>
</html>
