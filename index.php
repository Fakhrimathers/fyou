    <?php include('includes/header.php'); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Custom Carousel</title>
            <link rel="stylesheet" href="css/style.css">
        </head>

    <body>

        <div class="carousel-container">
            <div class="carousel">
                <div class="carousel-item active">
                    <img src="img/image1.jpg" class="w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/image2.jpg" class="w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/image3.jpg" class="w-100">
                </div>
            </div>

            <!-- Tombol Next dan Prev -->
            <div class="carousel-controls">
                <button class="carousel-control-prev" onclick="moveSlide(-1)">&#10094;</button>
                <button class="carousel-control-next" onclick="moveSlide(1)">&#10095;</button>
            </div>
        </div>
        </div>

        <script src="js/script.js"></script>

    </body>

    </html>
    <!-- Shop All Title -->
    <section class="shop-all-title">
        <h2>Shop All</h2>
    </section>

    <!-- Product Section -->
    <section class="product-section">
        <?php
        include 'includes/config.php';

        $query = "SELECT * FROM products ORDER BY id DESC LIMIT 8";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="product-row">';
            $count = 0;

            while ($product = mysqli_fetch_assoc($result)) {
                // Gunakan path 'uploads/' untuk gambar produk
                $imagePath = 'uploads/' . $product['image'];
                echo '
                <div class="product">
                    <a href="customers/product_details.php?id=' . $product['id'] . '">
                        <img src="' . $imagePath . '" alt="' . $product['name'] . '">
                    </a>
                    <h3><a href="product_details.php?id=' . $product['id'] . '">' . $product['name'] . '</a></h3>
                    <span>Rp ' . number_format($product['price'], 0, ',', '.') . '</span>
                </div>
                
                ';

                $count++;
                if ($count % 4 == 0 && $count < mysqli_num_rows($result)) {
                    echo '</div><div class="product-row">';
                }
            }

            echo '</div>';
        } else {
            echo '<p>No products available.</p>';
        }
        ?>
    </section>

    <!-- View All Button -->
    <div class="view-all">
        <a href="shop_all.php" class="view-all-link">
            View All
        </a>
    </div>

    <!-- Recent Release Section -->
    <section class="recent-release">
        <h2>Recent Release</h2>
        <div class="recent-release-gallery">
            <div class="recent-photo long">
                <img src="img/DB1.jpeg" alt="Recent Release 1">
            </div>
            <div class="recent-photo square">
                <img src="img/DB2.jpeg" alt="Recent Release 2">
            </div>
            <div class="recent-photo square">
                <img src="img/DB4.jpeg" alt="Recent Release 4">
            </div>
        </div>
    </section>




    <?php include('includes/footer.php'); ?>