<?php include 'config.php'; session_start(); 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$user_id = $_SESSION['user_id'];
$user_query = "SELECT * FROM users WHERE id = $user_id";
$user_result = $conn->query($user_query);
$user = $user_result->fetch_assoc();
$listings_query = "SELECT p.*, c.name AS cat_name FROM products p JOIN categories c ON p.category_id = c.id WHERE p.user_id = $user_id ORDER BY p.created_at DESC";
$listings_result = $conn->query($listings_query);
$active_count = 0;
$sold_count = 0;
$total_views = 0;
while ($listing = $listings_result->fetch_assoc()) {
    if ($listing['status'] == 'active') $active_count++;
    if ($listing['status'] == 'sold') $sold_count++;
    $total_views += $listing['views'];
}
$listings_result = $conn->query($listings_query); // reset
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard – Campus E-Store</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
  <a href="index.php" class="logo">Campus<span>Store</span></a>
  <nav>
    <a href="index.php">Home</a>
    <a href="browse.php">Browse</a>
    <a href="categories.php">Categories</a>
  </nav>
  <div class="nav-actions">
    <a href="post-item.php" class="btn btn-gold btn-sm">+ Post item</a>
    <a href="login.php" class="btn btn-outline btn-sm">Logout</a>
  </div>
</header>

<!-- PAGE HEADER -->
<div class="page-header">
  <div class="container">
    <div style="display: flex; align-items: center; gap: 16px;">
      <div class="avatar" style="width: 56px; height: 56px; font-size: 22px;">JM</div>
      <div>
        <h1 style="font-size: 24px;">Welcome back, <?php echo $user['first_name']; ?> 👋</h1>
        <p><?php echo $user['email']; ?> &nbsp;·&nbsp; <span class="badge badge-green">✅ Verified <?php echo ucfirst($user['role']); ?></span></p>
      </div>
    </div>
  </div>
</div>

<!-- MAIN -->
<section class="section-sm">
  <div class="container">

    <!-- STATS -->
    <div class="grid-4" style="margin-bottom: 32px;">
      <div class="stat-card">
        <div class="stat-num"><?php echo $active_count; ?></div>
        <div class="stat-label">Active listings</div>
      </div>
      <div class="stat-card">
        <div class="stat-num"><?php echo $total_views; ?></div>
        <div class="stat-label">Total views</div>
      </div>
      <div class="stat-card">
        <div class="stat-num">5</div>
        <div class="stat-label">Saved items</div>
      </div>
      <div class="stat-card">
        <div class="stat-num"><?php echo $sold_count; ?></div>
        <div class="stat-label">Items sold</div>
      </div>
    </div>

    <!-- TABS LAYOUT -->
    <div class="tabs">
      <div class="tab active">My listings</div>
      <div class="tab">Saved items</div>
      <div class="tab">Profile settings</div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 320px; gap: 28px; align-items: start;">

      <!-- MAIN: My Listings -->
      <div>
        <div style="background: var(--white); border: 1px solid var(--border); border-radius: var(--radius); padding: 24px;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 17px;">My listings (<?php echo $active_count + $sold_count; ?>)</h3>
            <a href="post-item.php" class="btn btn-primary btn-sm">+ Add new</a>
          </div>

          <?php while ($listing = $listings_result->fetch_assoc()) { 
              $status_badge = $listing['status'] == 'active' ? 'badge-green' : 'badge-muted';
              $status_text = ucfirst($listing['status']);
              $opacity = $listing['status'] == 'sold' ? 'style="opacity: 0.6;"' : '';
          ?>
          <div class="listing-row" <?php echo $opacity; ?>>
            <div class="listing-thumb"><?php echo $listing['cat_name'] == 'Computing' ? '💻' : '📱'; // placeholder ?></div>
            <div class="listing-info">
              <h4><?php echo $listing['title']; ?></h4>
              <p>UGX <?php echo number_format($listing['price']); ?> · <?php echo $listing['cat_name']; ?> · <?php echo $listing['views']; ?> views</p>
            </div>
            <span class="badge <?php echo $status_badge; ?>"><?php echo $status_text; ?></span>
            <div class="listing-actions">
              <a href="product.php?id=<?php echo $listing['id']; ?>" class="btn btn-outline btn-sm">View</a>
              <a href="post-item.php?id=<?php echo $listing['id']; ?>" class="btn btn-outline btn-sm">Edit</a>
              <a href="#" class="btn btn-sm" style="background: #ffe8e8; color: #b32020; border: none;">Delete</a>
            </div>
          </div>
          <?php } ?>
        </div>

        <!-- SAVED ITEMS section (shown when "Saved items" tab active) -->
        <div style="background: var(--white); border: 1px solid var(--border); border-radius: var(--radius); padding: 24px; margin-top: 20px;">
          <h3 style="font-size: 17px; margin-bottom: 16px;">Saved / Favourite items (5)</h3>

          <div class="listing-row">
            <div class="listing-thumb">📱</div>
            <div class="listing-info">
              <h4>Samsung Galaxy A15</h4>
              <p>UGX 620,000 · 📱 Electronics</p>
            </div>
            <div class="listing-actions">
              <a href="product.html" class="btn btn-outline btn-sm">View</a>
              <a href="#" class="btn btn-sm" style="background: #ffe8e8; color: #b32020; border: none;">Remove</a>
            </div>
          </div>

          <div class="listing-row">
            <div class="listing-thumb">👟</div>
            <div class="listing-info">
              <h4>Nike Air Force 1 – Size 42</h4>
              <p>UGX 190,000 · 👕 Boys' Items</p>
            </div>
            <div class="listing-actions">
              <a href="product.html" class="btn btn-outline btn-sm">View</a>
              <a href="#" class="btn btn-sm" style="background: #ffe8e8; color: #b32020; border: none;">Remove</a>
            </div>
          </div>

          <div class="listing-row">
            <div class="listing-thumb">🎽</div>
            <div class="listing-info">
              <h4>Ladies Denim Jacket</h4>
              <p>UGX 95,000 · 👗 Girls' Items</p>
            </div>
            <div class="listing-actions">
              <a href="product.html" class="btn btn-outline btn-sm">View</a>
              <a href="#" class="btn btn-sm" style="background: #ffe8e8; color: #b32020; border: none;">Remove</a>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT: Profile summary + quick links -->
      <div>
        <div style="background: var(--white); border: 1px solid var(--border); border-radius: var(--radius); padding: 24px; margin-bottom: 20px;">
          <h3 style="font-size: 15px; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid var(--border);">My profile</h3>
          <table style="width: 100%; font-size: 13px; border-collapse: collapse;">
            <tr><td style="padding: 8px 0; color: var(--muted);">Name</td><td style="padding: 8px 0; font-weight: 500;"><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></td></tr>
            <tr><td style="padding: 8px 0; color: var(--muted);">Email</td><td style="padding: 8px 0;"><?php echo $user['email']; ?></td></tr>
            <tr><td style="padding: 8px 0; color: var(--muted);">Role</td><td style="padding: 8px 0;"><?php echo ucfirst($user['role']); ?> – BIT Yr 2</td></tr>
            <tr><td style="padding: 8px 0; color: var(--muted);">WhatsApp</td><td style="padding: 8px 0;"><?php echo $user['phone']; ?></td></tr>
            <tr><td style="padding: 8px 0; color: var(--muted);">Joined</td><td style="padding: 8px 0;"><?php echo date('M Y', strtotime($user['created_at'])); ?></td></tr>
          </table>
          <a href="profile.php" class="btn btn-outline btn-sm btn-full" style="margin-top: 16px;">Edit profile</a>
        </div>

        <div style="background: var(--white); border: 1px solid var(--border); border-radius: var(--radius); padding: 24px;">
          <h3 style="font-size: 15px; margin-bottom: 14px;">Quick actions</h3>
          <div style="display: flex; flex-direction: column; gap: 10px;">
            <a href="post-item.php" class="btn btn-gold btn-full">📦 Post new item</a>
            <a href="browse.php" class="btn btn-outline btn-full">🔍 Browse listings</a>
            <a href="profile.php" class="btn btn-outline btn-full">⚙️ Account settings</a>
          </div>
        </div>
      </div>

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
