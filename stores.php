<?php error_reporting(~E_NOTICE);	 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> <!--เรียกbootstrap -->
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css"> <!--เรียกfontawesome -->
    <link rel="stylesheet" href="node_modules/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.3/css/flag-icon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <title>Stores</title>
</head>
<style>
    body{
        background-color:white;
    }
    
</style>
<body>
<?php 
require_once 'config.php';
include('includes/navbar.php')?>
    <!-- The Modal -->
    <br><br><br><br><br>
    <center>
 <?php 
 include('includes/product.php');
  //include('includes/search.php');

 


 
 ?>

 <?php  include('includes/footer.php');?>
<script src="node_modules/jquery/dist/jquery.min.js"></script><!--เรียกjquery -->
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script><!--เรียกpopper -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script><!--เรียกbootstrap.min.js -->
<script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script><!--เรียกjquery.validate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

</body>
</html>

<script>
var App = (function () {

//=== Use Strict ===//
'use strict';

//=== Private Variables ===//
var gallery = $('#js-gallery');

//=== Gallery Object ===//
var Gallery = {
  zoom: function(imgContainer, img) {
    var containerHeight = imgContainer.outerHeight(),
    src = img.attr('src');
    
    if ( src.indexOf('/products/normal/') != -1 ) {
      // Set height of container
      imgContainer.css( "height", containerHeight );
      
      // Switch hero image src with large version
      img.attr('src', src.replace('/products/normal/', '/products/zoom/') );
      
      // Add zoomed class to gallery container
      gallery.addClass('is-zoomed');
      
      // Enable image to be draggable
      img.draggable({
        drag: function( event, ui ) {
          ui.position.left = Math.min( 100, ui.position.left );
          ui.position.top = Math.min( 100, ui.position.top );
        }
      });
    } else {
      // Ensure height of container fits image
      imgContainer.css( "height", "auto" );
      
      // Switch hero image src with normal version
      img.attr('src', src.replace('/products/zoom/', '/products/normal/') );
      
      // Remove zoomed class to gallery container
      gallery.removeClass('is-zoomed');
    }
  },
  switch: function(trigger, imgContainer) {
    var src = trigger.attr('href'),
    thumbs = trigger.siblings(),
          img = trigger.parent().prev().children();
    
    // Add active class to thumb
    trigger.addClass('is-active');
    
    // Remove active class from thumbs
    thumbs.each(function() {
      if( $(this).hasClass('is-active') ) {
        $(this).removeClass('is-active');
      }
    });

    // Reset container if in zoom state
    if ( gallery.hasClass('is-zoomed') ) {
      gallery.removeClass('is-zoomed');
      imgContainer.css( "height", "auto" );
    }

    // Switch image source
    img.attr('src', src);
  }
};

//=== Public Methods ===//
function init() {

  // Listen for clicks on anchors within gallery
  gallery.delegate('a', 'click', function(event) {
    var trigger = $(this);
    var triggerData = trigger.data("gallery");

    if ( triggerData === 'zoom') {
      var imgContainer = trigger.parent(),
      img = trigger.siblings();
      Gallery.zoom(imgContainer, img);
    } else if ( triggerData === 'thumb') {
      var imgContainer = trigger.parent().siblings();
      Gallery.switch(trigger, imgContainer);
    } else {
      return;
    }

    event.preventDefault();
  });

}

//=== Make Methods Public ===//
return {
  init: init
};

})();

App.init();
            $(document).ready(function(){
                $("#search").keyup(function(){
                      var txt=$(this).val();
                      $('#result').html('');
                      $.ajax({
                          url:"includes/fetch.php",
                          method:"POST",
                          data:{search:txt},
                          success:function(data){
                              $('#result').html(data);
                          }
                      });
                });
            });
  
    
</script>