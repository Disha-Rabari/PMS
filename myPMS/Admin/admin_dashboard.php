<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="admin_dashboard.css">
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <style>
        /* SearchBar */
        .searchBar {
            justify-content: center;
            width: auto;
            display: flex;
            padding: 10px;
            align-items: center;
        }

        .searchBar button {
            border-radius: 0px 20px 20px 0px;
        }

        /* Remove the default blue outline on focus */
        .search-input:focus,
        .search-btn:focus {
            outline: none !important;
            box-shadow: none !important;
            background-color: none;
        }

        a {
            cursor: pointer;
        }

        /* settingPanel */
        .settingClass {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 60%;
            width: 50%;
        }

        form i {
            margin-left: -30px;
            cursor: pointer;
        }

        form input {
            width: 70%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 2;
            color: white;
            outline: none;
            border: none;
            border-bottom: 1px solid grey;
            padding-right: 30px;
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="btn btn-dark d-lg-none" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <div>
            <img src="backImage.png" alt="avatar" height="60px" width="60px" class="rounded-circle">
            <a class="navbar-brand ml-3" href="#">Admin Panel</a>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-bell"></i> Notifications</a></li>
                <li class="nav-item"><a class="nav-link" onclick="mySettings()"><i class="fas fa-cog"></i> Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="wrapper d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="bg-dark">
            <ul class="list-unstyled components">
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> admin_Dashboard</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Team</a></li>
                <li><a href="#"><i class="fas fa-user-tie"></i> Project Manager</a></li>
                <li><a href="#"><i class="fas fa-user"></i> Client</a></li>
                <li><a href="#"><i class="fas fa-code"></i> Developer</a></li>
                <li><a href="#"><i class="fas fa-bug"></i> Tester</a></li>
                <li><a href="#"><i class="fas fa-comment-dots"></i> Messages</a></li>
            </ul>
        </nav>

        <!-- Content Area -->
        <div id="content">

            <!-- Search -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-6"></div>
                <div class="col-12 col-md-6 col-lg-6 mb-6">
                    <form class="searchBar d-flex align-items-center alert alert-dark rounded-pill px-3" action="#">
                        <input type="text" placeholder="Search..." name="search" class="form-control bg-transparent text-white border-0 search-input">
                        <button type="submit" class="btn alert-dark border-0 search-btn">
                            <i class="fa fa-search text-dark"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Total flex box... -->
            <div class="row p-2">
                <div class="col-6 col-md-6 col-lg-3 mb-3">
                    <div class="btn-primary rounded text-center p-4">
                        <h2>Total</h2>
                        <p>Total Clients</p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-3 mb-3">
                    <div class="btn-info rounded text-center p-4">
                        <h2>Total</h2>
                        <p>Total Projects</p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-3 mb-3">
                    <div class="btn-warning rounded text-center text-light p-4">
                        <h2>Total</h2>
                        <p>Pending Projects</p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-3 mb-3">
                    <div class="btn-danger rounded text-center p-4">
                        <h2>Total</h2>
                        <p>Total Team Members</p>
                    </div>
                </div>
            </div>

            <!-- settins -->
            <div id="settingsPanel" class="settingClass bg-dark rounded p-4">
                <h2 class="text-left text-light bg-dark" id="settingsHeader">Admin Profile
                    <button type="button" class="close text-light" aria-label="Close" onclick="mySettings()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h2>
                <br>
                <form action="#" method="post">
                    <!-- Email -->
                    <input type="email" placeholder="Enter Email" name="email" class="bg-dark" value="<?php if (isset($_SESSION['email'])) {
                                                                                                            echo $_SESSION['email'];
                                                                                                        } ?>">
                    <i class="fas fa-user input-icon text-light"></i>
                    <br><br>

                    <!-- Password -->
                    <input type="password" name="password" id="password" placeholder="Enter Password" class="bg-dark" value="<?php if (isset($_SESSION['password'])) {
                                                                                                                                    echo $_SESSION['password'];
                                                                                                                                } ?>">
                    <i class="fas fa-eye-slash text-light" id="togglePassword"></i>
                    <a href="#" class="btn btn-warning">change password</a>
                    <br><br>

                    <!-- Submit Data -->
                    <!-- <input type="submit" value="LogIn" name="submit" class="btn btn-outline-dark btn-lg form-control"> -->

                    <!-- backgroung-color -->
                    <div class="settings-body">
                        <label>Background Color:</label>
                        <input type="color" id="bgColorPicker" class="form-control">
                    </div>
                    <div class="settings-footer">
                        <button id="saveSettings" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- Bootstrap 4 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="admin_dashboard.js"></script>

    <script>
        // For Password...
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            // Check current type
            const isPassword = password.getAttribute('type') === 'password';

            // Toggle type attribute
            password.setAttribute('type', isPassword ? 'text' : 'password');

            // Toggle eye icon based on type
            this.classList.toggle('fa-eye', isPassword);
            this.classList.toggle('fa-eye-slash', !isPassword);
        });
        document.addEventListener("DOMContentLoaded", function() {
            let panel = document.getElementById("settingPanel");
            if (panel) {
                panel.style.display = "none";
            }
        });

        // for settingPanel
        function mySettings() {
            let panel = document.getElementById("settingsPanel");
            const bgColorPicker = document.getElementById("bgColorPicker");

            if (panel) {
                if (panel.style.display === "none") {
                    document.body.appendChild(panel);
                    panel.style.display = "block";

                    // background color setting
                    document.getElementById("saveSettings").addEventListener("click", () => {
                        document.body.style.backgroundColor = bgColorPicker.value;
                        settingsPanel.style.display = "none"; // Close panel after saving
                    });

                } else {
                    panel.style.display = "none";
                }
            }
        }

        // Make pannel Dragable...
        // let isDragging = false,
        //     xOffset = 0,
        //     yOffset = 0;
        // const settingsHeader = document.getElementById("settingsHeader");

        // settingsHeader.addEventListener("mousedown", (e) => {
        //     isDragging = true;
        //     xOffset = e.clientX - settingsPanel.offsetLeft;
        //     yOffset = e.clientY - settingsPanel.offsetTop;
        //     settingsPanel.classList.add("dragging");
        // });

        // document.addEventListener("mousemove", (e) => {
        //     if (!isDragging) return;
        //     settingsPanel.style.left = `${e.clientX - xOffset}px`;
        //     settingsPanel.style.top = `${e.clientY - yOffset}px`;
        // });

        // document.addEventListener("mouseup", () => {
        //     isDragging = false;
        //     settingsPanel.classList.remove("dragging");
        // });
    </script>

</body>

</html>