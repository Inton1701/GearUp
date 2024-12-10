<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>public/maincss/view.css" />
    <script src="<?= base_url(); ?>public/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <title><?= htmlspecialchars($product['product_name']); ?></title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php include APP_DIR . 'views/templates/main_nav.php'; ?>

<div class="breadcrumb">
    <a href="/">Home</a> > <?= htmlspecialchars($product['product_name']); ?>
</div>

<main class="product-container">
    <div class="product-gallery">
        <img src="<?= base_url() . 'public/userdata/img/' . htmlspecialchars($product['image_path']); ?>" alt="<?= htmlspecialchars($product['product_name']); ?>" class="main-image">
    </div>

    <div class="product-info">
        <h1><?= htmlspecialchars($product['product_name']); ?></h1>
        <div class="price">₱<?= number_format($product['price'], 2); ?> PHP</div>
        <button class="add-to-cart" data-id="<?= $product['product_id']; ?>">ADD TO CART</button>
    </div>
</main>

<section class="tabs">
    <div class="tab-buttons">
        <button class="tab-button active">DESCRIPTION</button>
    </div>
    <div class="tab-content">
        <p><?= nl2br(htmlspecialchars($product['description'])); ?></p>
    </div>
</section>
<section class="comments-section">
    <h2>Customer Reviews</h2>
    <div class="comment-form">
        <h3>Leave a Review</h3>
        <form>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select id="rating" name="rating" required>
                    <option value="">Select a rating</option>
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Your Review:</label>
                <textarea id="comment" name="comment" rows="4" required></textarea>
            </div>
            <button type="submit" class="submit-comment">Submit Review</button>
        </form>
        </div>
    <div class="comments-list">
        <div class="comment">
            <div class="comment-header">
                <h4>John Doe</h4>
                <div class="rating">★★★★☆</div>
            </div>
            <p class="comment-date">Posted on May 15, 2023</p>
            <p class="comment-content">This cooling fan is amazing! It keeps my gaming setup cool even during intense gaming sessions. Highly recommended!</p>
        </div>
        <div class="comment">
            <div class="comment-header">
                <h4>Jane Smith</h4>
                <div class="rating">★★★★★</div>
            </div>
            <p class="comment-date">Posted on May 10, 2023</p>
            <p class="comment-content">Absolutely love this fan! It's quiet, efficient, and looks great. Perfect addition to my gaming room.</p>
        </div>
</section>

<!-- Related Products Section -->
<section class="related-products">
    <h2>Related Products</h2>
    <div class="products-grid">
        <?php if (!empty($related_products)): ?>
            <?php foreach ($related_products as $related): ?>
                <div class="product-card">
                    <a href="<?= site_url('admin/products/view/' . $related['product_id']); ?>">
                        <button class="wishlist-button">♡</button>
                        <img src="<?= base_url() . 'public/userdata/img/' . htmlspecialchars($related['image_path']); ?>" alt="<?= htmlspecialchars($related['product_name']); ?>">
                        <h3><?= htmlspecialchars($related['product_name']); ?></h3>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No related products found.</p>
        <?php endif; ?>
    </div>
</section>
<script>
      function viewProduct(productId) {
    window.location.href = `<?= site_url('admin/products/view/'); ?>${productId}`;
}
$(document).on('click', '.add-to-cart', function(event) {
        const productId = $(this).data('id');
        $.ajax({
            url: "<?= site_url('cart'); ?>",
            type: "POST",
            data: {
                product_id: productId
            },
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire('Success', 'Product added to cart!', 'success');
                } else {
                    Swal.fire('Error', response.message || 'Failed to add product to cart.', 'error');
                }
            },
            error: function(xhr) {
                console.error('AJAX Error:', xhr.responseText);
                Swal.fire('Error', 'An unexpected error occurred.', 'error');
            }
        });
    });

</script>
</body>
</html>
