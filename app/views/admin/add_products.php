<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include APP_DIR . 'views/templates/header.php'; ?>
    <title>Dashboard</title>
</head>

<body>

    <?php include APP_DIR . 'views/templates/navbar.php'; ?>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>New Product</h4>
                        <h6>Create new product</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <div class="page-btn">
                            <a href="product-list.html" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i>Back to
                                Product</a>
                        </div>
                    </li>
                    <li>
                        <a
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Collapse"
                            id="collapse-header"><i data-feather="chevron-up" class="feather-chevron-up"></i></a>
                    </li>
                </ul>
            </div>
            <form id="addProduct" name="addProduct" action="<?= site_url('admin/products/create'); ?>" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body add-product pb-0">
                        <div class="accordion-card-one accordion" id="accordionExample">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingOne">
                                    <div
                                        class="accordion-button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne"
                                        aria-controls="collapseOne">
                                        <div class="addproduct-icon">
                                            <h5>
                                                <i data-feather="info" class="add-info"></i><span>Product Information</span>
                                            </h5>
                                            <a href="javascript:void(0);"><i
                                                    data-feather="chevron-down"
                                                    class="chevron-down-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    id="collapseOne"
                                    class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" name="product-name" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <div class="add-newplus">
                                                        <label class="form-label">Category</label>
                                                    </div>
                                                    <select class="select" name="category">
                                                        <option value="" selected>None</option>
                                                        <?php foreach ($categories as $category): ?>
                                                            <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <div class="add-newplus">
                                                        <label class="form-label">Brand</label>

                                                    </div>
                                                    <select class="select" name="brand">
                                                    <option value="1" selected>None</option>
                                                        <?php foreach ($brands as $brand): ?>
                                                            <option value="<?php echo $brand['brand_id'] ?>"><?php echo $brand['brand_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div
                                                class="input-blocks summer-description-box transfer mb-3">
                                                <label>Description</label>
                                                <textarea
                                                    class="form-control h-100"
                                                    rows="5"
                                                    name="description"
                                                    placeholder="Type here"></textarea>
                                                <p class="mt-1">Maximum 60 Characters</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="accordion-card-one accordion"
                            id="accordionExample2">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingTwo">
                                    <div
                                        class="accordion-button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo"
                                        aria-controls="collapseTwo">
                                        <div class="text-editor add-list">
                                            <div class="addproduct-icon list icon">
                                                <h5>
                                                    <i data-feather="life-buoy" class="add-info"></i><span>Pricing & Stocks</span>
                                                </h5>
                                                <a href="javascript:void(0);"><i
                                                        data-feather="chevron-down"
                                                        class="chevron-down-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    id="collapseTwo"
                                    class="accordion-collapse collapse show"
                                    aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">

                                        <div class="tab-content" id="pills-tabContent">
                                            <div
                                                class="tab-pane fade show active"
                                                id="pills-home"
                                                role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Price</label>
                                                            <input type="number" class="form-control" placeholder="0.00" name="price" required/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Quantity</label>
                                                            <input type="number" class="form-control"  placeholder="0" name="quantity"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Quantity Alert</label>
                                                            <input type="text" class="form-control" placeholder="0" name="quantity-alert"/>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div
                                                    class="accordion-card-one accordion"
                                                    id="accordionExample3">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="headingThree">
                                                            <div
                                                                class="accordion-button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseThree"
                                                                aria-controls="collapseThree">
                                                                <div class="addproduct-icon list">
                                                                    <h5>
                                                                        <i
                                                                            data-feather="image"
                                                                            class="add-info"></i><span>Images</span>
                                                                    </h5>
                                                                    <a href="javascript:void(0);"><i
                                                                            data-feather="chevron-down"
                                                                            class="chevron-down-add"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            id="collapseThree"
                                                            class="accordion-collapse collapse show"
                                                            aria-labelledby="headingThree"
                                                            data-bs-parent="#accordionExample3">
                                                            <div class="accordion-body">
                                                                <div class="text-editor add-list add">
                                                                    <div class="col-lg-12">
                                                                        <div class="add-choosen">
                                                                            <div class="input-blocks">
                                                                                <div class="image-upload">
                                                                                    <input type="file" id="imageUpload" accept="image/*" name="product-image" />
                                                                                    <div class="image-uploads">
                                                                                        <i data-feather="plus-circle" class="plus-down-add me-0"></i>
                                                                                        <h4>Add Images</h4>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="phone-img">
                                                                                <!-- Default image, which will be replaced with the selected image -->
                                                                                <img id="imagePreview" src="<?= base_url();?>/public/userdata/img/no-image.png" alt="" />
                                                                                <a href="javascript:void(0);" id="removeImage" style="display: none;">
                                                                                    <i data-feather="x" class="x-square-add remove-product"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="btn-addproduct mb-4">
                        <button type="button" class="btn btn-cancel me-2">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-submit">
                            Save Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <?php include APP_DIR . 'views/templates/footer.php'; ?>
    <script>
        $(document).ready(function() {
     
            $('#imageUpload').change(function(event) {
                var reader = new FileReader();
                reader.onload = function(e) {
  
                    $('#imagePreview').attr('src', e.target.result);
    
                    $('#removeImage').show();
                };

                reader.readAsDataURL(this.files[0]);
            });


            $('#removeImage').click(function() {
                $('#imagePreview').attr('src', '');
                $('#removeImage').hide();
                $('#imageUpload').val(''); 
            });
        });
    </script>
</body>

</html>