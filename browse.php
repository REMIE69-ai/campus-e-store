<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Browse – Campus E-Store</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
  <a href="index.php" class="logo">Campus<span>Store</span></a>
  <nav>
    <a href="index.php">Home</a>
    <a href="browse.php" class="active">Browse</a>
    <a href="categories.php">Categories</a>
  </nav>
  <div class="nav-actions">
    <a href="post-item.php" class="btn btn-gold btn-sm">+ Post item</a>
    <a href="dashboard.php" class="btn btn-primary btn-sm">Dashboard</a>
  </div>
</header>

<!-- PAGE HEADER + SEARCH -->
<div class="page-header">
  <div class="container">
    <h1>Browse all listings</h1>
    <p>Find affordable items from students and staff across campus</p>
    <div style="margin-top: 18px; max-width: 560px;">
      <div class="search-bar">
        <input type="text" placeholder="Search listings…" value=""/>
        <button>🔍 Search</button>
      </div>
    </div>
  </div>
</div>

<!-- MAIN CONTENT -->
<section class="section-sm">
  <div class="container">
    <div class="layout-sidebar">

      <!-- SIDEBAR FILTERS -->
      <aside class="sidebar">
        <h4>Category</h4>
        <ul>
          <li class="active"><span>All items</span><span class="count">124</span></li>
          <li><span>💻 Computing</span><span class="count">38</span></li>
          <li><span>📱 Electronics</span><span class="count">25</span></li>
          <li><span>👕 Boys' Items</span><span class="count">20</span></li>
          <li><span>👗 Girls' Items</span><span class="count">18</span></li>
          <li><span>📚 Books</span><span class="count">14</span></li>
          <li><span>⚙️ Engineering</span><span class="count">5</span></li>
          <li><span>🏠 Hostel & Home</span><span class="count">4</span></li>
        </ul>

        <hr class="sidebar-divider"/>

        <h4>Condition</h4>
        <ul>
          <li><span>All conditions</span></li>
          <li><span>✅ New</span></li>
          <li><span>👍 Used – Good</span></li>
          <li><span>🔧 Used – Fair</span></li>
        </ul>

        <hr class="sidebar-divider"/>

        <h4>Price range</h4>
        <div class="form-group" style="margin-bottom: 10px;">
          <label>Min (UGX)</label>
          <input type="number" placeholder="0"/>
        </div>
        <div class="form-group">
          <label>Max (UGX)</label>
          <input type="number" placeholder="2,000,000"/>
        </div>
        <a href="#" class="btn btn-primary btn-sm btn-full">Apply filter</a>

        <hr class="sidebar-divider"/>

        <h4>Sort by</h4>
        <ul>
          <li class="active"><span>Newest first</span></li>
          <li><span>Price: Low → High</span></li>
          <li><span>Price: High → Low</span></li>
          <li><span>Most viewed</span></li>
        </ul>
      </aside>

      <!-- PRODUCT GRID -->
      <div>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
          <p style="font-size: 14px; color: var(--muted);">Showing <strong>124</strong> listings</p>
          <div style="display: flex; gap: 8px;">
            <span class="badge badge-green">All categories</span>
            <span class="badge badge-muted">All conditions</span>
          </div>
        </div>

        <div class="grid-3">
          <a href="product.php" class="card">
            <div class="card-img">💻</div>
            <div class="card-body">
              <span class="badge badge-gold">Used – Good</span>
              <h3>HP EliteBook 840 G3</h3>
              <div class="meta"><span>💻 Computing</span><span>· 2h ago</span></div>
              <div class="price">UGX 850,000</div>
              <a href="product.php" class="btn btn-primary btn-sm btn-full" style="margin-top: 10px;">View details</a>
            </div>
          </a>

          <a href="product.php" class="card">
            <div class="card-img">📱</div>
            <div class="card-body">
              <span class="badge badge-green">New</span>
              <h3>Samsung Galaxy A15</h3>
              <div class="meta"><span>📱 Electronics</span><span>· 5h ago</span></div>
              <div class="price">UGX 620,000</div>
              <a href="product.php" class="btn btn-primary btn-sm btn-full" style="margin-top: 10px;">View details</a>
            </div>
          </a>

          <a href="product.php" class="card">
            <div class="card-img">🎧</div>
            <div class="card-body">
              <span class="badge badge-muted">Used – Fair</span>
              <h3>Sony WH-1000XM4 Headphones</h3>
              <div class="meta"><span>🎧 Electronics</span><span>· 1d ago</span></div>
              <div class="price">UGX 280,000</div>
              <a href="product.php" class="btn btn-primary btn-sm btn-full" style="margin-top: 10px;">View details</a>
            </div>
          </a>

          <a href="product.php" class="card">
            <div class="card-img">📚</div>
            <div class="card-body">
              <span class="badge badge-muted">Used – Good</span>
              <h3>Data Structures Textbook</h3>
              <div class="meta"><span>📚 Books</span><span>· 1d ago</span></div>
              <div class="price">UGX 35,000</div>
              <a href="product.php" class="btn btn-primary btn-sm btn-full" style="margin-top: 10px;">View details</a>
            </div>
          </a>

          <a href="product.php" class="card">
            <div class="card-img">⚡</div>
            <div class="card-body">
              <span class="badge badge-muted">Used – Good</span>
              <h3>Laptop Charger 65W Universal</h3>
              <div class="meta"><span>💻 Computing</span><span>· 2d ago</span></div>
              <div class="price">UGX 45,000</div>
              <a href="product.php" class="btn btn-primary btn-sm btn-full" style="margin-top: 10px;">View details</a>
            </div>
          </a>

          <a href="product.php" class="card">
            <div class="card-img">👟</div>
            <div class="card-body">
              <span class="badge badge-green">New</span>
              <h3>Nike Air Force 1 – Size 42</h3>
              <div class="meta"><span>👕 Boys' Items</span><span>· 3d ago</span></div>
              <div class="price">UGX 190,000</div>
              <a href="product.php" class="btn btn-primary btn-sm btn-full" style="margin-top: 10px;">View details</a>
            </div>
          </a>

          <a href="product.php" class="card">
            <div class="card-img">🔌</div>
            <div class="card-body">
              <span class="badge badge-muted">Used – Good</span>
              <h3>USB-C Hub 7-in-1</h3>
              <div class="meta"><span>💻 Computing</span><span>· 3d ago</span></div>
              <div class="price">UGX 75,000</div>
              <a href="product.php" class="btn btn-primary btn-sm btn-full" style="margin-top: 10px;">View details</a>
            </div>
          </a>

          <a href="product.php" class="card">
            <div class="card-img">🎽</div>
            <div class="card-body">
              <span class="badge badge-green">New</span>
              <h3>Ladies Denim Jacket</h3>
              <div class="meta"><span>👗 Girls' Items</span><span>· 4d ago</span></div>
              <div class="price">UGX 95,000</div>
              <a href="product.php" class="btn btn-primary btn-sm btn-full" style="margin-top: 10px;">View details</a>
            </div>
          </a>

          <a href="product.php" class="card">
            <div class="card-img">🖱️</div>
            <div class="card-body">
              <span class="badge badge-muted">Used – Good</span>
              <h3>Logitech Wireless Mouse</h3>
              <div class="meta"><span>💻 Computing</span><span>· 5d ago</span></div>
              <div class="price">UGX 40,000</div>
              <a href="product.php" class="btn btn-primary btn-sm btn-full" style="margin-top: 10px;">View details</a>
            </div>
          </a>
        </div>

        <!-- PAGINATION -->
        <div style="display: flex; justify-content: center; gap: 8px; margin-top: 36px;">
          <a href="#" class="btn btn-outline btn-sm">← Prev</a>
          <a href="#" class="btn btn-primary btn-sm">1</a>
          <a href="#" class="btn btn-outline btn-sm">2</a>
          <a href="#" class="btn btn-outline btn-sm">3</a>
          <a href="#" class="btn btn-outline btn-sm">Next →</a>
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
