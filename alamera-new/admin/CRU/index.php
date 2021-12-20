<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/CRU.php");
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora"
            rel="stylesheet">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="../../assets/css/style.css">
        <style>
            #cru199{
                display:none;
            }
        </style>

        <!-- Admin Styling -->
        <link rel="stylesheet" href="../../assets/css/admin.css">

        <title>Add-CRU</title>
    </head>

    <body>
        
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper home-section">

        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>


            <!-- Admin Content -->
            <div class="admin-content ">
                <div class="button-group">
                    <a href="create.php" class="btn btn-big">Add-CRU</a>
                    <a href="index.php" class="btn btn-big">Manage CRU</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Manage CRU</h2>

                    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Title</th>
                           
                     
                        </thead>
                        <tbody>
                            <?php foreach ($posts1 as $key => $post1): ?>
                                <tr id="cru<?php echo $post1["id"] ?>">
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $post1['title'] ?></td>
                                    <td></td>
                               
                   
                                    <td><a href="edit.php?delete_id=<?php echo $post1['id']; ?>" class="delete">delete</a></td>

                                    <?php if ($post1['published']): ?>
                                        <td><a href="edit.php?published=0&p_id=<?php echo $post1['id'] ?>" class="unpublish">unpublish</a></td>
                                    <?php else: ?>
                                        <td><a href="edit.php?published=1&p_id=<?php echo $post1['id'] ?>" class="publish">publish</a></td>
                                    <?php endif; ?>
                                    
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>

            </div>
         

        </div>
     



        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Ckeditor -->
        <script
            src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
        <!-- Custom Script -->
        <script src="../../assets/js/scripts.js"></script>

    </body>

</html>