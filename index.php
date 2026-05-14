<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Campus E-Store – Buy & Sell on Campus</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
  <div class="logo">Campus<span>E-Store</span></div>
  <nav>
    <a href="index.php" class="active">Home</a>
    <a href="browse.php">Browse</a>
    <a href="categories.php">Categories</a>
  </nav>
  <div class="nav-actions">
    <a href="login.php" class="btn btn-outline btn-sm">Login</a>
    <a href="register.php" class="btn btn-primary btn-sm">Register</a>
  </div>
</header>

<!-- HERO -->
<section style="background: linear-gradient(135deg, #0f1f17 60%, #1a7a4a); padding: 80px 40px; text-align: center; color: white;">
  <div class="container">
    <div class="badge badge-gold" style="margin-bottom: 18px;">🎓 Built for university students & staff</div>
    <h1 style="font-size: 52px; font-weight: 800; margin-bottom: 16px; line-height: 1.1;">
      Buy & Sell <span style="color: #f5a623;">anything</span><br/>on campus
    </h1>
    <p style="font-size: 17px; color: #a0c8b0; max-width: 520px; margin: 0 auto 36px;">
      A trusted marketplace for Mbarara University students and staff. Electronics, books, accessories and more — all in one place.
    </p>
    <!-- Search -->
    <div style="max-width: 580px; margin: 0 auto 24px;">
      <div class="search-bar">
        <input type="text" placeholder="Search for laptops, phones, books…"/>
        <button>🔍 Search</button>
      </div>
    </div>
    <p style="font-size: 13px; color: #6b9e7a;">Popular: Laptop charger &nbsp;·&nbsp; Textbooks &nbsp;·&nbsp; Phone &nbsp;·&nbsp; Headphones</p>
  </div>
</section>

<!-- CATEGORY STRIP -->
<section style="background: white; border-bottom: 1px solid var(--border); padding: 28px 40px;">
  <div class="container">
    <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
      <?php
      $cat_query = "SELECT * FROM categories";
      $cat_result = $conn->query($cat_query);
      while ($cat = $cat_result->fetch_assoc()) {
          echo "<a href='categories.php' class='btn btn-outline btn-sm'>{$cat['icon']} {$cat['name']}</a>";
      }
      ?>
    </div>
  </div>
</section>

<!-- FEATURED LISTINGS -->
<section class="section">
  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
      <div>
        <h2 style="font-size: 26px;">Recent listings</h2>
        <p style="color: var(--muted); font-size: 14px;">Freshly posted by students & staff</p>
      </div>
      <a href="browse.php" class="btn btn-outline btn-sm">View all →</a>
    </div>

    <div class="grid-4">
      <?php
      $prod_query = "SELECT p.*, c.name AS cat_name, c.icon AS cat_icon FROM products p JOIN categories c ON p.category_id = c.id WHERE p.status='active' ORDER BY p.created_at DESC LIMIT 8";
      $prod_result = $conn->query($prod_query);
      while ($prod = $prod_result->fetch_assoc()) {
          $badge = $prod['condition'] == 'new' ? 'badge-green' : 'badge-gold';
          $cond_text = ucfirst(str_replace('-', ' – ', $prod['condition']));
          echo "
          <a href='product.php?id={$prod['id']}' class='card'>
            <div class='card-img'>{$prod['cat_icon']}</div>
            <div class='card-body'>
              <span class='badge $badge'>$cond_text</span>
              <h3>{$prod['title']}</h3>
              <div class='meta'>
                <span>{$prod['cat_icon']} {$prod['cat_name']}</span>
                <span>· " . date('M j', strtotime($prod['created_at'])) . "</span>
              </div>
              <div class='price'>UGX " . number_format($prod['price']) . "</div>
            </div>
          </a>";
      }
      ?>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="section" style="background: var(--dark); color: white;">
  <div class="container" style="text-align: center;">
    <h2 style="font-size: 28px; margin-bottom: 8px;">How it works</h2>
    <p style="color: #6b9e7a; margin-bottom: 48px;">Three simple steps to buy or sell on campus</p>
    <div class="grid-3">
      <div style="padding: 28px; border: 1px solid #2a3d30; border-radius: var(--radius);">
        <div style="font-size: 40px; margin-bottom: 16px;">📋</div>
        <h3 style="margin-bottom: 8px; font-size: 18px;">1. Register</h3>
        <p style="color: #6b9e7a; font-size: 14px;">Sign up with your university email to verify you're part of the campus community.</p>
      </div>
      <div style="padding: 28px; border: 1px solid #2a3d30; border-radius: var(--radius); border-color: var(--green);">
        <div style="font-size: 40px; margin-bottom: 16px;">🛍️</div>
        <h3 style="margin-bottom: 8px; font-size: 18px;">2. Post or Browse</h3>
        <p style="color: #6b9e7a; font-size: 14px;">List your item in seconds or browse hundreds of affordable products from fellow students.</p>
      </div>
      <div style="padding: 28px; border: 1px solid #2a3d30; border-radius: var(--radius);">
        <div style="font-size: 40px; margin-bottom: 16px;">🤝</div>
        <h3 style="margin-bottom: 8px; font-size: 18px;">3. Connect & Deal</h3>
        <p style="color: #6b9e7a; font-size: 14px;">Contact the seller directly via WhatsApp or call. Meet on campus and close the deal.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section style="padding: 60px 40px; text-align: center; background: var(--green-light);">
  <div class="container">
    <h2 style="font-size: 28px; margin-bottom: 10px;">Got something to sell?</h2>
    <p style="color: var(--muted); margin-bottom: 28px;">Post your listing for free and reach thousands of students instantly.</p>
    <a href="register.php" class="btn btn-gold btn-lg">Get started – it's free</a>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="logo">Campus<span style="color: var(--gold);">Store</span></div>
  <p style="margin-top: 8px;">Made for students, by students &nbsp;·&nbsp; <a href="#">About</a> &nbsp;·&nbsp; <a href="#">Contact</a></p>
  <p style="margin-top: 6px; font-size: 12px;">&copy; 2025 CampusStore – BIT1 Project</p>
</footer>

</body>
</html>
