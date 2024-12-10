<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<header>
    <?php
      include APP_DIR . 'views/auth/check_session.php';
      check_session();
    ?>
    <div class="container">
        <nav>
            <div class="logo"><span>Gear</span>UP</div>
            <div class="nav-links">
                <a href="/home">HOME</a>
                <a href="/shop">SHOP</a>
                <a href="/build">CUSTOM BUILD</a>
                <a href="/contact">CONTACT</a>
            </div>
            <div class="nav-icons">
                <!-- <a href="#" aria-label="Search">🔍</a> -->
                <a href="/profile" aria-label="User account"><i class="bi bi-person"></i></a>
                <a href="/cart" aria-label="Shopping cart"><i class="bi bi-cart4"></i></a>
                <a href="/logout" aria-label="Logout"><i class="bi bi-box-arrow-right"></i></i></a>
            </div>
        </nav>
    </div>
</header>


<style>
    /* Custom styles for SweetAlert */
.swal2-popup {
    background-color: #333333; /* Dark background color */
    color: #FFFFFF;            /* White text color */
}

.swal2-title {
    color: #4CAF50; 
}

.swal2-html-container {
        color: #FFFFFF;
        line-height: 1.5; 
        font-family: 'Arial', sans-serif; 
    }

    .swal2-confirm {
        background-color: #4CAF50 !important; 
        color: white;            
        font-weight: bold;         
        padding: 10px 20px;        
        border-radius: 5px;      
        font-size: 1em;           
        text-transform: uppercase; 
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2) !important; /* Add shadow effect */
        transition: background-color 0.3s, transform 0.3s !important; /* Smooth transitions */
    }

    /* Hover effect for the OK button */
    .swal2-confirm:hover {
        background-color: #388E3C; /* Darker green on hover */
        transform: scale(1.05);     /* Slightly increase button size */
    }


.swal2-ok {
    background-color: #4CAF50; 
    color: white;  
}
.swal2-cancel {
    background-color: #F44336; /* Custom red for the cancel button */
    color: white;              /* Text color for the cancel button */
}
</style>