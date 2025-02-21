<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Bell</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
.notification-container {
    position: fixed;
    top: 20px;  /* Adjust vertical position */
    right: 20px; /* Move to the right */
    display: inline-block;
}

.bell-icon {
    font-size: 24px;
    cursor: pointer;
    position: relative;
    color: grey;
}

.badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: red;
    color: white;
    border-radius: 50%;
    padding: 5px 8px;
    font-size: 12px;
}

.notification-dropdown {
    display: none;
    position: absolute;
    top: 30px;
    right: 0;
    background: white;
    width: 250px;
    border: 1px solid #ccc;
    box-shadow: 2px 2px 10px rgba(0,0,0,0.2);
    border-radius: 5px;
    padding: 10px;
    z-index: 1000;
}
</style>
</head>
<body>

<div class="notification-container">
    <!-- <span class="bell-icon" onclick="toggleNotifications()">🔔</span> -->
    <i class="fa fa-bell bell-icon" style="color:gold;" onclick="toggleNotifications()"></i>

    <!-- <span class="bell-icon" onclick="toggleNotifications()"></span> -->
    <span class="badge" id="notification-count" style="display:none;"></span>
    <div class="notification-dropdown" id="notification-list"></div>
</div>

<script>
function fetchNotifications() {
    $.ajax({
        url: 'fetch_notifications.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            let count = response.count;
            let notifications = response.notifications;
            let notificationList = $("#notification-list");

            if (count > 0) {
                $("#notification-count").text(count).show();
            } else {
                $("#notification-count").hide();
            }

            let html = "";
            notifications.forEach(n => {
                html += `<p>🔔 ${n.message}</p>`;
                // html += `<p> ${n.message}</p>`;
            });

            if (html === "") {
                html = "<p>No new notifications</p>";
            }

            notificationList.html(html);
        }
    });
}

// Toggle Notification Dropdown
function toggleNotifications() {
    let dropdown = $("#notification-list");
    dropdown.toggle();

    // If opened, mark notifications as read
    if (dropdown.is(":visible")) {
        $.ajax({
            url: 'mark_as_read.php',
            method: 'GET',
            success: function() {
                $("#notification-count").hide(); // Hide badge after reading
            }
        });
    }
}

// Fetch notifications every 5 seconds
setInterval(fetchNotifications, 5000);
fetchNotifications();
</script>

</body>
</html>
