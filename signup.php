<?php
// signup.php
header('Content-Type: application/json');

// Database connection
$host = 'localhost';
$db_name = 'qydipzkd_Income';
$username = 'qydipzkd_Income';
$password = 'income314@';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get form data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $referral = $_POST['referral'] ?? '';
    
    if (!$username || !$password || !$mobile) {
        echo json_encode([
            'success' => false,
            'message' => 'Please fill all required fields'
        ]);
        exit;
    }
    
    // Check if username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Username already exists'
        ]);
        exit;
    }
    
    // Check if mobile already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE mobile = :mobile");
    $stmt->bindParam(':mobile', $mobile);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Mobile number already registered'
        ]);
        exit;
    }
    
    // Validate and store referral code if provided
    $referred_by = null;
    if ($referral) {
        $stmt = $conn->prepare("SELECT id, username FROM users WHERE username = :referral");
        $stmt->bindParam(':referral', $referral);
        $stmt->execute();
        
        if ($stmt->rowCount() == 0) {
            echo json_encode([
                'success' => false,
                'message' => 'Invalid referral code'
            ]);
            exit;
        } else {
            $referrer = $stmt->fetch(PDO::FETCH_ASSOC);
            $referred_by = $referrer['username'];
        }
    }
    
    // Generate unique 6-digit account number
    $account_number = '';
    $is_unique = false;
    
    while (!$is_unique) {
        $account_number = sprintf("%06d", mt_rand(100000, 999999));
        
        $stmt = $conn->prepare("SELECT id FROM users WHERE account_number = :account_number");
        $stmt->bindParam(':account_number', $account_number);
        $stmt->execute();
        
        if ($stmt->rowCount() == 0) {
            $is_unique = true;
        }
    }
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (username, password, mobile, account_number, referral_code, referred_by) VALUES (:username, :password, :mobile, :account_number, :referral, :referred_by)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':mobile', $mobile);
    $stmt->bindParam(':account_number', $account_number);
    $stmt->bindParam(':referral', $referral);
    $stmt->bindParam(':referred_by', $referred_by);
    $stmt->execute();
    
    // Start session and log user in
    session_start();
    $_SESSION['user_id'] = $conn->lastInsertId();
    $_SESSION['username'] = $username;
    $_SESSION['account_number'] = $account_number;
    
    echo json_encode([
        'success' => true,
        'message' => 'Registration successful',
        'account_number' => $account_number
    ]);
    
} catch(PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}
?>
