<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuća igračaka</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div id="navbar" class="navbar navbar-default">


        <div class="container">


            <div class="navbar-header">


                <a href="pocetna.php" class="navbar-brand home">


                    <img src="slike/logo.png" alt="Logo" class="hidden-xs">


                </a>



            </div>

            <div class="navbar-collapse collapse" id="navigation">


                <div class="padding-nav">


                    <ul class="nav navbar-nav left">


                        <li class="active">
                            <a href="pocetna.php">Početna</a>
                        </li>
                        <li>
                            <a href="ponuda.php">Ponuda</a>
                        </li>
                        <li>
                            <a href="checkout.php">Moj nalog</a>
                        </li>
                        <li>
                            <a href="registracija.php">Registracija</a>
                        </li>
                        <li>
                            <a href="onama.php">Kontakt</a>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <div class="container" id="slider">


        <div class="col-md-12">


            <div class="carousel slide" id="myCarousel" data-ride="carousel">
                <!-- pocetak slider-a -->

                <ol class="carousel-indicators">


                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>

                </ol>

                <div class="carousel-inner">

                    <!-- postavljanje slika za slider - pocetak -->

                    <div class="item active">

                        <img src="slider/slika1.jpg" alt="Slider slika 1">

                    </div>

                    <div class="item">

                        <img src="slider/slika2.jpg" alt="Slider slika 2">

                    </div>

                    <div class="item">

                        <img src="slider/slika3.jpg" alt="Slider slika 3">

                    </div>

                    <div class="item">

                        <img src="slider/slika4.png" alt="Slider slika 4">

                    </div>

                </div><!-- postavljanje slika za slider - kraj -->

                <a href="#myCarousel" class="left carousel-control" data-slide="prev">

                    <!-- postavljanje funkcionalnosti za strelicu sa leve strane -->

                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Prethodna</span>

                </a>

                <a href="#myCarousel" class="right carousel-control" data-slide="next">

                    <!-- postavljanje funkcionalnosti za strelicu sa desne strane -->

                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Sledeca</span>

                </a>

            </div>

        </div>

    </div>

    
   <div id="hot">
       
       <div class="box">
           
           <div class="container">
               
               <div class="col-md-12">
                   
                   <h2>
                       Najnovije igračke u ponudi
                   </h2>
                   
               </div>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="content" class="container">
       
       <div class="row">
           
           <div class="col-sm-4 col-sm-6 single">
               
               <div class="product"><!-- proizvod 1 -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="slike/najboljaponuda/1.png" alt="Proizvod 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>
                           <a href="details.php">
                               Plišani medo
                           </a>
                       </h3>
                       
                       <p class="price">4900RSD</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 1 - kraj -->
               
           </div>
           
           <div class="col-sm-4 col-sm-6 single">
               
               <div class="product"><!-- proizvod 2 -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="slike/najboljaponuda/2.png" alt="proizvod 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>
                           <a href="details.php">
                              Solar energy concept house
                           </a>
                       </h3>
                       
                       <p class="price">1649.99RSD</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                  Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 2 - kraj-->
               
           </div>
           
           <div class="col-sm-4 col-sm-6 single">
               
               <div class="product"><!-- proizvod 3 -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="slike/najboljaponuda/3.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>
                           <a href="details.php">
                              Science & experiment
                           </a>
                       </h3>
                       
                       <p class="price">3000RSD</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 3 - kraj -->
               
           </div>
           
           
           </div>
           
       </div>
       
   </div>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>

</html>