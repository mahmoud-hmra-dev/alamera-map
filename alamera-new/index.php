<?php include("./path.php"); ?>

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
    <style>
    h1 {
    font-size: 30px;
    color: #613b1e;
    margin: 20px auto 20px auto;
    display: block;
    text-align: center;
}

h2 {
    margin: 0;
    padding: 0;
    font-size: 22px;
    color: #343434;
}

.container {
    width: 90%;
    overflow: hidden;
    min-width: 300px;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}

.knobContainer {
    text-align: center;
    margin: 10px;
}

.knobContainer canvas {
    cursor: pointer;
}


/* .rightPanel {
    float: right;
    width: 223px;
    border-radius: 5px;
    margin-left: 5px;
} */


/* Specific mapael css class are below
 * 'mapael' class is added by plugin
*/

.mapael .mapTooltip {
    position: absolute;
    background-color: #fff;
    opacity: 0.80;
    opacity: 0.80;
    filter: alpha(opacity=80);
    border-radius: 4px;
    padding: 10px;
    z-index: 1000;
    max-width: 200px;
    display: none;
    color: #232323;
}

.mapael .map {
    overflow: hidden;
    position: relative;
    background-color: #232323;
    border-radius: 5px;
}


/* For all zoom buttons */

.mapael .zoomButton {
    background-color: #fff;
    border: 1px solid #ccc;
    color: #000;
    width: 40px;
    height: 20px;
    line-height: 15px;
    text-align: center;
    border-radius: 3px;
    cursor: pointer;
    position: absolute;
    top: 0;
    font-weight: bold;
    left: 10px;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -o-user-select: none;
    user-select: none;
    z-index: 1;
   
}



/* Reset Zoom button first */

.mapael .zoomReset {
    top: 20px;
}


/* Then Zoom In button */

.mapael .zoomIn {
    top: 50px;
}


/* Then Zoom Out button */

.mapael .zoomOut {
    top: 80px;
}
</style>

    <!-- ================ -->
    
    <script src="./alamera/js/jqury.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/1.1.1/chroma.min.js" charset="utf-8"></script>
    <script src="./alamera/js/raphael.min.js" charset="utf-8"></script>
    <script src="./alamera/js/jquery.mapael.js" charset="utf-8"></script>
    <script src="./alamera//js/jquery.knob.min.js" charset="utf-8"></script>
    <script src="./alamera/js/world_countries.js" charset="utf-8"></script>
<!--  =============-->
    <title>MAP-ALAMERA</title>
</head>

<body>
  

    <div class="container">


    <div class="mapcontainer">
    <div class="map">
  

    </div>
    </div>
    <button style="display: none;" id="addCircle">Add a circle</button>


</div>




 <!-- create map -->
<script>

        $(".mapcontainer").mapael({
                        map: {
                            name: "world_countries",
                            defaultArea: {
                                attrs: {
                                    fill: "#EEE",
                                    stroke: "#232323",
                                    "stroke-width": 0.3
                                }
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
                            zoom: {
                                enabled: true,
                                step: 0.25,
                                maxLevel: 20,
                            }
                        },


                      
                    });
 </script>
  <!--  end map -->
 <!-- get depot -->
     <script>
        const url = "http://localhost/alamera-new/admin/posts/getdata.php"
          fetch(url).then(response => { return response.json() }).then(data2 => {
           var x = "";
          var y = "";
  
           data2.map(function(ac){
        console.log( ac.depot)
             
         x = ac.body;
           y = ac.depot;
          
      
              $("#addCircle").click(function (x , y) {
       
   
          var existingContent = $('#svgmap').html();
          var toInsert = '<circle cx=' + ac.body + ' cy=' + ac.depot + ' r="2.5" x=' + x +' y=' + y +' stroke-width="4" fill="red" />'
             
              $('#svgmap').html(existingContent + toInsert);
            
          });
         
              
           })
    

        });






    </script> 
     <!-- end depot -->
  <!-- get Laboratory -->
      <script>
        const urllabor = "http://localhost/alamera-new/admin/c/getdata.php"
          fetch(urllabor).then(response => { return response.json() }).then(data => {
           var x = "";
          var y = "";
  
           data.map(function(labor){
        console.log( labor.depot)
             
         x = labor.body;
           y = labor.depot;
          
      
              $("#addCircle").click(function (x , y) {
       
   
          var existingContent = $('#svgmap').html();
          var toInsert = '<circle cx=' + labor.body + ' cy=' + labor.depot + ' r="2.5" x=' + x +' y=' + y +' stroke-width="4" fill="green" />'
             
              $('#svgmap').html(existingContent + toInsert);
          });
         
              
           })
    

        });






    </script>
      <!-- end Laboratory -->
  <!-- get cru -->
 <script>
        const urlcru = "http://localhost/alamera-new/admin/cru/getdata.php"
          fetch(urlcru).then(response => { return response.json() }).then(datacru => {
           var x = "";
          var y = "";
  
           datacru.map(function(cru){

             
         x = cru.body;
           y = cru.depot;
          
      
              $("#addCircle").click(function (x , y) {
       
   
          var existingContent = $('#svgmap').html();
          var toInsert = '<rect x='+cru.body+' y='+cru.depot+' width="5" height="4"   fill="#800080" />'
          
              $('#svgmap').html(existingContent + toInsert);
          });
         
              
           })
    

        });




 
              setTimeout(() => {
               var click = document.getElementById("addCircle").click();
            

 
}, 2500);

    </script>
    <!-- end cru -->







    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>



</body>

</html>