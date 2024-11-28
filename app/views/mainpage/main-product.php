<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Shop</title>
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>public/maincss/mainpage.css" />
</head>

<body>
    <?php include APP_DIR . 'views/templates/main_nav.php'; ?>
    <main>
        <div class="container">
            <h1><b>Products</b></h1>

            <div class="row mt-3 justify-content-end">
                <div class="col-md-2">
                    <label for="categories" class="form-label"><b>Categories</b></label>
                    <select id="categories" class="form-select">
                        <option value="all" selected>All Categories</option>
                        <option value="electronics">Electronics</option>
                        <option value="accessories">Accessories</option>
                        <option value="gaming">Gaming</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="quality" class="form-label"><b>Quality</b></label>
                    <select id="quality" class="form-select">
                        <option value="all" selected>All Quality Levels</option>
                        <option value="premium">Premium</option>
                        <option value="standard">Standard</option>
                        <option value="budget">Budget</option>
                    </select>
                </div>
            </div>


            <!-- nag-display 4 cards in a row -->
            <div class="row mt-4">

                <div class="col-md-4 col-lg-3 mt-3">
                    <div class="product-card h-100">
                        <div class="product-image">
                            <img src="https://via.placeholder.com/200" alt="BlazeStorm Cooling Fan">
                        </div>
                        <div class="card-body">
                            <button class="wishlist" aria-label="Add to wishlist">♡</button>
                            <div class="product-details">
                                <h2 class="product-title">BlazeStorm Cooling Fan</h2>
                                <p class="product-price">$9.00</p>
                                <p class="product-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="add-to-cart btn btn-primary m-1">Add To Cart</button>
                                    <p class="product-quantity mt-5">Qty: 300</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 mt-3">
                    <div class="product-card h-100">
                        <div class="product-image">
                            <img src="https://via.placeholder.com/200" alt="BlazeStorm Cooling Fan">
                        </div>
                        <div class="card-body">
                            <button class="wishlist" aria-label="Add to wishlist">♡</button>
                            <div class="product-details">
                                <h2 class="product-title">BlazeStorm Cooling Fan</h2>
                                <p class="product-price">$9.00</p>
                                <p class="product-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="add-to-cart btn btn-primary m-1">Add To Cart</button>
                                    <p class="product-quantity mt-5">Qty: 300</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 mt-3">
                    <div class="product-card h-100">
                        <div class="product-image">
                            <img src="https://via.placeholder.com/200" alt="BlazeStorm Cooling Fan">
                        </div>
                        <div class="card-body">
                            <button class="wishlist" aria-label="Add to wishlist">♡</button>
                            <div class="product-details">
                                <h2 class="product-title">BlazeStorm Cooling Fan</h2>
                                <p class="product-price">$9.00</p>
                                <p class="product-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="add-to-cart btn btn-primary m-1">Add To Cart</button>
                                    <p class="product-quantity mt-5">Qty: 300</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 mt-3">
                    <div class="product-card h-100">
                        <div class="product-image">
                            <img src="https://via.placeholder.com/200" alt="BlazeStorm Cooling Fan">
                        </div>
                        <div class="card-body">
                            <button class="wishlist" aria-label="Add to wishlist">♡</button>
                            <div class="product-details">
                                <h2 class="product-title">BlazeStorm Cooling Fan</h2>
                                <p class="product-price">$9.00</p>
                                <p class="product-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="add-to-cart btn btn-primary m-1">Add To Cart</button>
                                    <p class="product-quantity mt-5">Qty: 300</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end of div -->




            <!-- Pagination -->
            <div class="pagination">
                <a href="#" class="disabled">&laquo;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">&raquo;</a>
            </div>
        </div>
    </main>
</body>

</html>