<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings Panel</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        /* Draggable & Resizable Panel */
        .settings-panel {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -20%);
            width: 300px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            padding: 15px;
        }

        .settings-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: move;
            background: #007bff;
            color: white;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }

        .settings-body {
            padding: 10px;
        }

        .settings-footer {
            text-align: right;
            padding: 10px;
        }

        /* Drag & Drop */
        .dragging {
            opacity: 0.7;
        }
    </style>
</head>

<body>

    <!-- Admin Settings Button -->
    <button id="openSettings" class="btn btn-primary m-3">
        <i class="fas fa-cog"></i> Open Settings
    </button>

    <!-- Settings Panel -->
    <div id="settingsPanel" class="settings-panel">
        <div class="settings-header" id="settingsHeader">
            <span>Admin Settings</span>
            <button id="closeSettings" class="btn btn-sm btn-light">&times;</button>
        </div>
        <div class="settings-body">
            <label>Background Color:</label>
            <input type="color" id="bgColorPicker" class="form-control">
        </div>
        <div class="settings-footer">
            <button id="saveSettings" class="btn btn-success">Save</button>
        </div>
    </div>

    <!-- JavaScript for Functionality -->
    <script>
        const settingsPanel = document.getElementById("settingsPanel");
        const openSettings = document.getElementById("openSettings");
        const closeSettings = document.getElementById("closeSettings");
        const bgColorPicker = document.getElementById("bgColorPicker");

        // Open settings panel
        openSettings.addEventListener("click", () => {
            settingsPanel.style.display = "block";
        });

        // Close settings panel
        closeSettings.addEventListener("click", () => {
            settingsPanel.style.display = "none";
        });

        // Save background color setting
        document.getElementById("saveSettings").addEventListener("click", () => {
            document.body.style.backgroundColor = bgColorPicker.value;
            settingsPanel.style.display = "none"; // Close panel after saving
        });

        // Make panel draggable
        let isDragging = false,
            xOffset = 0,
            yOffset = 0;
        const settingsHeader = document.getElementById("settingsHeader");

        settingsHeader.addEventListener("mousedown", (e) => {
            isDragging = true;
            xOffset = e.clientX - settingsPanel.offsetLeft;
            yOffset = e.clientY - settingsPanel.offsetTop;
            settingsPanel.classList.add("dragging");
        });

        document.addEventListener("mousemove", (e) => {
            if (!isDragging) return;
            settingsPanel.style.left = `${e.clientX - xOffset}px`;
            settingsPanel.style.top = `${e.clientY - yOffset}px`;
        });

        document.addEventListener("mouseup", () => {
            isDragging = false;
            settingsPanel.classList.remove("dragging");
        });
    </script>

</body>

</html>