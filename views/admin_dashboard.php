<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - FUTO Locate</title>
    <link rel="stylesheet" href="../public/css/special.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Admin Dashboard - Manage Users</h1>
    
    <div id="users-container">
        <!-- User list will be loaded here via JavaScript -->
    </div>

    <script>
    $(document).ready(function() {
        loadUsers();

        function loadUsers() {
            $.ajax({
                url: "../public/admin_dashboard.php",
                type: "GET",
                dataType: "json",
                success: function(users) {
                    let html = '<table>';
                    html += '<tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th><th>Status</th><th>Actions</th></tr>';
                    users.forEach(user => {
                        html += `<tr>
                            <td>${user.id}</td>
                            <td>${user.username}</td>
                            <td>${user.email}</td>
                            <td>${user.role}</td>
                            <td>${user.status}</td>
                            <td>
                                <button onclick="changeStatus(${user.id}, '${user.status === 'active' ? 'inactive' : 'active'}')">
                                    ${user.status === 'active' ? 'Deactivate' : 'Activate'}
                                </button>
                                <button onclick="changeRole(${user.id}, '${user.role === 'admin' ? 'user' : 'admin'}')">
                                    ${user.role === 'admin' ? 'Demote to User' : 'Promote to Admin'}
                                </button>
                            </td>
                        </tr>`;
                    });
                    html += '</table>';
                    $('#users-container').html(html);
                },
                error: function() {
                    $('#users-container').html('<p>Error loading users.</p>');
                }
            });
        }

        window.changeStatus = function(userId, newStatus) {
            $.post("../public/admin_dashboard.php", { action: "change_status", user_id: userId, status: newStatus }, function(response) {
                alert(response.message);
                loadUsers();
            }, "json");
        };

        window.changeRole = function(userId, newRole) {
            $.post("../public/admin_dashboard.php", { action: "change_role", user_id: userId, role: newRole }, function(response) {
                alert(response.message);
                loadUsers();
            }, "json");
        };
    });
    </script>

<a href="../views/add_location.php">Add New Location</a>

<p><a href="../views/home.php?action=Logout">Logout</a></p>
</body>
</html>
