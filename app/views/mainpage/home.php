<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Shop</title>
    <?php include APP_DIR . 'views/templates/mainheader.php'; ?>
</head>

<body>
    <?php include APP_DIR . 'views/templates/main_nav.php'; ?>
    <main>
        <div class="cont">
            <div class="proj-body container-fluid mb-3 p-0">
                <div id="carouselExampleIndicators" class="carousel slide car-slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators border-0">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="img-con">
                                <img src="https://placehold.co/1920x700" alt="project 1" class="d-block w-100 h-100 img-fluid">
                            </div>
                            <div class="carousel-caption d-flex flex-column align-items-start justify-content-start">
                                <h1><b>RECENT RELEASE</b></h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, beatae laborum! Veritatis, provident tempora. Maxime dolore fugit voluptate adipisci nostrum architecto, et rerum ad sapiente amet! Mollitia eaque sed laudantium.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="img-con">
                                <img src="https://placehold.co/1920x700" alt="project 2" class="d-block w-100 h-100 img-fluid">
                            </div>
                            <div class="carousel-caption d-flex flex-column align-items-start justify-content-start">
                                <h1><b>UPCOMING DESIGN</b></h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, beatae laborum! Veritatis, provident tempora. Maxime dolore fugit voluptate adipisci nostrum architecto, et rerum ad sapiente amet! Mollitia eaque sed laudantium.</p>
                            </div>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="container">
            <h2 class="fs-3 m-2 mt-5">Categories</h2>
            <hr>

            <div class="product-grid d-flex flex-row flex-wrap justify-content-center gap-2">
                <!-- Product cards -->
                <div class="card text-white" style="width: 150px; height: 150px; position: relative; cursor: pointer; overflow: hidden;">
                    <img src="https://placehold.co/150x150" class="card-img" alt="Card image" style="object-fit: cover; height: 100%;">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center p-0"
                        style="background-color: rgba(0, 0, 0, 0.5);">
                        <span class="fw-bold default-text"
                            data-hover-text="Browse"
                            style="transition: all 0.3s;">
                            GPU
                        </span>
                    </div>
                </div>

                <div class="card text-white" style="width: 150px; height: 150px; position: relative; cursor: pointer; overflow: hidden;">
                    <img src="https://placehold.co/150x150" class="card-img" alt="Card image" style="object-fit: cover; height: 100%;">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center p-0"
                        style="background-color: rgba(0, 0, 0, 0.5);">
                        <span class="fw-bold default-text"
                            data-hover-text="Browse"
                            style="transition: all 0.3s;">
                            Mother Board
                        </span>
                    </div>
                </div>

                <div class="card text-white" style="width: 150px; height: 150px; position: relative; cursor: pointer; overflow: hidden;">
                    <img src="https://placehold.co/150x150" class="card-img" alt="Card image" style="object-fit: cover; height: 100%;">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center p-0"
                        style="background-color: rgba(0, 0, 0, 0.5);">
                        <span class="fw-bold default-text"
                            data-hover-text="Browse"
                            style="transition: all 0.3s;">
                            RAM
                        </span>
                    </div>
                </div>

                <div class="card text-white" style="width: 150px; height: 150px; position: relative; cursor: pointer; overflow: hidden;">
                    <img src="https://placehold.co/150x150" class="card-img" alt="Card image" style="object-fit: cover; height: 100%;">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center p-0"
                        style="background-color: rgba(0, 0, 0, 0.5);">
                        <span class="fw-bold default-text"
                            data-hover-text="Browse"
                            style="transition: all 0.3s;">
                            CPU
                        </span>
                    </div>
                </div>

                <div class="card text-white" style="width: 150px; height: 150px; position: relative; cursor: pointer; overflow: hidden;">
                    <img src="https://placehold.co/150x150" class="card-img" alt="Card image" style="object-fit: cover; height: 100%;">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center p-0"
                        style="background-color: rgba(0, 0, 0, 0.5);">
                        <span class="fw-bold default-text"
                            data-hover-text="Browse"
                            style="transition: all 0.3s;">
                            Casing
                        </span>
                    </div>
                </div>

                <div class="card text-white" style="width: 150px; height: 150px; position: relative; cursor: pointer; overflow: hidden;">
                    <img src="https://placehold.co/150x150" class="card-img" alt="Card image" style="object-fit: cover; height: 100%;">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center p-0"
                        style="background-color: rgba(0, 0, 0, 0.5);">
                        <span class="fw-bold default-text"
                            data-hover-text="Browse"
                            style="transition: all 0.3s;">
                            Casing
                        </span>
                    </div>
                </div>

                <div class="card text-white" style="width: 150px; height: 150px; position: relative; cursor: pointer; overflow: hidden;">
                    <img src="https://placehold.co/150x150" class="card-img" alt="Card image" style="object-fit: cover; height: 100%;">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center p-0"
                        style="background-color: rgba(0, 0, 0, 0.5);">
                        <span class="fw-bold default-text"
                            data-hover-text="Browse"
                            style="transition: all 0.3s;">
                            Casing
                        </span>
                    </div>
                </div>

    </main>

    <script src="<?= base_url(); ?>public/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>

    <script>
        document.querySelectorAll('.default-text').forEach(item => {
            const originalText = item.textContent;
            const hoverText = item.getAttribute('data-hover-text');

            item.parentElement.addEventListener('mouseenter', () => item.innerText = hoverText);
            item.parentElement.addEventListener('mouseleave', () => item.innerText = originalText);
        });
    </script>
</body>

</html>