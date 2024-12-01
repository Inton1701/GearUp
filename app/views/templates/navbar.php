
<div class="main-wrapper" style="background-color: #212529;">
      <div class="header">
        <div class="header-left active">
          <a href="index.html" class="logo logo-normal">
           <h1 class="text-center">GearUp</h1>
          </a>
          <a href="index.html" class="logo logo-white">
            <img src="<?=base_url();?>public/assets/img/logo-white.png" alt />
          </a>
          <a href="index.html" class="logo-small">
            <img src="<?=base_url();?>public/assets/img/logo-small.png" alt />
          </a>
          <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
          </a>
        </div>

        <a id="mobile_btn" class="mobile_btn" href="#sidebar">
          <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </a>

        <ul class="nav user-menu">
          <li class="nav-item nav-searchinputs">
            
          </li>
          <li class="nav-item dropdown nav-item-box">
            <a
              href="javascript:void(0);"
              class="dropdown-toggle nav-link"
              data-bs-toggle="dropdown"
            >
              <i data-feather="bell"></i
              ><span class="badge rounded-pill">2</span>
            </a>
            <div class="dropdown-menu notifications">
              <div class="topnav-dropdown-header">
                <span class="notification-title">Notifications</span>
                <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
              </div>
              <div class="noti-content">
                <ul class="notification-list">
                  <li class="notification-message">
                    <a href="activities.html">
                      <div class="media d-flex">
                        <span class="avatar flex-shrink-0">
                          <img alt src="<?=base_url();?>public/assets/img/profiles/avatar-02.jpg" />
                        </span>
                        <div class="media-body flex-grow-1">
                          <p class="noti-details">
                            <span class="noti-title">John Doe</span> added new
                            task
                            <span class="noti-title"
                              >Patient appointment booking</span
                            >
                          </p>
                          <p class="noti-time">
                            <span class="notification-time">4 mins ago</span>
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
              </div>
              <div class="topnav-dropdown-footer">
                <a href="activities.html">View all Notifications</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown has-arrow main-drop">
            <a
              href="javascript:void(0);"
              class="dropdown-toggle nav-link userset"
              data-bs-toggle="dropdown"
            >
              <span class="user-info">
                <span class="user-letter">
                  <img
                    src="<?=base_url();?>public/assets/img/profiles/avator1.jpg"
                    alt
                    class="img-fluid"
                  />
                </span>
                <span class="user-detail">
                  <span class="user-name">John Smilga</span>
                  <span class="user-role">Super Admin</span>
                </span>
              </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
              <div class="profilename">
                <div class="profileset">
                  <span class="user-img"
                    ><img src="<?=base_url();?>public/assets/img/profiles/avator1.jpg" alt />
                    <span class="status online"></span
                  ></span>
                  <div class="profilesets">
                    <h6>John Smilga</h6>
                    <h5>Super Admin</h5>
                  </div>
                </div>
                <hr class="m-0" />
                <a class="dropdown-item" href="profile.html">
                  <i class="me-2" data-feather="user"></i> My Profile</a
                >
                <hr class="m-0" />
                <a class="dropdown-item logout pb-0" href="signin.html"
                  ><img
                    src="<?=base_url();?>public/assets/img/icons/log-out.svg"
                    class="me-2"
                    alt="img"
                  />Logout</a
                >
              </div>
            </div>
          </li>
        </ul>

        <div class="dropdown mobile-user-menu">
          <a
            href="javascript:void(0);"
            class="nav-link dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            ><i class="fa fa-ellipsis-v"></i
          ></a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="general-settings.html">Settings</a>
            <a class="dropdown-item" href="signin.html">Logout</a>
          </div>
        </div>
      </div>

      <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
            <ul>
              <li class="submenu-open">
                <h6 class="submenu-hdr">Main</h6>
                <ul>
                  <li class="submenu">
                  <li >
                    <a href="product-list.html"
                      ><i data-feather="grid"></i><span>Dashboard</span></a
                    >
                  </li>
                </ul>
              </li>
              <li class="submenu-open">
                <h6 class="submenu-hdr">Inventory</h6>
                <ul>
                  <li >
                    <a href="/admin/products/"
                      ><i data-feather="box"></i><span>Products</span></a
                    >
                  </li>
                  <li>
                    <a href="/admin/products/add-products"
                      ><i data-feather="plus-square"></i
                      ><span>Create Product</span></a
                    >
                  </li>
        
                  <li>
                    <a href="/admin/category/"
                      ><i data-feather="codepen"></i><span>Category</span></a
                    >
                  </li>
      
                  <li>
                    <a href="/admin/brand/"
                      ><i data-feather="tag"></i><span>Brands</span></a
                    >
                  </li>
                  <li>
                    <a href="manage-stocks.html"
                      ><i data-feather="package"></i
                      ><span>Manage Stock</span></a
                    >
                  </li>
                </ul>
              </li>


              <li class="submenu-open">
                <h6 class="submenu-hdr">Sales</h6>
                <ul>
                  <li>
                    <a href="sales-list.html"
                      ><i data-feather="shopping-cart"></i><span>Sales</span></a
                    >
                  </li>
                  <li>
                    <a href="invoice-report.html"
                      ><i data-feather="file-text"></i><span>Transactions</span></a
                    >
                  </li>
                  <li>
                    <a href="sales-returns.html"
                      ><i data-feather="copy"></i><span>Sales Return</span></a
                    >
                  </li>
                  <li>
                    <a href="quotation-list.html"
                      ><i data-feather="save"></i><span>Orders</span></a
                    >
                  </li>
       
                </ul>
              </li>
              <li class="submenu-open">
                <h6 class="submenu-hdr">User Management</h6>
                <ul>
                  <li>
                    <a href="/admin/user/"
                      ><i data-feather="user-check"></i><span>Users</span></a
                    >
                  </li>
                </ul>
              </li>
        
                  <li>
                    <a href="signin.html"
                      ><i data-feather="log-out"></i><span>Logout</span>
                    </a>
                  </li>
                </ul>
              </li>
         
       
            </ul>
          </div>
        </div>
      </div>

      
          </div>
        </div>
      </div>




    </div>