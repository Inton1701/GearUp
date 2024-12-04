<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Shop</title>
    <?php include APP_DIR . 'views/templates/mainheader.php'; ?>
    <script src="<?= base_url(); ?>public/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
</head>

<body>
    <?php include APP_DIR . 'views/templates/main_nav.php'; ?>
    <main>
        <div class="container">
            <h1><b>Products</b></h1>

            <div class="row mt-3 justify-content-end">
                <div class="col-md-2">
                    <label for="categories" class="form-label"><b>Categories</b></label>
                    <select id="categories" class="form-select form-select form-select-sm bg-dark text-white border-secondary">
                        <option value="all" selected>All Categories</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="brand" class="form-label"><b>Brand</b></label>
                    <select id="brand" class="form-select form-select form-select-sm bg-dark text-white border-secondary">
                        <option value="all" selected>All Brand</option>
                        <option value="SAmsung">Samsung</option>
                    </select>
                </div>
            </div>

            <!-- Product Grid -->
            <div id="product-grid" class="row mt-4">
                <!-- Filtered products will be dynamically loaded here -->
            </div>


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

<script>
    function loadProducts() {
        $.ajax({
            type: "GET",
            url: "<?= site_url('admin/products/list') ?>",
            dataType: "json",
            success: function(response) {
                console.log("Response:", response); // Debugging the response

                if (response.status === 'success' && response.data.length > 0) {
                    const products = response.data;
                    const productContainer = $('#product-grid'); // Select the grid container
                    productContainer.empty(); // Clear previous content

                    // Iterate through products and generate cards
                    products.forEach(function(product) {
                        const price = parseFloat(product.price);
                        const formattedPrice = isNaN(price) ? 'N/A' : price.toFixed(2);

                        const productCard = `
                        <div class="col-md-4 col-lg-3 mt-3">
                            <div class="product-card h-100">
                                <div class="product-image">
                                    <img src="<?= base_url(); ?>public/userdata/img/${product.image_path}" alt="${product.product_name}">
                                </div>
                                <div class="card-body">
                                    <button class="wishlist" aria-label="Add to wishlist">♡</button>
                                    <div class="product-details">
                                        <h2 class="product-title">${product.product_name}</h2>
                                        <p class="product-price">$${formattedPrice}</p>
                                        <p class="product-text">${product.description || 'No description available.'}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button class="add-to-cart btn btn-primary m-1" data-id="${product.product_id}">Add To Cart</button>
                                            <p class="product-quantity mt-5">Qty: ${product.quantity}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                        productContainer.append(productCard);
                    });

                } else {
                    $('#product-grid').html('<p class="text-center">No products available.</p>');
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText);
                Swal.fire('Error', 'An error occurred while loading products.', 'error');
            }
        });
    }


    function loadCategories() {
        $.ajax({
            url: '/admin/category/list',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log("Categories Response:", response); // Debugging the response

                if (response.status === 'success' && response.data.length > 0) {
                    const categories = response.data;
                    const categoryDropdown = $('#categories'); // Select the dropdown
                    categoryDropdown.empty(); // Clear previous options
                    categoryDropdown.append('<option value="all" selected>All Categories</option>'); // Add default option

                    // Iterate through categories and add options
                    categories.forEach(function(category) {
                        const option = `<option value="${category.category_id}">${category.category_name}</option>`;
                        categoryDropdown.append(option);
                    });
                } else {
                    console.warn('No categories found.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching categories:', xhr.responseText);
            }
        });

        $('#categories').change(function() {
            const categoryId = $(this).val();

            // Trigger AJAX call to fetch products
            if (categoryId === 'all') {
                loadProducts(); // Reload all products
            } else {
                $.ajax({
                    url: `/admin/category/products/${categoryId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            renderProducts(response.data);
                        } else {
                            $('#product-grid').html('<p class="text-center">No products found for this category.</p>');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error fetching products:', xhr.responseText);
                        $('#product-grid').html('<p class="text-center">An error occurred.</p>');
                    }
                });
            }
        });
    }

    function loadBrands() {
    $.ajax({
        url: '/admin/brand/list', // Endpoint for fetching brands
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log("Brands Response:", response); // Debugging the response
            if (response.status === 'success' && response.data.length > 0) {
                const brands = response.data;
                const brandDropdown = $('#brand'); // Select the dropdown
                brandDropdown.empty(); // Clear previous options
                brandDropdown.append('<option value="all" selected>All Brands</option>'); // Add default option

                // Iterate through brands and add options
                brands.forEach(function (brand) {
                    const option = `<option value="${brand.brand_id}">${brand.brand_name}</option>`;
                    brandDropdown.append(option);
                });
            } else {
                console.warn('No brands found.');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching brands:', xhr.responseText);
        }
    });

    // Handle brand filter change
    $('#brand').change(function() {
    const brandId = $(this).val();

    if (brandId === 'all') {
        loadProducts(); // Reload all products if "All Brands" is selected
    } else {
        $.ajax({
            url: `/admin/brand//products/${brandId}`,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    renderProducts(response.data); // Use your existing `renderProducts` function
                } else {
                    $('#product-grid').html('<p class="text-center">No products found for this brand.</p>');
                }
            },
            error: function(xhr) {
                console.error('Error fetching products:', xhr.responseText);
                $('#product-grid').html('<p class="text-center">An error occurred.</p>');
            }
        });
    }
});

}

    function renderProducts(products) {
        const productContainer = $('#product-grid');
        productContainer.empty(); // Clear previous content

        if (products.length > 0) {
            products.forEach(product => {
                const price = parseFloat(product.price);
                const formattedPrice = isNaN(price) ? 'N/A' : price.toFixed(2); // Calculate formattedPrice here

                const productCard = `
                <div class="col-md-4 col-lg-3 mt-3">
                    <div class="product-card h-100">
                        <div class="product-image">
                            <img src="<?= base_url(); ?>public/userdata/img/${product.image_path}" alt="${product.product_name}">
                        </div>
                        <div class="card-body">
                            <button class="wishlist" aria-label="Add to wishlist">♡</button>
                            <div class="product-details">
                                <h2 class="product-title">${product.product_name}</h2>
                                <p class="product-price">$${formattedPrice}</p>
                                <p class="product-text">${product.description || 'No description available.'}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="add-to-cart btn btn-primary m-1" data-id="${product.product_id}">Add To Cart</button>
                                    <p class="product-quantity mt-5">Qty: ${product.quantity}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                productContainer.append(productCard);
            });
        } else {
            productContainer.html('<p class="text-center">No products available.</p>');
        }
    }




    $(document).ready(function () {
    loadCategories();
    loadBrands();
    loadProducts();
});
</script>

</html>