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
                <!-- Left Panel - Chart -->
                <div class="col-3">
                    <div class="card bg-black text-white border-0">
                        <div class="card-body">
                            <!-- Title -->
                            <h6 class="card-title text-center mb-3 text-uppercase fw-bold" style="font-size: 14px;">Build Category</h6>

                            <!-- Radar Chart -->
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
                        <!-- Component Items -->
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-cpu me-3"></i>
                                <div>
                                    <h6 class="mb-0">Processor</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-fan me-3"></i>
                                <div>
                                    <h6 class="mb-0">CPU Cooler</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-motherboard me-3"></i>
                                <div>
                                    <h6 class="mb-0">Motherboard</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-gpu-card me-3"></i>
                                <div>
                                    <h6 class="mb-0">Graphics Card</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-device-hdd me-3"></i>
                                <div>
                                    <h6 class="mb-0">Storage Drive</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-memory me-3"></i>
                                <div>
                                    <h6 class="mb-0">RAM</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-power me-3"></i>
                                <div>
                                    <h6 class="mb-0">Power Supply</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-pc me-3"></i>
                                <div>
                                    <h6 class="mb-0">Case</h6>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Right Panel - Component Details -->
                <div class="col-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>Processor</h4>
                        <div class="d-flex gap-3">
                            <select class="form-select form-select-sm bg-dark text-white border-secondary">
                                <option value="all">All Chipsets</option>
                                <option value="amd">AMD</option>
                                <option value="intel">Intel</option>
                            </select>
                            <select class="form-select form-select-sm bg-dark text-white border-secondary">
                                <option value="all">All Models</option>
                                <option value="ryzen5">Ryzen 5</option>
                                <option value="ryzen7">Ryzen 7</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <input type="text" class="form-control bg-dark text-white border-secondary" placeholder="Search">
                    </div>

                    <!-- Scrollable Product Cards -->
                    <div class="overflow-auto" style="max-height: 320px;">
                        <!-- Product Card Template -->
                        <div class="card bg-dark text-white border-secondary mb-3">
                            <div class="card-header bg-success text-white">Sale</div>
                            <div class="card-body">
                                <div class="d-flex gap-3">
                                    <img src="images/processor.jpg" alt="Processor" class="rounded" style="width: 80px; height: 80px">
                                    <div class="flex-grow-1">
                                        <h6 class="card-title">Ryzen 7 5800X</h6>
                                        <p class="card-text mb-2">High-performance processor for gaming and productivity.</p>
                                        <p class="card-text"><small class="text-muted">3.8 GHz - 4.7 GHz</small></p>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-2">P21,999.00</h5>
                                        <button class="btn btn-outline-success btn-sm">SELECT</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Product Cards -->
                        <div class="card bg-dark text-white border-secondary mb-3">
                            <div class="card-header bg-success text-white">Sale</div>
                            <div class="card-body">
                                <div class="d-flex gap-3">
                                    <img src="images/processor2.jpg" alt="Processor" class="rounded" style="width: 80px; height: 80px">
                                    <div class="flex-grow-1">
                                        <h6 class="card-title">Intel Core i7-12700K</h6>
                                        <p class="card-text mb-2">12th Gen processor for top-notch performance.</p>
                                        <p class="card-text"><small class="text-muted">3.6 GHz - 5.0 GHz</small></p>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-2">P24,999.00</h5>
                                        <button class="btn btn-outline-success btn-sm">SELECT</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-dark text-white border-secondary mb-3">
                            <div class="card-header bg-success text-white">Sale</div>
                            <div class="card-body">
                                <div class="d-flex gap-3">
                                    <img src="images/processor3.jpg" alt="Processor" class="rounded" style="width: 80px; height: 80px">
                                    <div class="flex-grow-1">
                                        <h6 class="card-title">Ryzen 9 5900X</h6>
                                        <p class="card-text mb-2">Elite gaming and content creation processor.</p>
                                        <p class="card-text"><small class="text-muted">3.7 GHz - 4.8 GHz</small></p>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-2">P32,999.00</h5>
                                        <button class="btn btn-outline-success btn-sm">SELECT</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add more cards as needed -->
                    </div>
                </div>
            </div>
            <div class="checkout-bar">
                <div class="shipping-info">
                    <span class="shipping-label">Shipping</span>
                    <span class="shipping-method">Standard Delivery</span>
                </div>
                <div class="subtotal-section">
                    <span class="subtotal">Subtotal: ₱0.00</span>
                    <span class="payment-info">
                        Available payment methods
                        <a href="#">Learn More</a>
                    </span>
                </div>
                <button class="add-to-cart-btn">
                    <i class="fas fa-shopping-cart cart-icon"></i>
                    ADD TO CART
                </button>
            </div>
        </div>
    </main>
    <!-- ikaw na maglipat nari -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('radarChart').getContext('2d');
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
                    pointBackgroundColor: 'rgba(76, 175, 80, 1)',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    r: {
                        angleLines: {
                            display: true
                        },
                        suggestedMin: 0,
                        suggestedMax: 100
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                }
            }
        });
    </script>

    <script src="<?= base_url(); ?>public/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</body>

</html>