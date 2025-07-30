// DOM Elements
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');
const forgotForm = document.getElementById('forgot-form');

const loginTab = document.getElementById('login-tab');
const signupTab = document.getElementById('signup-tab');
const forgotTab = document.getElementById('forgot-tab');

const toggleLogin = document.getElementById('toggle-login');
const togglesignup = document.getElementById('toggle-sighup');
const toggleForgot = document.getElementById('toggle-forgot');
const toggleForgotLogin = document.getElementById('toggle-forgot-login');

const emailStep = document.getElementById('forgot-email-step');
const otpStep = document.getElementById('otp-step');
const resetStep = document.getElementById('reset-password-step');

// Messages
const loginMessage = document.getElementById('login-message');
const signupMessage = document.getElementById('signup-message');
const forgotMessage = document.getElementById('forgot-message');

// Initialize localStorage users if not exists
if (!localStorage.getItem('users')) {
    localStorage.setItem('users', JSON.stringify([]));
    // Add test user
    const users = [];
    localStorage.setItem('users', JSON.stringify(users));
}
loginTab.classList.add('active');
// Form Toggle Functions
function showForm(formToShow) {
    loginForm.classList.add('hidden');
    signupForm.classList.add('hidden');
    forgotForm.classList.add('hidden');

    loginTab.classList.remove('active');
    signupTab.classList.remove('active');
    forgotTab.classList.remove('active');

    formToShow.classList.remove('hidden');

    if (formToShow === loginForm) {
        loginTab.classList.add('active');
    } else if (formToShow === signupForm) {
        signupTab.classList.add('active');
    } else if (formToShow === forgotForm) {
        forgotTab.classList.add('active');
    }

    // Reset messages
    loginMessage.classList.add('hidden');
    signupMessage.classList.add('hidden');
    forgotMessage.classList.add('hidden');
}

// Event Listeners for Form Toggle

loginTab.addEventListener('click', () => showForm(loginForm));
signupTab.addEventListener('click', () => showForm(signupForm));
forgotTab.addEventListener('click', () => showForm(forgotForm));

togglesignup.addEventListener('click', () => showForm(signupForm));
toggleLogin.addEventListener('click', () => showForm(loginForm));
toggleForgot.addEventListener('click', () => showForm(forgotForm));
toggleForgotLogin.addEventListener('click', () => showForm(loginForm));

// Login Functionality
document.getElementById('login-btn').addEventListener('click', function () {
    const email = document.getElementById('login-email').value.trim();
    const password = document.getElementById('login-password').value.trim();

    if (!email || !password) {
        showMessage(loginMessage, 'Please fill in all fields', 'danger');
        return;
    }

    const users = JSON.parse(localStorage.getItem('users'));
    const user = users.find(u => u.email === email);

    if (!user) {
        showMessage(loginMessage, 'User not found', 'danger');
        return;
    }

    if (user.password !== password) {
        showMessage(loginMessage, 'Incorrect password', 'danger');
        return;
    }

    // Login successful
    setTimeout(() => window.location.href = "index.php", 1000);

});

// Sign Up Functionality
document.getElementById('signup-btn').addEventListener('click', function () {
    const name = document.getElementById('signup-name').value.trim();
    const email = document.getElementById('signup-email').value.trim();
    const password = document.getElementById('signup-password').value.trim();
    const confirmPassword = document.getElementById('signup-confirm').value.trim();

    if (!name || !email || !password || !confirmPassword) {
        showMessage(signupMessage, 'Please fill in all fields', 'danger');
        return;
    }

    if (password !== confirmPassword) {
        showMessage(signupMessage, 'Passwords do not match', 'danger');
        return;
    }

    if (password.length < 6) {
        showMessage(signupMessage, 'Password must be at least 6 characters', 'danger');
        return;
    }

    const users = JSON.parse(localStorage.getItem('users'));
    const userExists = users.some(u => u.email === email);

    if (userExists) {
        showMessage(signupMessage, 'Email already registered', 'danger');
        return;
    }

    // Add new user
    users.push({
        name,
        email,
        password
    });

    localStorage.setItem('users', JSON.stringify(users));
    showMessage(signupMessage, 'Account created successfully! Please login', 'success');

    // Clear form
    document.getElementById('signup-name').value = '';
    document.getElementById('signup-email').value = '';
    document.getElementById('signup-password').value = '';
    document.getElementById('signup-confirm').value = '';

    document.getElementById('login-email').value = '';
    document.getElementById('login-password').value = '';

    // Show login form after a delay
    setTimeout(() => showForm(loginForm), 1000);
});

// Forgot Password Functionality
let otp = '';
let otpEmail = '';

document.getElementById('send-otp-btn').addEventListener('click', function () {
    otpEmail = document.getElementById('forgot-email').value.trim();

    if (!otpEmail) {
        showMessage(forgotMessage, 'Please enter your email', 'danger');
        return;
    }

    const users = JSON.parse(localStorage.getItem('users'));
    const userExists = users.some(u => u.email === otpEmail);

    if (!userExists) {
        showMessage(forgotMessage, 'Email not found in our system', 'danger');
        return;
    }

    // Generate 6-digit OTP
    otp = Math.floor(100000 + Math.random() * 900000).toString();

    // In a real app, you would send the OTP to the user's email
    console.log(`OTP for ${otpEmail}: ${otp}`);

    // Hide email step and show OTP step
    emailStep.classList.add('hidden');
    otpStep.classList.remove('hidden');

    // Focus first OTP input
    document.getElementById('otp-1').focus();
});

// OTP Input Auto Tab
const otpInputs = ['otp-1', 'otp-2', 'otp-3', 'otp-4', 'otp-5', 'otp-6'];

otpInputs.forEach((id, index) => {
    const input = document.getElementById(id);

    input.addEventListener('input', function () {
        if (this.value.length === 1) {
            if (index < otpInputs.length - 1) {
                document.getElementById(otpInputs[index + 1]).focus();
            }
        }
    });

    input.addEventListener('keydown', function (e) {
        if (e.key === 'Backspace' && this.value.length === 0) {
            if (index > 0) {
                document.getElementById(otpInputs[index - 1]).focus();
            }
        }
    });
});

// Verify OTP
document.getElementById('verify-otp-btn').addEventListener('click', function () {
    let enteredOtp = '';
    otpInputs.forEach(id => {
        enteredOtp += document.getElementById(id).value;
    });

    if (enteredOtp.length !== 6) {
        showMessage(forgotMessage, 'Please enter complete OTP', 'danger');
        return;
    }

    if (enteredOtp !== otp) {
        showMessage(forgotMessage, 'Invalid OTP', 'danger');
        return;
    }

    // OTP verified, show reset password step
    otpStep.classList.add('hidden');
    resetStep.classList.remove('hidden');
});

// Resend OTP
document.getElementById('resend-otp').addEventListener('click', function () {
    // Generate new OTP
    otp = Math.floor(100000 + Math.random() * 900000).toString();

    console.log(`NEW OTP for ${otpEmail}: ${otp}`);

    // Clear previous OTP inputs
    otpInputs.forEach(id => {
        document.getElementById(id).value = '';
    });

    // Focus first OTP input
    document.getElementById('otp-1').focus();

    // Show alert
    showMessage(forgotMessage, 'New OTP has been sent', 'info');
});

// Reset Password
document.getElementById('reset-btn').addEventListener('click', function () {
    const newPassword = document.getElementById('reset-password').value.trim();
    const confirmPassword = document.getElementById('reset-confirm').value.trim();

    if (!newPassword || !confirmPassword) {
        showMessage(forgotMessage, 'Please fill in both fields', 'danger');
        return;
    }

    if (newPassword !== confirmPassword) {
        showMessage(forgotMessage, 'Passwords do not match', 'danger');
        return;
    }

    if (newPassword.length < 6) {
        showMessage(forgotMessage, 'Password must be at least 6 characters', 'danger');
        return;
    }

    // Update password in users array
    const users = JSON.parse(localStorage.getItem('users'));
    const userIndex = users.findIndex(u => u.email === otpEmail);

    if (userIndex !== -1) {
        users[userIndex].password = newPassword;
        localStorage.setItem('users', JSON.stringify(users));

        // Show success message
        showMessage(forgotMessage, 'Password reset successfully! Please login', 'success');

        // Reset all steps
        emailStep.classList.remove('hidden');
        otpStep.classList.add('hidden');
        resetStep.classList.add('hidden');

        // Clear form
        document.getElementById('forgot-email').value = '';
        document.getElementById('reset-password').value = '';
        document.getElementById('reset-confirm').value = '';

        document.getElementById('login-email').value = '';
        document.getElementById('login-password').value = '';

        // Show login form after a delay
        setTimeout(() => showForm(loginForm), 2000);
    } else {
        showMessage(forgotMessage, 'Error updating password', 'danger');
    }
});

// Helper Functions
function showMessage(element, message, type) {
    element.textContent = message;
    element.classList.remove('hidden');
    element.classList.remove('alert-success', 'alert-danger', 'alert-info');
    element.classList.add(`alert-${type}`);
}

function showLoggedInState(user) {
    // Hide all auth forms
    signupForm.classList.add('hidden');
    forgotForm.classList.add('hidden');

    // Remove active state from all tabs
    signupTab.classList.remove('active');
    forgotTab.classList.remove('active');

}

function showLoggedOutState() {
    // Show login form
    loginForm.classList.remove('hidden');
    loginTab.classList.add('active');

    // Hide other forms
    signupForm.classList.add('hidden');
    forgotForm.classList.add('hidden');

    // Clear login form
    document.getElementById('login-email').value = '';
    document.getElementById('login-password').value = '';
}

// Check if user is already logged in
const currentUser = JSON.parse(localStorage.getItem('currentUser'));
if (currentUser) {
    showLoggedInState(currentUser);
}