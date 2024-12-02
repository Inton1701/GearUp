<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Shop</title>
    <?php include APP_DIR . 'views/templates/mainheader.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <?php include APP_DIR . 'views/templates/main_nav.php'; ?>
    <main>
        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-3">
                    <div class="card bg-black text-white border-0">
                        <div class="card-body">
                            <h6 class="card-title text-center mb-3 text-uppercase fw-bold" style="font-size: 14px;">Build Category</h6>
                            <div class="border border-secondary border-1 rounded p-3">
                                <canvas id="radarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Middle Panel - Component Selection -->
                <div class="col-5">
                    <h4 class="mb-4">Select your Components</h4>
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
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2"  data-category="graphics-card" data-component="graphics-card">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-gpu-card me-3"></i>
                                <h6 class="mb-0">Graphics Card</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2"  data-category="solid-state-drive" data-component="solid-state-drive">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-device-hdd me-3"></i>
                                <h6 class="mb-0">Solid State Drive</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2"  data-category="hard-disk-drive" data-component="hard-disk-drive">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-device-hdd me-3"></i>
                                <h6 class="mb-0">Hard Disk Drive</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2"  data-category="ram" data-component="ram">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-memory me-3"></i>
                                <h6 class="mb-0">RAM</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2"  data-category="power-supply" data-component="power-supply">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-power me-3"></i>
                                <h6 class="mb-0">Power Supply</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2"  data-category="case" data-component="case">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-pc me-3"></i>
                                <h6 class="mb-0">Case</h6>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Right Panel - Component Details -->
                <div class="col-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 id="componentHeading">Processors</h4>
                        <div class="d-flex gap-3">
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
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <input id="searchInput" type="text" class="form-control bg-dark text-white border-secondary" placeholder="Search">
                    </div>

                    <!-- Scrollable Product Cards -->
                    <div id="productList" class="overflow-auto" style="max-height: 400px;">
                      <!-- Product list will display here -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            // Radar Chart
            const ctx = $('#radarChart')[0]?.getContext('2d');
            if (ctx) {
                new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: ['Performance', 'Budget', 'Upgradability', 'Aesthetics', 'Cooling Efficiency'],
                        datasets: [{
                            label: 'Gaming Build',
                            data: [90, 70, 85, 75, 80],
                            fill: true,
                            backgroundColor: 'rgba(76, 175, 80, 0.2)',
                            borderColor: 'rgba(76, 175, 80, 1)',
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            r: {
                                suggestedMin: 0,
                                suggestedMax: 100
                            }
                        }
                    }
                });
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

                console.log(selectedCategory);
                // Highlight selected button
                $('.list-group-item-action').removeClass('bg-success text-dark').addClass('bg-dark text-white');
                $(this).removeClass('bg-dark text-white').addClass('bg-success text-dark');

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
                            console.log(response);
                            const products = response.data.product;
                            products.forEach(product => {
    const productCard = `
        <div class="card bg-dark text-white border-secondary mb-3" data-component="${selectedComponent}">
            <div class="card-header bg-success text-white">Sale</div>
            <div class="card-body">
                <div class="d-flex gap-3">
                    <img src="<?= base_url() ?>public/userdata/img/${product.image_path}" class="rounded" style="width: 80px; height: 80px;">
                    <div class="flex-grow-1">
                        <h5 class="card-title">${product.product_name}</h5>
                        <p class="card-text mb-2">${product.description || ''}</p>
                        <div class="text-end">
                            <h6 class="text-success">${product.price || 'N/A'}</h6>
                            <button class="btn btn-outline-success btn-sm">SELECT</button>
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

            // Product Selection
          $('#productList').on('click', '.btn-outline-success', function () {
        const card = $(this).closest('.card');
        const component = card.data('component'); // Get the component type (e.g., "processor", "motherboard", etc.)
        const imageSrc = card.find('img').attr('src');
        const productName = card.find('.card-title').text();
        const productPrice = card.find('.text-success').text();

        // Dynamically find the corresponding button for the selected component
        const button = $(`.list-group-item[data-component="${component}"]`);

        if (button.length) {
            // Store original content to restore later
            if (!button.data('originalContent')) {
                button.data('originalContent', button.html());
            }

            // Replace button content with the selected product details
            button.html(`
                <div class="d-flex align-items-center">
                    <img src="${imageSrc}" alt="${productName}" class="me-3" style="width: 30px; height: 30px; border-radius: 50%;">
                    <div class="text-start">
                        <h6 class="mb-0">${productName}</h6>
                        <small class="text-success">${productPrice}</small>
                    </div>
                </div>
            `).removeClass('bg-dark text-white').addClass('bg-success text-dark');
        }
    });

    // Restore Original Button Look
    $('.list-group-item-action').on('click', function () {
        const button = $(this);
        const originalContent = button.data('originalContent');

        if (originalContent) {
            // Restore original button content
            button.html(originalContent)
                .removeClass('bg-success text-dark')
                .addClass('bg-dark text-white');
            button.data('originalContent', null); // Clear stored content
        }
    });

        });
    </script>

</body>

</html>