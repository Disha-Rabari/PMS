<?php
session_start();
if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        if ($role == "admin" && $email == "admin@gmail.com" && $password == "admin") {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            echo "<script>alert('hello admin');window.location='admin_dashboard.php';</script>";
        }
        else if ($role == "developer"){
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            echo "<script>alert('Hey!Developer');window.location='developer_dashboard.php';</script>";
        }
    } else {
        echo "<script>
        alert('enter all the data');
        </script>";
    }

    // echo "<script>alert('ok')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            /* background-image */
            /* background-image: url("./images/background.png"); */
            background-image: url("./images/backImage.png");

            /* cover image on screen */
            background-position: center;
            /* background-repeat: no-repeat; */
            background-size: cover;
        }

        .container-fluid {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: fadeIn 3s forwards;
        }

        .login-model {
            background-color: white;
            padding-bottom: 5px;
            border: 1px solid rgb(143, 108, 11);
        }

        .login-model-header {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(143, 108, 11);
        }

        /* For icon in form */
        form i {
            margin-left: -30px;
            cursor: pointer;
        }

        form input,
        select {
            width: 97%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 2;
            color: #555;
            outline: none;
            border: none;
            border-bottom: 1px solid rgb(143, 108, 11);
            padding-right: 30px;
        }

        form input:focus {
            border-bottom: 1px solid red;
        }

        /* Motion */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 3;
            }
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-4 mb-4"></div>

            <!-- Login Content -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="login-model text-center">
                    <div class="login-model-header p-4 text-light">
                        <h1>LogIn&nbsp;</h1>
                        <h3><i class="fas fa-sign-out-alt"></i></h3>
                    </div>

                    <!-- Login Form -->
                    <div class="login-model-body">
                        <form action="#" method="post" class="p-4 text-center">

                            <!-- Select Role -->
                            <select name="role" id="role" class="form-control">
                                <option value="#">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="client">Client</option>
                                <option value="pm">Project_Manager</option>
                                <option value="developer">Developer</option>
                                <option value="tester">Tester</option>
                            </select>
                            <br>

                            <!-- Email -->
                            <input type="email" placeholder="Enter Email" name="email">
                            <i class="fas fa-user input-icon"></i>
                            <br><br>

                            <!-- Password -->
                            <input type="password" name="password" id="password" placeholder="Enter Password">
                            <i class="fas fa-eye-slash " id="togglePassword"></i>
                            <br><br>

                            <!-- Submit Data -->
                            <input type="submit" value="LogIn" name="submit" class="btn btn-outline-dark btn-lg form-control">
                        </form>
                    </div>

                    <div class="login-model-footer">
                        <p>Not a member?<a href="#">Registration</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    </script>
</body>

</html>