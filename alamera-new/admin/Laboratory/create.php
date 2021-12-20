<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/laboratory.php"); 
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <!-- ================ -->
    <link rel="stylesheet" href="../../alamera/css/style.css">
    <script src="../../alamera/js/jqury.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/1.1.1/chroma.min.js" charset="utf-8"></script>
    <script src="../../alamera/js/raphael.min.js" charset="utf-8"></script>
    <script src="../../alamera/js/jquery.mapael.js" charset="utf-8"></script>
    <script src="../../alamera//js/jquery.knob.min.js" charset="utf-8"></script>
    <script src="../../alamera/js/world_countries.js" charset="utf-8"></script>
<!--  =============-->
    <title>Add-laboratory</title>
</head>

<body>
  

    <?php // include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>








    <!-- Admin Page Wrapper -->
    <div  class="admin-wrapper home-section">

        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
        <div class="container">


    <div class="mapcontainer">
    <div class="map">

    </div>


</div>


</div>


        <!-- Admin Content -->
        <div style="display:none;" class="admin-content ">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add laboratory</a>
                <a href="index.php" class="btn btn-big">Manage laboratory</a>
            </div>


            <div class="content">
               

                <h2 class="page-title">Add laboratory</h2>

                <?php include(ROOT_PATH . '/app/helpers/formErrors.php'); ?>

                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Title</label>
                        <input id="title" type="text" name="title" value="<?php echo $title ?>" class="text-input">
                    </div>
                    <div>
                        <label>Title</label>
                        <input id="depot" type="text" name="depot" value="<?php echo $laboratory ?>" class="text-input">
                    </div>
                    <div>
                        <label>Body</label>
                        <input type="text"  name="body" id="rr" value="<?php echo $body ?>"></input>
                    </div>
                  
                    <div style="display: none;">
                        <label>Topic</label>
                        <select name="topic_id" class="text-input">
                                <option value=""></option>
                                <?php foreach ($topics as $key => $topic): ?>
                                    <?php if (!empty($topic_id) && $topic_id == $topic['id'] ): ?>
                                        <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                                    <?php else: ?>
                                        <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </select>
                    </div>
                    <div style="display: none;">
                        <?php if (empty($published)): ?>
                        <label>
                                    <input checked type="checkbox" name="published">
                                    Publish
                                </label>
                        <?php else: ?>
                        <label>
                                    <input checked type="checkbox" name="published" >
                                    Publish
                                </label>
                        <?php endif; ?>


                    </div>
                    <div >
                        <button id="add" type="submit" name="add-post" class="btn btn-big">Add laboratory</button>
                    </div>
                </form>

            </div>

        </div>
        <!-- // Admin Content -->

    </div>



    <!-- =============== -->
 
 
    <script>
        $(".mapcontainer").on('dblclick', function(e) {

            var $this = $(this),
                // mapPagePositionToXY() allows to get the x,y coordinates
                // on the map from a x,y coordinates on the page
                coords = $this.data('mapael').mapPagePositionToXY(e.pageX, e.pageY),
                // Each new plot must have its own unique ID
                plotId = 'laboratory'
                updateOptions = {
                    'newPlots': {
                    },
                };
            updateOptions.newPlots[plotId] = {
                x: coords.x,
                y: coords.y
            };
            $this.trigger('update', [updateOptions]);
            console.log(JSON.stringify(coords)+ plotId )
            // const data = JSON.parse(localStorage.getItem('data') || '{}') || {};
            // data[plotId] = coords;
            // const value = JSON.stringify(data);
            // localStorage.setItem('data', value);
            // console.log(localStorage.getItem('data'));
         document.getElementById("title").value = plotId
         document.getElementById("depot").value = coords.y
         document.getElementById("rr").value = coords.x
         console.log(plotId)

         var add = document.getElementById("add");
         add.click();
        });
        $(function() {
            // // We need a setTimeout (~200ms) in order to allow the UI to be refreshed for the message to be shown
            setTimeout(function() {
                // Get the data
                $.getJSON("http://localhost/alamera-new/admin/laboratory/getdata.php", function(data) {
                    // Success
                    // This variable will hold all the plots of our map
                    var plots = {};
                    var plotsColors = chroma.scale("Blues");
                    // Parse each elements
                    $.each(data, function(id, elem) {
                        // Check if we have the GPS position of the element
                        if (elem.depot) {
                            // Will hold the plot information
                            var plot = {};
                            // Assign position
                            plot.x = elem.body;
                            plot.y = elem.depot;
                            // Assign some information inside the tooltip
                            plot.tooltip = {

                            };
                            // Assign the background color randomize from a scale
                            plot.attrs = {
                                fill: "green "
                            };
                            // Set plot element to array
                            plots[id] = plot;
                        } 
                    });
                    // Create map
                   
$(".mapcontainer").mapael({
    map: {
        name: "world_countries",
        zoom: {
            enabled: true
           
          ,step: 0.25,
           maxLevel: 20,
        },
        
        defaultPlot: {
                                text: {
                                    attrs: {
                                        fill: "#b4b4b4",
                                        "font-weight": "normal"
                                    },
                                    attrsHover: {
                                        fill: "#fff",
                                        "font-weight": "bold"
                                    }
                                }
                            },
        defaultArea: {
            attrs: {
                fill: "#EEE",
                stroke: "#232323",
                "stroke-width": 0.3
            },
            attrsHover: {
                animDuration: 0
            },
            text: {
                attrs: {
                    cursor: "pointer",
                    "font-size": 10,
                    fill: "#000"
                },
                attrsHover: {
                    animDuration: 0
                }
            },
            eventHandlers: {
                click: function(e, id, mapElem, textElem) {
                    var newData = {
                        'areas': {}
                    };
                    if (mapElem.originalAttrs.fill == "#5ba4ff") {
                        newData.areas[id] = {
                            attrs: {
                                fill: "#eee"
                            }
                        };
                    } else {
                        newData.areas[id] = {
                            attrs: {
                                fill: "#5ba4ff"
                            }
                        };
                    }
                    $(".mapcontainer").trigger('update', [{
                        mapOptions: newData
                    }]);
                }
            }
        }

    },
    areas: {
        "department-29": {

            eventHandlers: {
                click: function() {},
                dblclick: function(e, id, mapElem, textElem) {
                    var newData = {
                        'areas': {}
                    };
                    if (mapElem.originalAttrs.fill == "#5ba4ff") {
                        newData.areas[id] = {
                            attrs: {
                                fill: "#0088db"
                            }
                        };
                    } else {
                        newData.areas[id] = {
                            attrs: {
                                fill: "#5ba4ff"
                            }
                        };
                    }
                    $(".mapcontainer").trigger('update', [{
                        mapOptions: newData
                    }]);
                }
            }
        }
    },
    plots: plots
});

                })
            
            }, 200);




        
           

        });
    </script>


    <!-- =================== -->



    <!-- JQuery -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <!-- Custom Script -->
    <script src="../../assets/js/scripts.js"></script>

</body>

</html>