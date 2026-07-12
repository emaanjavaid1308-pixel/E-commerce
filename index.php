<?php
include 'includes/db.php';

/* ================= SEARCH LOGIC ================= */
$search = "";

if(isset($_GET['search']) && $_GET['search'] != ""){
    $search = $_GET['search'];
    $query = "SELECT * FROM products WHERE name LIKE '%$search%'";
} else {
    $query = "SELECT * FROM products";
}

$result = mysqli_query($conn, $query);

if(!$result){
    die("Database Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>MyShop - E-Commerce</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* ================= BODY ================= */
body{
    overflow-x: hidden;
}

/* ================= NAVBAR ================= */
.navbar{
    background:#111;
    color:white;
    padding:12px 20px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    position:fixed;
    top:0;
    left:0;
    width: 100%;
    z-index: 1000;
}

.logo{
    font-size:22px;
    font-weight:bold;
}

/* SEARCH */
.search-box{
    display:flex;
    flex:1;
    justify-content:center;
}

.search-box input{
    width:60%;
    padding:8px;
    border:none;
    outline:none;
    border-radius:5px 0 0 5px;
}

.search-box button{
    padding:8px 12px;
    border:none;
    background:red;
    color:white;
    border-radius:0 5px 5px 0;
    cursor:pointer;
}

/* NAV LINKS */
.nav-links{
    display:flex;
    gap:15px;
}

.nav-links a{
    color:white;
    text-decoration:none;
    padding:6px 10px;
    border-radius:5px;
}

.nav-links a:hover{
    background:red;
}

/* ================= PRODUCTS ================= */
.container{
    width:90%;
    margin:auto;
    display:flex;
    flex-wrap:wrap;
    gap:20px;
    padding:20px 0;
}

.card{
    background:white;
    width:23%;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
    transition:0.3s;
}

.card:hover{
    transform:scale(1.03);
}

.card img{
    width:100%;
    height:200px;
    object-fit:cover;
}

.card h3{
    margin:10px;
}

.price{
    margin:10px;
    color:green;
    font-weight:bold;
}

.btn{
    display:block;
    text-align:center;
    background:red;
    color:white;
    padding:10px;
    text-decoration:none;
}

/* ================= RESPONSIVE ================= */
@media(max-width:768px){
    .card{width:48%;}
    .search-box input{width:100%;}
}

@media(max-width:500px){
    .card{width:100%;}
}

</style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<div class="navbar">

    <div class="logo">🛒 ShopZone</div>

    <!-- SEARCH -->
    <form class="search-box" method="GET" action="index.php">
        <input type="text" name="search" placeholder="Search products..." value="<?php echo $search; ?>">
        <button type="submit">🔍</button>
    </form>

    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>

</div>
<style>
    .hero{
    width:100%;
    height:300px;
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),
    url('https://images.unsplash.com/photo-1523275335684-37898b6baf30') center/cover;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    text-align:center;
    padding:20px;
}

.hero-text h1{
    font-size:32px;
    margin-bottom:10px;
}

.hero-text p{
    font-size:16px;
    margin-bottom:15px;
}

.hero-btn{
    background:red;
    color:white;
    padding:10px 20px;
    text-decoration:none;
    border-radius:5px;
    transition:0.3s;
}

.hero-btn:hover{
    background:darkred;
}
    </style>

<!-- HERO SECTION -->
<div class="hero">

    <div class="hero-text">
        <h1>Best Deals on Every Product 🛒</h1>
        <p>Shop smart, save more. Get amazing discounts on fashion, electronics, and more.</p>

        <a href="#products" class="hero-btn">Shop Now</a>
    </div>

</div>

<style>
    .categories{
    padding:30px 20px;
    text-align:center;
}

.categories h2{
    font-size:24px;
    margin-bottom:20px;
    color:#111;
}

/* GRID */
.category-box{
    display:flex;
    justify-content:center;
    gap:20px;
    flex-wrap:wrap;
}

/* CARD */
.category-box .card{
    display:block;
    width:180px;
    background:white;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
    text-decoration:none;
    color:black;
    transition:0.3s;
    position:relative;
}

/* HOVER EFFECT */
.category-box .card:hover{
    transform:translateY(-8px) scale(1.03);
    box-shadow:0 10px 20px rgba(0,0,0,0.2);
}

/* IMAGE */
.category-box .card img{
    width:100%;
    height:130px;
    object-fit:cover;
    transition:0.3s;
}

/* DARK OVERLAY EFFECT */
.category-box .card::after{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:130px;
    background:rgba(0,0,0,0.2);
}

/* TEXT */
.category-box .card h3{
    padding:10px;
    font-size:16px;
    background:white;
    position:relative;
    z-index:1;
}

/* RESPONSIVE */
@media(max-width:768px){
    .category-box .card{
        width:45%;
    }
}

@media(max-width:500px){
    .category-box .card{
        width:100%;
    }
}
    </style>

<!-- Categories Section -->

<section class="categories">

    <h2>Our Categories</h2>

    <div class="category-box">

        <a href="index.php?cat=fashion" class="card">
            <img src="images/fashion.jpg" alt="">
            <h3>Fashion</h3>
        </a>

        <a href="index.php?cat=electronics" class="card">
            <img src="images/electronics.jpg" alt="">
            <h3>Electronics</h3>
        </a>

        <a href="index.php?cat=beauty" class="card">
            <img src="images/beauty.jpg" alt="">
            <h3>Beauty</h3>
        </a>

        <a href="index.php?cat=Jewelry" class="card">
            <img src="images/jewelry.webp" alt="">
            <h3>Jewelry</h3>
        </a>

    </div>

</section>

<!-- ================= PRODUCTS ================= -->
<div class="container">

<?php
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>

    <div class="card">
        <img src="images/<?php echo $row['image']; ?>" alt="">
        <h3><?php echo $row['name']; ?></h3>
        <p class="price">Rs <?php echo $row['price']; ?></p>

        <a class="btn" href="add-to-cart.php?id=<?php echo $row['id']; ?>">
            Add to Cart
        </a>
    </div>

<?php
    }
} else {
    echo "<h3 style='text-align:center;width:100%'>No Products Found</h3>";
}
?>

</div>

<style>
.footer{
    background:linear-gradient(135deg,#111,#222);
    color:white;
    padding:40px 20px;
    margin-top:30px;
    position:relative;
}

/* GRID */
.footer-box{
    display:flex;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:20px;
}

/* SECTION */
.footer-section{
    flex:1;
    min-width:220px;
}

.footer-section h2{
    color:#ff3b3b;
    margin-bottom:10px;
}

.footer-section p{
    color:#ccc;
    font-size:14px;
    line-height:1.5;
}

/* LINKS */
.footer-section a{
    display:block;
    color:#ccc;
    text-decoration:none;
    margin:5px 0;
    transition:0.3s;
}

.footer-section a:hover{
    color:white;
    padding-left:5px;
}

/* NEWSLETTER */
.footer-section input{
    width:100%;
    padding:8px;
    margin-top:10px;
    border:none;
    outline:none;
    border-radius:5px;
}

.footer-section button{
    width:100%;
    padding:8px;
    margin-top:5px;
    border:none;
    background:#ff3b3b;
    color:white;
    cursor:pointer;
    border-radius:5px;
    transition:0.3s;
}

.footer-section button:hover{
    background:darkred;
}

/* SOCIAL */
.social-icons{
    margin-top:10px;
}

.social-icons i{
    font-size:22px;
    margin-right:10px;
    cursor:pointer;
    transition:0.3s;
    color:#ccc;
}

.social-icons i:hover{
    color:#ff3b3b;
    transform:scale(1.2);
}

/* WHATSAPP BUTTON */
.whatsapp{
    position:fixed;
    bottom:20px;
    right:20px;
    background:#25D366;
    color:white;
    padding:10px 15px;
    border-radius:50px;
    text-decoration:none;
    font-weight:bold;
    box-shadow:0 0 10px rgba(0,0,0,0.3);
    transition:0.3s;
}

.whatsapp:hover{
    transform:scale(1.1);
}

/* RESPONSIVE */
@media(max-width:768px){
    .footer-box{
        flex-direction:column;
        text-align:center;
    }
}
    </style>

<!-- FOOTER -->
<footer class="footer">

    <div class="footer-box">

        <!-- ABOUT -->
        <div class="footer-section">
            <h2>ShopZone</h2>
            <p>
                Best online shopping website for fashion,
                electronics and beauty products.
            </p>
        </div>

        <!-- HELP US -->
        <div class="footer-section">

            <h2>Let Us Help You</h2>
            <a>ShopZone and COVID-19</a>
            <a>Your Account</a>
            <a>our Orders</a>
            <a>Shipping Rates & Policies</a>
            <a>Returns & Replacements</a>
            <a>manage Your Content and Devices</a>
            <a>Help</a>

        </div>

        <!-- NEWSLETTER -->
<div class="footer-section">
    <h2>Newsletter</h2>

    <p>Get latest offers & updates</p>

    <form action="subscribe.php" method="POST">
        <input type="email" name="email" placeholder="Enter email" required>
        <button type="submit">Subscribe</button>
    </form>

    <div class="social-icons">
        <i class='bx bxl-facebook'></i>
        <i class='bx bxl-instagram'></i>
        <i class='bx bxl-twitter'></i>
    </div>
</div>

    <!-- WHATSAPP BUTTON -->
    <a href="https://wa.me/923000000000" class="whatsapp" target="_blank">
        💬 Chat on WhatsApp
    </a>

</footer>

</body>
</html>