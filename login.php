<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management System</title>
    <link rel="stylesheet" href="style/login.css">
</head>

<body>

<?php
    require("navbar.html");
  ?>

    <div class="container">
        <h1>Account Management</h1>

        <div class="form-toggle">
            <button class="active" id="login-tab">Login</button>
            <button id="signup-tab">Sign Up</button>
            <button id="forgot-tab">Forgot</button>
        </div>

        <!-- Login Form -->
        <div id="login-form">
            <div id="login-message" class="alert hidden"></div>

            <div class="form-group">
                <label for="login-email">Email</label>
                <input type="email" id="login-email" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" placeholder="Enter your password">
            </div>

            <button class="submit-btn" id="login-btn">Login</button>

            <p class="text-center mt-3">
                <span id="toggle-forgot" class="link">Forgot password?</span>
                <div class="text-center">
                    Don't have an account? <span id="toggle-sighup" class="link">Sign Up here</span>
                </div>
            </p>
        </div>

        <!-- Sign Up Form -->
        <div id="signup-form" class="hidden">
            <div id="signup-message" class="alert hidden"></div>

            <div class="form-group">
                <label for="signup-name">Full Name</label>
                <input type="text" id="signup-name" placeholder="Enter your full name">
            </div>

            <div class="form-group">
                <label for="signup-email">Email</label>
                <input type="email" id="signup-email" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="signup-password">Password</label>
                <input type="password" id="signup-password" placeholder="Create a password">
            </div>

            <div class="form-group">
                <label for="signup-confirm">Confirm Password</label>
                <input type="password" id="signup-confirm" placeholder="Confirm your password">
            </div>

            <button class="submit-btn"  id="signup-btn">Sign Up</button>

            <p class="text-center mt-3">
                Already have an account? <span id="toggle-login" class="link">Login here</span>
            </p>
        </div>

        <!-- Forgot Password Form -->
        <div id="forgot-form" class="hidden">
            <div id="forgot-message" class="alert hidden"></div>

            <!-- Step 1: Email Input -->
            <div id="forgot-email-step">
                <div class="form-group">
                    <label for="forgot-email">Email</label>
                    <input type="email" id="forgot-email" placeholder="Enter your email">
                </div>

                <button class="submit-btn"  id="send-otp-btn">Send OTP</button>

                <p class="text-center mt-3">
                    Remember your password? <span id="toggle-forgot-login" class="link">Login here</span>
                </p>
            </div>

            <!-- Step 2: OTP Input -->
            <div id="otp-step" class="hidden">
                <div class="alert alert-info">
                    An OTP has been sent via email to the Console.
                </div>

                <div class="form-group">
                    <label for="otp-code">Enter OTP</label>
                    <div class="otp-container">
                        <input type="text" id="otp-1" maxlength="1" pattern="\d">
                        <input type="text" id="otp-2" maxlength="1" pattern="\d">
                        <input type="text" id="otp-3" maxlength="1" pattern="\d">
                        <input type="text" id="otp-4" maxlength="1" pattern="\d">
                        <input type="text" id="otp-5" maxlength="1" pattern="\d">
                        <input type="text" id="otp-6" maxlength="1" pattern="\d">
                    </div>
                </div>

                <button id="verify-otp-btn">Verify OTP</button>

                <p class="text-center mt-3">
                    <span id="resend-otp" class="link">Resend OTP</span>
                </p>
            </div>

            <!-- Step 3: Reset Password -->
            <div id="reset-password-step" class="hidden">
                <div class="form-group">
                    <label for="reset-password">New Password</label>
                    <input type="password" id="reset-password" placeholder="Enter new password">
                </div>

                <div class="form-group">
                    <label for="reset-confirm">Confirm Password</label>
                    <input type="password" id="reset-confirm" placeholder="Confirm new password">
                </div>

                <button id="reset-btn">Reset Password</button>
            </div>
        </div>
</div>
<?php
    require("footer.html");
  ?>
        <script src="script/login.js"></script>
</body>
</html>