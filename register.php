<?php include 'config.php'; session_start(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role = trim($_POST['role'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password_raw = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm'] ?? '';

    if ($password_raw !== $confirm_password) {
        $error = "Passwords do not match.";
    } elseif (empty($first_name) || empty($last_name) || empty($email) || empty($role) || empty($phone) || empty($password_raw)) {
        $error = "Please fill in all required fields.";
    } else {
        $password = password_hash($password_raw, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (email, password_hash, first_name, last_name, role, phone) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $email, $password, $first_name, $last_name, $role, $phone);
        if ($stmt->execute()) {
            $_SESSION['user_id'] = $conn->insert_id;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Registration failed.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register – Campus E-Store</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
  <a href="index.php" class="logo">Campus<span>Store</span></a>
  <nav></nav>
  <div class="nav-actions">
    <a href="login.php" class="btn btn-outline btn-sm">Login</a>
  </div>
</header>

<!-- AUTH -->
<div class="auth-wrap">
  <div class="auth-card" style="max-width: 500px;">
    <div style="text-align: center; margin-bottom: 28px;">
      <div style="font-size: 36px; margin-bottom: 12px;">🎓</div>
      <h2>Create your account</h2>
      <p class="sub">Join thousands of students already trading on campus</p>
      <?php if (isset($error)) echo "<div class='alert alert-error'>$error</div>"; ?>
    </div>

    <form action="" method="post">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0 16px;">
        <div class="form-group">
          <label for="fname">First name</label>
          <input type="text" id="fname" name="first_name" placeholder="REAGAN" required/>
        </div>
        <div class="form-group">
          <label for="lname">Last name</label>
          <input type="text" id="lname" name="last_name" placeholder="REMIE" required/>
        </div>
      </div>

      <div class="form-group">
        <label for="email">University email</label>
        <input type="email" id="email" name="email" placeholder="you@std.must.ac.ug" required/>
        <p class="form-note">Must end in @std.must.ac.ug, @gmail.com (staff), or your university domain</p>
      </div>

      <div class="form-group">
        <label for="role">I am a</label>
        <select id="role" name="role" required>
          <option value="">Select your role…</option>
          <option value="student">Student</option>
          <option value="staff">University Staff</option>
        </select>
      </div>

      <div class="form-group">
        <label for="phone">WhatsApp / Phone number</label>
        <input type="tel" id="phone" name="phone" placeholder="+256 756666426" required/>
        <p class="form-note">Buyers will use this to contact you. Keep it active.</p>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Min. 8 characters" required/>
      </div>

      <div class="form-group">
        <label for="confirm">Confirm password</label>
        <input type="password" id="confirm" name="confirm" placeholder="Repeat your password" required/>
      </div>

      <div style="display: flex; align-items: flex-start; gap: 10px; margin-bottom: 20px;">
        <input type="checkbox" id="terms" style="margin-top: 3px; width: auto;"/>
        <label for="terms" style="font-size: 13px; color: var(--muted);">
          I agree to the <a href="#" style="color: var(--green);">Terms of Use</a> and confirm I am affiliated with the university.
        </label>
      </div>

      <input type="submit" value="Create my account" class="btn btn-primary btn-full btn-lg" style="cursor: pointer;"/>
    </form>

    <p style="text-align: center; font-size: 14px; color: var(--muted); margin-top: 20px;">
      Already have an account? <a href="login.php" style="color: var(--green); font-weight: 500;">Login here</a>
    </p>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <div class="logo">Campus<span style="color: var(--gold);">Store</span></div>
  <p style="margin-top: 8px; font-size: 12px;">&copy; 2026 CampusStore – BIT1 Project</p>
</footer>

</body>
</html>
