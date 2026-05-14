<?php include 'config.php'; session_start(); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Email not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login – Campus E-Store</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
  <a href="index.php" class="logo">Campus<span>Store</span></a>
  <nav></nav>
  <div class="nav-actions">
    <a href="register.php" class="btn btn-primary btn-sm">Create account</a>
  </div>
</header>

<!-- AUTH -->
<div class="auth-wrap">
  <div class="auth-card">
    <div style="text-align: center; margin-bottom: 28px;">
      <div style="font-size: 36px; margin-bottom: 12px;">🏫</div>
      <h2>Welcome back</h2>
      <p class="sub">Login with your university email to continue</p>
    </div>

    <div class="alert alert-info">
      🔒 Only university email addresses (e.g. student@mak.ac.ug) are accepted.
    </div>
    <?php if (isset($error)) echo "<div class='alert alert-error'>$error</div>"; ?>

    <form action="" method="post">
      <div class="form-group">
        <label for="email">University email</label>
        <input type="email" id="email" name="email" placeholder="you@mak.ac.ug" required/>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required/>
        <p class="form-note"><a href="#" style="color: var(--green);">Forgot your password?</a></p>
      </div>

      <input type="submit" value="Login to my account" class="btn btn-primary btn-full btn-lg" style="cursor: pointer; margin-top: 4px;"/>
    </form>

    <div class="divider">or</div>

    <p style="text-align: center; font-size: 14px; color: var(--muted);">
      Don't have an account? <a href="register.php" style="color: var(--green); font-weight: 500;">Register here</a>
    </p>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <div class="logo">Campus<span style="color: var(--gold);">Store</span></div>
  <p style="margin-top: 8px; font-size: 12px;">&copy; 2025 CampusStore – BIT1 Project</p>
</footer>

</body>
</html>
