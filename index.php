<?php

session_start();

require 'include/config.php';  // Database connection
//////// End of connecting to database ////////
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>GoSolo</title>


    <script language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='index.php?cat=' + val ;
}

</script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="slick/slick.css" rel="stylesheet">
    <link href="slick/slick-theme.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


<!--NAVIGATION-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#intro">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">About</a></li>
        <li><a href="#tours">Tours</a></li>
        <li><a href="#pricing">Pricing</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="login_page.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

      </ul>
    </div>
  </div>
</nav>

<!-- Intro Section -->
<section id="intro" class="intro-section">
    <div class="container">
        <div class="row">
            <div class="intro-box" class="col-lg-12">
                 <h1 id="introtitle">Our slogan here</h1>
                <hr>

                <p class="col-lg-8 col-lg-offset-2 intro">Some information about our travelling agency</p>

            </div>
         </div>
    </div>

</section>

<!--Filters section-->
 <section id="filters" class="filters-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <h1 id="introtitle">Create your own journey</h1>
                <p class="col-lg-8 col-lg-offset-2 intro">Select what you would like to do and where</p>
        <div class="row">
                   <div class="col-lg-12" id="">
<?Php

@$cat=$_GET['cat']; // Use this line or below line if register_global is off
if(strlen($cat) > 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not.
echo "Data Error";
exit;
}



///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT DISTINCT category,cat_id FROM category order by category";
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory/////
if(isset($cat) and strlen($cat) > 0){
$quer="SELECT DISTINCT subcategory FROM subcategory where cat_id=$cat order by subcategory";
}else{$quer="SELECT DISTINCT subcategory FROM subcategory order by subcategory"; }
////////// end of query for second subcategory drop down list box ///////////////////////////

echo "<form method=post name=f1 action='dd-check.php'>";
/// Add your form processing page address to action in above line. Example  action=dd-check.php////
//////////        Starting of first drop downlist /////////
echo "<select name='cat' onchange=\"reload(this.form)\"><option value=''>Select activity</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['cat_id']==@$cat){echo "<option selected value='$noticia2[cat_id]'>$noticia2[category]</option>"."<BR>";}
else{echo  "<option value='$noticia2[cat_id]'>$noticia2[category]</option>";}
}
echo "</select>";
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<select name='subcat'><option value=''>Select destination</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[subcategory]'>$noticia[subcategory]</option>";
}
echo "</select>";
//////////////////  This will end the second drop down list ///////////
//// Add your other form fields as needed here/////
echo "<input type=submit value=Submit>";
echo "</form>";
?>
<br><br>
<a href=index.php>Start new search</a>
            </div>
            </div>

            </div>
         </div>
    </div>

</section>

<!--Tours Section-->
<section id="tours" class="tours-section">
    <div class="container">
        <div class="row">
            <h1 id="tourstitle">Most popular tours</h1>

            <div class="col-md-4 col-sm-4 col-xs-12 left-column">
                <img src="img/map.png" class="img-responsive scrollpoint sp-effect5" alt="">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 center-column">
                <img src="img/map.png" class="img-responsive scrollpoint sp-effect5" alt="">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 right-column">
                <img src="img/map.png" class="img-responsive scrollpoint sp-effect5" alt="">

            </div>
         </div>
    </div>

</section>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="slick/slick.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/scriptmain.js"></script>
</body>
</html>
