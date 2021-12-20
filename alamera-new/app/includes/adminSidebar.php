<head>
    <meta charset="UTF-8">
    <title>Alamera</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<div class="sidebar">
        <div class="logo-details">
            <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
            <i class='bx bx-home icon'></i>
            <div class="logo_name">alamera</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">

            <li>
                <a href="<?php echo BASE_URL . '/admin/posts/index.php'; ?>">
                    <i class='bx bxs-brightness'></i>
                    <span class="links_name">Add-Depot</span>
                </a>
                <span class="tooltip">Add-Depot</span>
            </li>
            
            <li>
                <a href="<?php echo BASE_URL . '/admin/Laboratory/index.php'; ?>">
                    <i class='bx bxs-brightness'></i>
                    <span class="links_name">Add-Laboratory</span>
                </a>
                <span class="tooltip">Add-Laboratory</span>
            </li>
                 
            <li>
                <a href="<?php echo BASE_URL . '/admin/CRU/index.php'; ?>">
                    <i class='bx bxs-brightness'></i>
                    <span class="links_name">Add-CRU</span>
                </a>
                <span class="tooltip">Add-CRU</span>
            </li>
     
            <?php if (isset($_SESSION['username'])): ?>
                <li>
                <a href="<?php echo BASE_URL . '/logout.php'; ?>">
                <i class='bx bx-log-out' id="log_out" ></i>
                   

                    <span class="links_name">logout</span>
                </a>
                <span class="tooltip">logout</span>
                </li>
                <?php endif; ?>
           
           
   
          
    





        </ul>
    </div>

    <script src="script.js"></script>