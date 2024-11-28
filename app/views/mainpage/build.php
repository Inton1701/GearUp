<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Shop</title>
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>public/maincss/home.css" />
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

                            <!-- Pentagon Chart -->
                            <div class="pentagon-chart mb-3">
                                <svg viewBox="0 0 100 100" style="width: 100%; height: auto; max-width: ;">
                                    <!-- Pentagon shape -->
                                    <path d="M50 10 L90 40 L80 90 L20 90 L10 40 Z" fill="none" stroke="white" stroke-width="0.5" />

                                    <!-- Labels -->
                                    <text x="50" y="14" text-anchor="middle" fill="white" style="font-size: 7px;">Computing</text>
                                    <text x="95" y="40" text-anchor="start" fill="white" style="font-size: 7px;">Rendering</text>
                                    <text x="83" y="92" text-anchor="end" fill="white" style="font-size: 7px;">Data Transfer</text>
                                    <text x="18" y="92" text-anchor="start" fill="white" style="font-size: 7px;">Power Capacity</text>
                                    <text x="5" y="40" text-anchor="end" fill="white" style="font-size: 7px;">Data Storage</text>
                                </svg>
                            </div>

                            <!-- Example Static Data -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-black text-white py-2">
                                    <small>Category:</small> <strong>Gaming Build</strong>
                                </li>
                                <li class="list-group-item bg-black text-white py-2">
                                    <small>Performance:</small> <strong>High</strong>
                                </li>
                                <li class="list-group-item bg-black text-white py-2">
                                    <small>Budget:</small> <strong>Mid-range</strong>
                                </li>
                                <li class="list-group-item bg-black text-white py-2">
                                    <small>Purpose:</small> <strong>Rendering & Gaming</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <!-- Middle Panel - Component Selection -->
                <div class="col-5">
                    <h4 class="mb-4">Select your Components</h4>
                    <div class="list-group overflow-auto" style="max-height: 400px;">
                        <!-- Component Items -->
                        <button class="list-group-item list-group-item-action bg-dark text-white border-secondary mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-cpu me-3"></i>
                                <div>
                                    <h6 class="mb-0">Processor</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white border-secondary mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-fan me-3"></i>
                                <div>
                                    <h6 class="mb-0">CPU Cooler</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white border-secondary mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-motherboard me-3"></i>
                                <div>
                                    <h6 class="mb-0">Motherboard</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white border-secondary mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-gpu-card me-3"></i>
                                <div>
                                    <h6 class="mb-0">Graphics Card</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white border-secondary mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-hard-drive me-3"></i>
                                <div>
                                    <h6 class="mb-0">Storage Drive</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white border-secondary mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-ram me-3"></i>
                                <div>
                                    <h6 class="mb-0">RAM</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white border-secondary mb-3 p-3 rounded-2">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-power me-3"></i>
                                <div>
                                    <h6 class="mb-0">Power Supply</h6>
                                </div>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action bg-dark text-white border-secondary mb-3 p-3 rounded-2">
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
                    <div class="overflow-auto" style="max-height: 420px;">
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
        </div>
    </main>

    <script src="<?= base_url(); ?>public/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</body>

</html>