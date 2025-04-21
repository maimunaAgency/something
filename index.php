<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MZ Income - Login & Signup</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            overflow: hidden;
        }

        .tabs {
            display: flex;
            background-color: #f8f9fa;
        }

        .tab {
            flex: 1;
            padding: 15px;
            text-align: center;
            font-weight: 500;
            color: #6c757d;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tab.active {
            background-color: white;
            color: #667eea;
            border-bottom: 2px solid #667eea;
        }

        .form-container {
            padding: 30px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #495057;
        }

        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #5a6edb, #6840a3);
            transform: translateY(-2px);
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .signup-form {
            display: none;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo h1 {
            color: #667eea;
            font-weight: 600;
            font-size: 24px;
        }

        .account-info {
            text-align: center;
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 5px;
            display: none;
        }

        .account-info h3 {
            margin-bottom: 10px;
            color: #495057;
        }

        .account-number {
            font-size: 24px;
            font-weight: 600;
            color: #667eea;
            letter-spacing: 2px;
        }

        @media (max-width: 480px) {
            .container {
                max-width: 100%;
            }
            
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tabs">
            <div class="tab active" id="login-tab">Login</div>
            <div class="tab" id="signup-tab">Sign Up</div>
        </div>
        
        <div class="form-container">
            <div class="logo">
                <h1>MZ Income</h1>
            </div>
            
            <div id="message-container"></div>
            
            <div id="account-info-container" class="account-info">
                <h3>Your Account Number</h3>
                <div class="account-number" id="account-number-display"></div>
                <p>Please save this number. You can use it to login to your account.</p>
            </div>
            
            <!-- Login Form -->
            <form id="login-form" class="login-form">
                <div class="input-group">
                    <label for="login-username">Username or Account Number</label>
                    <input type="text" id="login-username" name="username" required placeholder="Enter username or 6-digit account number">
                </div>
                
                <div class="input-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required placeholder="Enter your password">
                </div>
                
                <button type="submit" class="btn-submit">Login</button>
                
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
            </form>
            
            <!-- Signup Form -->
            <form id="signup-form" class="signup-form">
                <div class="input-group">
                    <label for="signup-username">Username</label>
                    <input type="text" id="signup-username" name="username" required placeholder="Choose a username">
                </div>
                
                <div class="input-group">
                    <label for="signup-password">Password</label>
                    <input type="password" id="signup-password" name="password" required placeholder="Create a password">
                </div>
                
                <div class="input-group">
                    <label for="signup-confirm-password">Confirm Password</label>
                    <input type="password" id="signup-confirm-password" name="confirm_password" required placeholder="Confirm your password">
                </div>
                
                <div class="input-group">
                    <label for="signup-mobile">Mobile Number</label>
                    <input type="tel" id="signup-mobile" name="mobile" required placeholder="Enter your mobile number">
                </div>
                
                <div class="input-group">
                    <label for="signup-referral">Referral Code (Optional)</label>
                    <input type="text" id="signup-referral" name="referral" placeholder="Enter referral code if any">
                </div>
                
                <button type="submit" class="btn-submit">Sign Up</button>
            </form>
        </div>
    </div>

    <script>
        // Tab switching
        const loginTab = document.getElementById('login-tab');
        const signupTab = document.getElementById('signup-tab');
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');
        const messageContainer = document.getElementById('message-container');
        const accountInfoContainer = document.getElementById('account-info-container');
        const accountNumberDisplay = document.getElementById('account-number-display');

        loginTab.addEventListener('click', () => {
            loginTab.classList.add('active');
            signupTab.classList.remove('active');
            loginForm.style.display = 'block';
            signupForm.style.display = 'none';
            accountInfoContainer.style.display = 'none';
            messageContainer.innerHTML = '';
        });

        signupTab.addEventListener('click', () => {
            signupTab.classList.add('active');
            loginTab.classList.remove('active');
            signupForm.style.display = 'block';
            loginForm.style.display = 'none';
            accountInfoContainer.style.display = 'none';
            messageContainer.innerHTML = '';
        });

        // Form validation and submission
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const username = document.getElementById('login-username').value;
            const password = document.getElementById('login-password').value;
            
            if (!username || !password) {
                showMessage('Please fill in all fields', 'error');
                return;
            }
            
            // AJAX request to login.php
            const formData = new FormData();
            formData.append('user_input', username);
            formData.append('password', password);
            
            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showMessage('Login successful! Redirecting...', 'success');
                    setTimeout(() => {
                        window.location.href = 'dashboard.php';
                    }, 1500);
                } else {
                    showMessage(data.message || 'Invalid credentials', 'error');
                }
            })
            .catch(error => {
                showMessage('An error occurred. Please try again.', 'error');
                console.error('Error:', error);
            });
        });

        signupForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const username = document.getElementById('signup-username').value;
            const password = document.getElementById('signup-password').value;
            const confirmPassword = document.getElementById('signup-confirm-password').value;
            const mobile = document.getElementById('signup-mobile').value;
            const referral = document.getElementById('signup-referral').value;
            
            if (!username || !password || !confirmPassword || !mobile) {
                showMessage('Please fill in all required fields', 'error');
                return;
            }
            
            if (password !== confirmPassword) {
                showMessage('Passwords do not match', 'error');
                return;
            }
            
            // Validate mobile number
            const mobileRegex = /^\d{10}$/;
            if (!mobileRegex.test(mobile)) {
                showMessage('Please enter a valid 10-digit mobile number', 'error');
                return;
            }
            
            // AJAX request to signup.php
            const formData = new FormData();
            formData.append('username', username);
            formData.append('password', password);
            formData.append('mobile', mobile);
            formData.append('referral', referral);
            
            fetch('signup.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showMessage('Registration successful!', 'success');
                    
                    // Display account number
                    accountNumberDisplay.textContent = data.account_number;
                    accountInfoContainer.style.display = 'block';
                    signupForm.style.display = 'none';
                    
                    // Redirect after delay
                    setTimeout(() => {
                        window.location.href = 'dashboard.php';
                    }, 5000);
                } else {
                    showMessage(data.message || 'Registration failed. Please try again.', 'error');
                }
            })
            .catch(error => {
                showMessage('An error occurred. Please try again.', 'error');
                console.error('Error:', error);
            });
        });

        function showMessage(message, type) {
            messageContainer.innerHTML = `<div class="message ${type}">${message}</div>`;
        }
    </script>
</body>
</html>
