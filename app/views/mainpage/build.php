<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Shop</title>
    <?php include APP_DIR . 'views/templates/mainheader.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<style>
    /* Adjust fixed cart section at the bottom */
    #addToCartSection {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #343a40;
        border-top: 1px solid #6c757d;
        padding: 16px;
        z-index: 1000;
    }

    /* Cart summary style */
    #addToCartSection .cart-summary {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    /* Cart button minimum width */
    #addToCartBtn {
        min-width: 150px;
    }

    /* Add space above the cart section */
    .cart-container {
        margin-top: 100px;
        /* Space above the cart section */
    }

    .progress-container {
        position: relative;
        width: 100%;
        height: 20px;
        margin-top: 10px;
    }

    .progress-bar-background {
        background: linear-gradient(to right, #f44336, #ffeb3b, #4caf50);
        /* Red to Yellow to Green */
        width: 100%;
        height: 100%;
        position: relative;
    }

    .progress-bar {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background: transparent;

    }

    .cursor {
        position: absolute;
        top: 0;
        width: 3px;
        height: 100%;
        background-color: gray;
        /* Black cursor */
        left: 0;
        /* Initially positioned at the left */
        z-index: 2;
    }
</style>



<body>
    <?php include APP_DIR . 'views/templates/main_nav.php'; ?>
    <main class="mb-5">
        <div class="container-fluid p-4">
            <div class="row g-4">
                <!-- Left Panel - Radar Chart -->
                <div class="col-12 col-md-3">
                    <div class="card bg-black text-white border-0 h-100">
                        <div class="card-body">
                            <h6 class="card-title text-center mb-3 text-uppercase fw-bold" style="font-size: 14px;">Build Stats</h6>
                            <div class="border border-secondary border-1 rounded p-3">
                                <canvas id="radarChart"></canvas>

                            </div>
                            <div class="container mt-1">

                                <h6 class="text-center">Build Performance</h6>
                                <div class="progress-container">

                                    <div class="progress-bar-background">
                                        <div id="progressBar" class="progress-bar"></div>
                                        <div id="cursor" class="cursor"></div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <span class="text-danger">Entry Level</span>
                                    <span class="text-warning">Mid-Range</span>
                                    <span class="text-success">High-End</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Middle Panel - Component Selection -->
                <div class="col-12 col-md-5">
                    <h4 class="mb-4 text-center text-md-start">Select your Components</h4>
                    <div class="list-group overflow-auto" style="max-height: 400px;">
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-category="processors" data-component="processor">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-cpu me-3"></i>
                                <h6 class="mb-0">Processor</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-category="cpu-coolers" data-component="cpu-coolers">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-fan me-3"></i>
                                <h6 class="mb-0">CPU Cooler</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-category="motherboard" data-component="motherboard">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-motherboard me-3"></i>
                                <h6 class="mb-0">Motherboard</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-category="graphics-card" data-component="graphics-card">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-gpu-card me-3"></i>
                                <h6 class="mb-0">Graphics Card</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-category="solid-state-drive" data-component="solid-state-drive">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-device-hdd me-3"></i>
                                <h6 class="mb-0">Solid State Drive</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-category="hard-disk-drive" data-component="hard-disk-drive">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-device-hdd me-3"></i>
                                <h6 class="mb-0">Hard Disk Drive</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-category="ram" data-component="ram">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-memory me-3"></i>
                                <h6 class="mb-0">RAM</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-category="power-supply" data-component="power-supply">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-power me-3"></i>
                                <h6 class="mb-0">Power Supply</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-category="case" data-component="case">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-pc me-3"></i>
                                <h6 class="mb-0">Case</h6>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Right Panel - Component Details -->
                <div class="col-12 col-md-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 id="componentHeading" class="text-center text-md-start">Processors</h4>
                        <!-- <div class="d-flex gap-3">
                            <select id="chipsetFilter" class="form-select form-select-sm bg-dark text-white border-secondary">
                                <option value="all">All Chipsets</option>
                                <option value="amd">AMD</option>
                                <option value="intel">Intel</option>
                            </select>
                            <select id="modelFilter" class="form-select form-select-sm bg-dark text-white border-secondary">
                                <option value="all">All Models</option>
                                <option value="ryzen5">Ryzen 5</option>
                                <option value="ryzen7">Ryzen 7</option>
                                <option value="ryzen9">Ryzen 9</option>
                            </select>
                        </div> -->
                    </div>

                    <div class="input-group mb-4">
                        <input id="searchInput" type="text" class="form-control bg-dark text-white border-secondary" placeholder="Search">
                    </div>

                    <div id="productList" class="overflow-auto" style="max-height: 400px;">
                        <!-- Product list will display here -->
                    </div>
                </div>
            </div>

        </div>
        </div>
    </main>
    <div id="addToCartSection" class="text-white">
        <div class="cart-summary">
            <div class="d-flex flex-column">
                <div class="d-flex justify-content-between mb-2">
                    <h6>Total Quantity:</h6>
                    <span id="totalQuantity">0</span>
                </div>
                <div class="d-flex justify-content-between">
                    <h6>Total Price: </h6>
                    <span id="totalPrice"> ₱0.00</span>
                </div>
            </div>
            <button id="addToCartBtn" class="btn btn-success">Add to Cart</button>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            // Radar Chart
            // Radar Chart Initialization
            const ctx = $('#radarChart')[0]?.getContext('2d');
            const radarChartData = {
                labels: ['Computing (CPU)', 'Data Storage (SSD)', 'Rendering (GPU)', 'Power Capacity (PSU)', 'Data Transfer Speed (RAM)'],
                datasets: [{
                    label: 'Gaming Build',
                    data: [0, 0, 0, 0, 0], // Default values
                    fill: true,
                    backgroundColor: 'rgba(76, 175, 80, 0.2)',
                    borderColor: 'rgba(76, 175, 80, 1)'
                }]
            };

            const radarChart = ctx ? new Chart(ctx, {
                type: 'radar',
                data: radarChartData,
                options: {
                    responsive: true,
                    scales: {
                        r: {
                            suggestedMin: 0,
                            suggestedMax: 100,
                            ticks: {
                                display: false
                            }
                        }
                    }
                }
            }) : null;

            // Performance Mapping
            const performanceMap = {
                poor: 20,
                low: 40,
                average: 60,
                high: 80,
                best: 100
            };
            const componentMapping = {
                processor: 'cpu',
                'storage-drive': 'ssd',
                'graphics-card': 'gpu',
                'power-supply': 'psu',
                ram: 'ram'
            };


            const performanceCategories = {
                cpu: 0,
                ssd: 0,
                gpu: 0,
                psu: 0,
                ram: 0
            };

            const selectedComponents = {};

            function updateBuildStats() {
                radarChartData.datasets[0].data = [
                    performanceCategories.cpu || 0,
                    performanceCategories.ssd || 0,
                    performanceCategories.gpu || 0,
                    performanceCategories.psu || 0,
                    performanceCategories.ram || 0
                ];

                radarChart.update();
            }

            function updateProgressBar() {
                const totalStats = Object.values(performanceCategories).reduce((a, b) => a + b, 0);
                const selectedCount = Object.keys(performanceCategories).length;
                const average = selectedCount > 0 ? totalStats / selectedCount : 0;

                let level = '';
                let cursorPosition = 0;

                if (average <= 40) {
                    level = 'Entry Level';
                    cursorPosition = (average / 100) * 33; // Entry level range (0-33%)
                } else if (average <= 70) {
                    level = 'Mid-Range';
                    cursorPosition = ((average - 40) / 30) * 33 + 33; // Mid-range range (33-66%)
                } else {
                    level = 'High-End';
                    cursorPosition = ((average - 70) / 30) * 33 + 66; // High-end range (66-100%)
                }

                // Update cursor position based on calculated value
                $('#cursor').css('left', `${cursorPosition}%`);
                $('#progressBar').css('width', `${cursorPosition}%`);

                // Update progress level label
                $('#progressLabel').text(`${level} (${Math.round(average)}%)`);
            }

            let cart = {}; // Cart object

            // Update the cart summary
            function updateCartSummary() {
                let totalQuantity = 0;
                let totalPrice = 0;

                // Iterate through each item in the cart and calculate total
                $.each(cart, function(productName, data) {
                    totalQuantity += data.quantity;
                    totalPrice += data.totalPrice;
                });

                // Update the cart display
                $('#totalQuantity').text(totalQuantity);
                $('#totalPrice').text(`₱${totalPrice.toFixed(2)}`);
            }

            // Product Filters
            function filterProducts() {
                const chipset = $('#chipsetFilter').val().toLowerCase();
                const model = $('#modelFilter').val().toLowerCase();
                const searchQuery = $('#searchInput').val().toLowerCase();

                $('#productList .card').each(function() {
                    const product = $(this);
                    const productChipset = product.data('chipset') || '';
                    const productModel = product.data('model') || '';
                    const productTitle = product.find('.card-title').text().toLowerCase();

                    const matchesChipset = chipset === 'all' || productChipset === chipset;
                    const matchesModel = model === 'all' || productModel.includes(model);
                    const matchesSearch = productTitle.includes(searchQuery);

                    product.toggle(matchesChipset && matchesModel && matchesSearch);
                });
            }

            $('#chipsetFilter, #modelFilter').on('change', filterProducts);
            $('#searchInput').on('input', filterProducts);

            // Component Selection
            $('.list-group-item-action').on('click', function() {
                const selectedCategory = $(this).data('category');
                const selectedComponent = $(this).data('component');

                // Add green border when clicked
                $('.list-group-item-action').removeClass('border-success').addClass('border-dark');
                $(this).removeClass('border-dark').addClass('border-success');

                // Update heading
                const headingMap = {
                    processor: "Processors",
                    "cpu-cooler": "CPU Coolers",
                    motherboard: "Motherboards",
                    "graphics-card": "Graphics Cards",
                    "storage-drive": "Storage Drives",
                    ram: "RAM",
                    "power-supply": "Power Supplies",
                    case: "Cases",
                };
                $('#componentHeading').text(headingMap[selectedComponent] || "Components");

                // Fetch products
                $.ajax({
                    url: `<?= base_url(); ?>products/fetch_products_by_category/${selectedCategory}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        const productList = $('#productList');
                        productList.empty();

                        if (response.status === 'success') {
                            const products = response.data.product;
                            products.forEach(product => {
                                const productCard = `
                            <div class="card bg-dark text-white border-secondary mb-3" data-component="${selectedComponent}">
                                <div class="card-header bg-success text-white">Sale</div>
                                <div class="card-body">
                                    <div class="d-flex gap-3">
                                        <img src="<?= base_url() ?>public/userdata/img/${product.image_path}" class="rounded" style="width: 80px; height: 80px;">
                                        <div class="flex-grow-1">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h5 class="card-title">${product.product_name}</h5>
                                                </div>
                                                <div class="col-5 text-end">  <!-- Adjusted to col-5 to align with col-7 -->
                                                    <p class="card-text text-secondary text-capitalize">Performance: ${product.performance}</p>
                                                </div>
                                            </div>
                                            <p class="card-text mb-2">${product.description || ''}</p>
                                            <p class="card-text"><strong>Available:</strong> ${product.quantity || 'N/A'} units</p>
                                            <h6 class="text-success">Price: ${product.price || 'N/A'}</h6>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="number" min="1" max="${product.quantity}" value="1" class="form-control form-control-sm bg-dark text-white border-secondary quantity-input" style="width: 80px;">
                                                <button class="btn btn-outline-success btn-sm select-button" data-product-name="${product.product_name}" data-price="${product.price}" data-quantity="${product.quantity}">SELECT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                                productList.append(productCard);
                            });
                        } else {
                            productList.html('<p class="text-danger">No products found for this category.</p>');
                        }
                    },
                    error: function() {
                        $('#productList').html('<p class="text-danger">Failed to fetch products. Please try again later.</p>');
                    }
                });
            });

            // Adding item to the cart
            $('#productList').on('click', '.select-button', function() {
                const card = $(this).closest('.card');
                const component = card.data('component');
                const imageSrc = card.find('img').attr('src');
                const productName = $(this).data('product-name');
                const pricePerUnit = parseFloat($(this).data('price'));
                const availableQuantity = parseInt($(this).data('quantity'));
                const selectedQuantity = parseInt(card.find('.quantity-input').val());
                const componentType = componentMapping[card.data('component')]; // Map the component to the correct key
                const performanceLabel = card.find('.card-text.text-capitalize').text().split(':')[1].trim().toLowerCase();
                const performanceValue = performanceMap[performanceLabel] || 0;

                if (componentType && performanceValue) {
                    performanceCategories[componentType] = performanceValue; // Update the performance for the component
                    selectedComponents[componentType] = true; // Track selected components
                }

                updateBuildStats();
                updateProgressBar();

                if (selectedQuantity > availableQuantity) {
                    alert('Selected quantity exceeds available stock.');
                    return;
                } else if (selectedQuantity < 1 || isNaN(selectedQuantity)) {
                    alert('Please select a valid quantity.');
                    return;
                }

                const totalPrice = pricePerUnit * selectedQuantity;

                // If product already exists in the cart, update the quantity and total price
                if (cart[productName]) {
                    cart[productName].quantity += selectedQuantity; // Increase quantity
                    cart[productName].totalPrice = cart[productName].quantity * pricePerUnit; // Recalculate total price based on updated quantity
                } else {
                    // If product doesn't exist in the cart, add it
                    cart[productName] = {
                        quantity: selectedQuantity,
                        price: pricePerUnit,
                        totalPrice: totalPrice
                    };
                }

                // Update the cart summary
                updateCartSummary();
                updateProgressBar();

                // Find the button for this product in the component list
                const button = $(`.list-group-item[data-component="${component}"]`);
                if (button.length) {
                    if (!button.data('originalContent')) {
                        button.data('originalContent', button.html());
                    }

                    // Update the button content with the new quantity and total price
                    button.html(`
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="${imageSrc}" alt="${productName}" class="me-3" style="width: 30px; height: 30px; border-radius: 50%;">
                    <div>
                        <h6 class="mb-0">${productName}</h6>
                        <small class="text-success">${cart[productName].quantity} unit(s) | ₱${cart[productName].totalPrice.toFixed(2)}</small>
                    </div>
                </div>
                <button class="btn btn-sm btn-danger remove-selection"><i class="bi bi-x"></i></button>
            </div>
        `).removeClass('border-dark').addClass('border-success bg-dark text-white');
                }
            });

            // Remove item from cart
            $('.list-group').on('click', '.remove-selection', function(e) {
                e.stopPropagation();
                const button = $(this).closest('.list-group-item-action');
                const productName = button.find('h6').text().trim();
                const componentType = componentMapping[button.data('component')];

                if (cart[productName]) {
                    // Remove item from cart
                    delete cart[productName];
                    // Update cart summary
                    updateCartSummary();
                    updateProgressBar();
                }

                if (componentType) {
                    performanceCategories[componentType] = 0; // Reset the performance value
                    delete selectedComponents[componentType];
                }

                updateBuildStats();
                updateProgressBar();

                // Reset the button content back to original state
                const originalContent = button.data('originalContent');
                if (originalContent) {
                    button.html(originalContent)
                        .removeClass('border-success')
                        .addClass('border-dark bg-dark text-white');
                    button.data('originalContent', null);
                }
            });

            // Initial cart summary update
            updateCartSummary();
            updateBuildStats();
            updateProgressBar();
        });
    </script>


</body>

</html>