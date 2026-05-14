<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile – Campus E-Store</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
  <a href="index.php" class="logo">Campus<span>Store</span></a>
  <nav>
    <a href="index.php">Home</a>
    <a href="browse.php">Browse</a>
    <a href="dashboard.php">Dashboard</a>
  </nav>
  <div class="nav-actions">
    <a href="post-item.php" class="btn btn-gold btn-sm">+ Post item</a>
    <a href="login.php" class="btn btn-outline btn-sm">Logout</a>
  </div>
</header>

<!-- PAGE HEADER -->
<div class="page-header">
  <div class="container">
    <h1>Profile & Settings</h1>
    <p>Manage your account details and preferences</p>
  </div>
</div>

<!-- CONTENT -->
<section class="section-sm">
  <div class="container" style="max-width: 800px;">

    <!-- Avatar + name row -->
    <div style="background: var(--white); border: 1px solid var(--border); border-radius: var(--radius); padding: 28px; margin-bottom: 20px; display: flex; align-items: center; gap: 24px;">
      <div class="avatar" style="width: 80px; height: 80px; font-size: 30px;">JM</div>
      <div>
        <h2 style="font-size: 22px; margin-bottom: 4px;">John Mukasa</h2>
        <p style="color: var(--muted); font-size: 14px; margin-bottom: 10px;">john.mukasa@mak.ac.ug &nbsp;·&nbsp; Student – BIT Year 2</p>
        <span class="badge badge-green">✅ Verified university email</span>
      </div>
      <div style="margin-left: auto;">
        <label class="btn btn-outline btn-sm" style="cursor: pointer;">
          📷 Change photo
          <input type="file" accept="image/*" style="display: none;"/>
        </label>
      </div>
    </div>

    <!-- Personal info form -->
    <div style="background: var(--white); border: 1px solid var(--border); border-radius: var(--radius); padding: 28px; margin-bottom: 20px;">
      <h3 style="font-size: 16px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--border);">
        👤 Personal information
      </h3>
      <form action="dashboard.php" method="get">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="form-group">
            <label>First name</label>
            <input type="text" value="John"/>
          </div>
          <div class="form-group">
            <label>Last name</label>
            <input type="text" value="Mukasa"/>
          </div>
        </div>

        <div class="form-group">
          <label>University email</label>
          <input type="email" value="john.mukasa@mak.ac.ug" disabled style="background: #f5f7f5; cursor: not-allowed;"/>
          <p class="form-note">Your email is linked to your university and cannot be changed.</p>
        </div>

        <div class="form-group">
          <label>Role</label>
          <select>
            <option selected>Student</option>
            <option>University Staff</option>
          </select>
        </div>

        <div class="form-group">
          <label>Year of study</label>
          <select>
            <option>Year 1</option>
            <option selected>Year 2</option>
            <option>Year 3</option>
            <option>Year 4</option>
            <option>Postgraduate</option>
          </select>
        </div>

        <div class="form-group">
          <label>Programme / Course</label>
          <input type="text" value="Bachelor of Information Technology (BIT)"/>
        </div>

        <input type="submit" value="Save changes" class="btn btn-primary" style="cursor: pointer;"/>
      </form>
    </div>

    <!-- Contact info -->
    <div style="background: var(--white); border: 1px solid var(--border); border-radius: var(--radius); padding: 28px; margin-bottom: 20px;">
      <h3 style="font-size: 16px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--border);">
        📞 Contact information
      </h3>
      <form action="dashboard.php" method="get">
        <div class="form-group">
          <label>WhatsApp number *</label>
          <input type="tel" value="+256 700 000000"/>
          <p class="form-note">This is shown to buyers on your listings so they can contact you.</p>
        </div>
        <div class="form-group">
          <label>Alternative phone</label>
          <input type="tel" placeholder="Optional backup number"/>
        </div>
        <div class="form-group">
          <label>Preferred meet-up spot on campus</label>
          <input type="text" value="Lumumba Hall, main gate"/>
          <p class="form-note">This will auto-fill when you post new items.</p>
        </div>
        <input type="submit" value="Update contact info" class="btn btn-primary" style="cursor: pointer;"/>
      </form>
    </div>

    <!-- Change password -->
    <div style="background: var(--white); border: 1px solid var(--border); border-radius: var(--radius); padding: 28px; margin-bottom: 20px;">
      <h3 style="font-size: 16px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--border);">
        🔒 Change password
      </h3>
      <form action="dashboard.php" method="get">
        <div class="form-group">
          <label>Current password</label>
          <input type="password" placeholder="Enter current password"/>
        </div>
        <div class="form-group">
          <label>New password</label>
          <input type="password" placeholder="Min. 8 characters"/>
        </div>
        <div class="form-group">
          <label>Confirm new password</label>
          <input type="password" placeholder="Repeat new password"/>
        </div>
        <input type="submit" value="Update password" class="btn btn-primary" style="cursor: pointer;"/>
      </form>
    </div>

    <!-- Danger zone -->
    <div style="background: #fff8f8; border: 1px solid #ffd0d0; border-radius: var(--radius); padding: 28px;">
      <h3 style="font-size: 16px; color: #b32020; margin-bottom: 8px;">⚠️ Danger zone</h3>
      <p style="font-size: 14px; color: var(--muted); margin-bottom: 16px;">
        Deleting your account will remove all your listings and saved items permanently. This cannot be undone.
      </p>
      <a href="#" class="btn btn-sm" style="background: #ffe8e8; color: #b32020; border: 1px solid #ffc0c0;">Delete my account</a>
    </div>

  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="logo">Campus<span style="color: var(--gold);">Store</span></div>
  <p style="margin-top: 8px;">&copy; 2025 CampusStore – BIT1 Project</p>
</footer>

</body>
</html>
