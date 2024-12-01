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
                    <button id="processorButton" class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-component="processor" data-original-icon="bi bi-cpu" data-original-label="Processor">
    <div class="d-flex align-items-center">
        <i class="bi bi-cpu me-3"></i>
        <h6 class="mb-0">Processor</h6>
    </div>
</button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-component="cpu-cooler">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-fan me-3"></i>
                                <h6 class="mb-0">CPU Cooler</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-component="motherboard">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-motherboard me-3"></i>
                                <h6 class="mb-0">Motherboard</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-component="graphics-card">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-gpu-card me-3"></i>
                                <h6 class="mb-0">Graphics Card</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-component="storage-drive">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-device-hdd me-3"></i>
                                <h6 class="mb-0">Storage Drive</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-component="ram">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-memory me-3"></i>
                                <h6 class="mb-0">RAM</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-component="power-supply">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-power me-3"></i>
                                <h6 class="mb-0">Power Supply</h6>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2" data-component="case">
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
                        <!-- Sample Product 1 -->
                        <div class="card bg-dark text-white border-secondary mb-3" data-component="processor">
                            <div class="card-header bg-success text-white">Sale</div>
                            <div class="card-body">
                                <div class="d-flex gap-3">
                                    <img src="images/processor.jpg" alt="Processor" class="rounded" style="width: 80px; height: 80px;">
                                    <div class="flex-grow-1">
                                        <h6 class="card-title">Ryzen 5 5600X</h6>
                                        <p class="card-text mb-2">High-performance processor with 6 cores and 12 threads.</p>
                                        <p class="card-text"><small class="text-muted">3.7 GHz - 4.6 GHz</small></p>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-2">P19,999.00</h5>
                                        <button class="btn btn-outline-success btn-sm">SELECT</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-dark text-white border-secondary mb-3" data-component="processor">
    <div class="card-header bg-success text-white">Sale</div>
    <div class="card-body">
        <div class="d-flex gap-3">
            <img src="images/intel-i7.jpg" alt="Intel i7" class="rounded" style="width: 80px; height: 80px;">
            <div class="flex-grow-1">
                <h6 class="card-title">Intel Core i7 12700K</h6>
                <p class="card-text mb-2">Powerful processor for high performance.</p>
                <p class="card-text"><small class="text-muted">3.6 GHz - 5.0 GHz</small></p>
            </div>
            <div class="text-end">
                <h5 class="mb-2">P23,999.00</h5>
                <button class="btn btn-outline-success btn-sm">SELECT</button>
            </div>
        </div>
    </div>
</div>


                        <!-- Sample Product 2 -->
                        <div class="card bg-dark text-white border-secondary mb-3" data-component="graphics-card">
                            <div class="card-header bg-danger text-white">New</div>
                            <div class="card-body">
                                <div class="d-flex gap-3">
                                    <img src="images/graphics-card.jpg" alt="Graphics Card" class="rounded" style="width: 80px; height: 80px;">
                                    <div class="flex-grow-1">
                                        <h6 class="card-title">NVIDIA GeForce RTX 3080</h6>
                                        <p class="card-text mb-2">Ultimate graphics card for 4K gaming and content creation.</p>
                                        <p class="card-text"><small class="text-muted">10 GB GDDR6X</small></p>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-2">P39,999.00</h5>
                                        <button class="btn btn-outline-success btn-sm">SELECT</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sample Product 3 -->
                        <div class="card bg-dark text-white border-secondary mb-3" data-component="storage-drive">
                            <div class="card-header bg-primary text-white">Featured</div>
                            <div class="card-body">
                                <div class="d-flex gap-3">
                                    <img src="images/storage-drive.jpg" alt="Storage Drive" class="rounded" style="width: 80px; height: 80px;">
                                    <div class="flex-grow-1">
                                        <h6 class="card-title">Samsung 970 EVO Plus</h6>
                                        <p class="card-text mb-2">High-speed NVMe SSD for fast read and write speeds.</p>
                                        <p class="card-text"><small class="text-muted">1 TB</small></p>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-2">P9,499.00</h5>
                                        <button class="btn btn-outline-success btn-sm">SELECT</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add more product cards here -->
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
            const ctx = $('#radarChart')[0].getContext('2d');
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
                const selectedComponent = $(this).data('component');

                $('#productList .card').each(function() {
                    const product = $(this);
                    const cardComponent = product.data('component');
                    product.toggle(cardComponent === selectedComponent || selectedComponent === 'all');
                });
            });

            $('.list-group-item-action').on('click', function() {
                const selectedComponent = $(this).data('component');
                const button = $(this);
        const originalIcon = button.data('original-icon');
        const originalLabel = button.data('original-label');

        // Check if the button is already in its updated state
        if (!button.hasClass('bg-dark')) {
            // Revert to original state
            button.html(`
                <div class="d-flex align-items-center">
                    <i class="${originalIcon} me-3"></i>
                    <h6 class="mb-0">${originalLabel}</h6>
                </div>
            `).removeClass('bg-success text-dark').addClass('bg-dark text-white');
        }

                // Update heading based on clicked component
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
                const newHeading = headingMap[selectedComponent] || "Components";
                $('#componentHeading').text(newHeading);

                // Filter product list
                $('#productList .card').each(function() {
                    const product = $(this);
                    const cardComponent = product.data('component');
                    product.toggle(cardComponent === selectedComponent || selectedComponent === 'all');
                });
            });
            $('#productList').on('click', '.btn-outline-success', function () {
        const card = $(this).closest('.card'); // Get the selected card
        const component = card.data('component'); // Get the component type
        const imageSrc = card.find('img').attr('src'); // Get the product's image URL
        const productName = card.find('.card-title').text(); // Get the product's name

        // Map component type to corresponding button ID
        const buttonMap = {
            processor: '#processorButton',
            'cpu-cooler': '#cpuCoolerButton',
            motherboard: '#motherboardButton',
            'graphics-card': '#graphicsCardButton',
            'storage-drive': '#storageDriveButton',
            ram: '#ramButton',
            'power-supply': '#powerSupplyButton',
            case: '#caseButton',
        };

        const buttonId = buttonMap[component];
        if (buttonId) {
            const button = $(buttonId);

            // Update the button's content
            button.html(`
                <div class="d-flex align-items-center">
                    <img src="${imageSrc}" alt="${productName}" class="me-3" style="width: 30px; height: 30px; border-radius: 50%;">
                    <h6 class="mb-0">${productName}</h6>
                </div>
            `).removeClass('bg-dark text-white').addClass('bg-success text-dark'); // Update button styling
        }
    });
        });
        
    </script>
</body>

</html>