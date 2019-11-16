  <?php  
 $link = new PDO('mysql:host=localhost;dbname=tesis', 'root', '');  
 
 
 ?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="foundation-icons/foundation-icons.css" />
  </head>
 
 
 <body>
 
 
 
  <div class="off-canvas position-left" id="offCanvasLeftOverlap" data-off-canvas data-transition="overlap">
 
 <?php include 'BarraLateral.php'; ?>

  </div>

 

  <div class="off-canvas-content" data-off-canvas-content>
     <div class="grid-x grid-padding-x">
        <div class="large-12 cell">

 
  <?php include 'Top-Bar.php'; ?> 
 
		
 
 </br>
 <div class="row column">
 <hr>
<h4 style="margin: 0;" class="text-center">Áreas ubicadas en este piso</h4>
<hr>
</div>
          <div class="callout">
		 <div class="grid-x grid-margin-x">
         <div class="show-for-large large-3 cell">  
		  
           <?php
echo'</div>';
echo'<div class="grid-x grid-margin-x expanded ">';
		   
		   $conn = mysqli_connect("localhost","root","","tesis");
           $result = mysqli_query($conn, 'SELECT * 
		   FROM edificio ;');
			    if($result==null){
				    echo'';
			    }else{
 
                    while($row=mysqli_fetch_assoc($result)) { 
 
echo'<div class="large-4 cell">';
echo'<div class="media-object ">';
echo'<div class="media-object-section">';

echo'<form action="PisoArea.php" method="post">'; 
echo '<input type=image class="thumbnail"
 
  style=" max-width: 200px;
  max-height: 200px;
  width: auto;
  display: block;
  margin: 0 auto;"  
  
  src="data:image/png;base64,'.base64_encode( $row["imagen"] ).'"/>';
echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].' />';
echo'</form>';
echo'<h5>';
echo utf8_encode($row["nombre"]);
echo'</h5>';
 
echo'</div>';
echo'<div class="media-object-section">';
echo'</div>';
echo'</div>';
echo'</div>';

				    } 
				 }	 
 
 ?> 
<div class="large-4 cell">
</br>
 <form action="Edificio.php" method="post"> 
 <input type="hidden" name="id" value="<?php echo $id_edificio ?>"/>
 <input type="submit" class="button primary"value="Volver Al Edificio"></input>
 </form>
</div>
 
 
</div>
 
 

 
 
 
 
 
 
 
 
 
</div>


			
			 
 
          </div>
 
        </div>
      </div>
	 
	 
 
  
 
 
	

	
	
	
</br>	
<footer>
<div class="grid-x grid-margin-x expanded callout secondary">
<div class="large-4 cell">
<h5>FLICKR IMAGES</h5>
 
</div>
<div class="large-4 cell">
<h5>FLICKR IMAGES</h5>
 
</div>
<div class="large-4 cell">
<h5>RANDOM MAG</h5>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti quam voluptatum vel repellat ab similique molestias molestiae ea omnis eos, id asperiores est praesentium, voluptate officia nulla aspernatur sequi aliquam.</p>
</div>
</div>
<div class="grid-x grid-margin-y expanded">
<div class="medium-6 cell">
<ul class="menu">
<li><a href="#">Legal</a></li>
<li><a href="#">Partner</a></li>
<li><a href="#">Explore</a></li>
</ul>
</div>
<div class="medium-6 cell">
<ul class="menu align-right">
<li class="menu-text">Copyright © 2099 Random Mag</li>
</ul>
</div>
</div>
</footer>
	
	
 
	
	 
	 
	 
	 
	 
	 
 

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
   </div> 
  </body>
</html>

<style>
$menu-hover-lines-transition: all 0.35s ease;
$menu-hover-lines-border-width: 3px;

.menu-hover-lines {
  text-align: center;
  text-transform: uppercase;
  font-weight: 500;
  letter-spacing: 1px;
  transition: $menu-hover-lines-transition;

  li a {
    padding: 0.75rem 0;
    color: rgba($body-font-color, 0.5);
    position: relative;
    margin-left: 1rem;
  }

  li:first-child a {
    margin-left: 0;
  }

  li.active > a {
    background-color: transparent;
  }

  a:before,
  a::after {
    height: $menu-hover-lines-border-width;
    position: absolute;
    content: '';
    transition: $menu-hover-lines-transition;
    background-color: $primary-color;
    width: 0;
  }

  a::before {
    top: 0;
    left: 0;
  }

  a::after {
    bottom: 0;
    right: 0;
  }

  a:hover,
  li.active > a {
    color: $body-font-color;
    transition: $menu-hover-lines-transition;
  }

  a:hover::before,
  .active a::before,
  a:hover::after,
  .active a::after {
    width: 100%;
  }
}

.menu-hover-lines {
  text-align: center;
  text-transform: uppercase;
  font-weight: 500;
  letter-spacing: 1px;
  transition: all 0.35s ease;
}

.menu-hover-lines li a {
  padding: 0.75rem 0;
  color: rgba(10, 10, 10, 0.5);
  position: relative;
  margin-left: 1rem;
}

.menu-hover-lines li:first-child a {
  margin-left: 0;
}

.menu-hover-lines li.active > a {
  background-color: transparent;
}

.menu-hover-lines a:before,
.menu-hover-lines a::after {
  height: 3px;
  position: absolute;
  content: '';
  transition: all 0.35s ease;
  background-color: #1779ba;
  width: 0;
}

.menu-hover-lines a::before {
  top: 0;
  left: 0;
}

.menu-hover-lines a::after {
  bottom: 0;
  right: 0;
}

.menu-hover-lines a:hover,
.menu-hover-lines li.active > a {
  color: #0a0a0a;
  transition: all 0.35s ease;
}

.menu-hover-lines a:hover::before,
.menu-hover-lines .active a::before,
.menu-hover-lines a:hover::after,
.menu-hover-lines .active a::after {
  width: 100%;
}


</style>
 <style>
      * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }

      body {
        background: #fff;
        color: #444;
        font: 16px/1.5 "Helvetica Neue", Helvetica, Arial, sans-serif;
      }

      a, 
      a:visited {
        color: #888;
        text-decoration: underline;
      }
      a:hover, 
      a:focus { color: #000; }

      h1 {
        border-bottom: 2px solid #ddd;
        color: #888;
        font-size: 36px;
        font-weight: 300;
        margin-bottom: 20px;
        padding: 20px 0;
      }

      .container {
        margin: 0 auto;
        min-width: 880px;
        padding: 0 40px;
        width: 80%;
      }

      .glyph {
        border-bottom: 1px dotted #ccc;
        padding: 10px 0 20px;
        margin-bottom: 20px;
      }

      .preview-glyphs { vertical-align: bottom; } 

      .preview-scale { 
        color: #888;
        font-size: 12px; 
        margin-top: 5px;
      }

      .step {
        display: inline-block;
        line-height: 1;
        width: 10%;
      }

      
      .size-12 { font-size: 12px; }
      
      .size-14 { font-size: 14px; }
      
      .size-16 { font-size: 16px; }
      
      .size-18 { font-size: 18px; }
      
      .size-21 { font-size: 21px; }
      
      .size-24 { font-size: 24px; }
      
      .size-36 { font-size: 36px; }
      
      .size-48 { font-size: 48px; }
      
      .size-60 { font-size: 60px; }
      
      .size-72 { font-size: 72px; }
      

      .usage { margin-top: 10px; }

      .usage input {
        font-family: monospace;
        margin-right: 3px;
        padding: 2px 5px;
        text-align: center;
      }

      .usage .point { width: 150px; }

      .usage .class { width: 250px; }

      .footer {
        color: #888;
        font-size: 12px;
        padding: 20px 0;
      }
    </style>