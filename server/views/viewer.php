<?php 
require_once("Template/header.php"); 
require_once('server/models/ActionUsers.php'); 
echo "<body >";
require_once("Template/navigation.php"); 
 ?>

<div class="video-container iq-main-slider">
    <div class="video d-block" controls loop> 
        <iframe width=100% height= 650px src="<?php echo $datos["trailler"]; ?>" frameborder="0" allowfullscreen></iframe>
    </div> 
</div>

<div class="main-content movi">
      <section class="movie-detail container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="trending-info g-border">
                  <h1 class="trending-text big-title text-uppercase mt-0"><?php echo $datos["name"]; ?></h1>
                  <ul class="p-0 list-inline d-flex align-items-center movie-content">
                     <li class="text-white"><?php echo $datos["catdesc"]; ?></li>
                  </ul>
                  <div class="d-flex align-items-center text-white text-detail">
                     <span class="badge badge-secondary p-3"><?php echo $datos["age"]; ?></span>
                     <span class="ml-3"><?php echo $datos["duration"]; ?> min</span>
                     <span class="trending-year">2020</span>
                     <input type="text" id="idmovie" hidden value="<?php echo $datos["idmovie"]; ?>" </input>
                  </div>
                 
                  <p class="trending-dec w-100 mb-0"><?php echo $datos["sinopsis"]; ?></p>
                  <ul class="list-inline p-0 mt-4 share-icons music-play-lists">
                     <li><span><i class="fa fa-heart"></i></span></li>
                     <li class="share">
                        <span><i class="fa fa-share-alt-square"></i></span>
                        <div class="share-box">
                           <div class="d-flex align-items-center">
                              <a href="#" class="share-ico"><i class="fa fa-facebook-official"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-twitter-square"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-link"></i></a>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <section id="iq-favorites" class="s-margin">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 overflow-hidden">
                  <div class="iq-main-header d-flex align-items-center justify-content-between">
                     <h4 class="main-title">Mas peliculas como esta que estas viendo</h4>
                  </div>
                  <div class="favorites-contens">
                     <ul class="list-inline favorites-slider row p-0 mb-0">
                     <?php 
            
                        $modelo = new ActionUsers();
                        $estrenos = $modelo->cargaPelisIguales($datos["idmovie"],$datos["cat"]);
                        
                        while ($dato = $estrenos->fetch()){
                        echo " <li class='slide-item'>
                                    <a href='movie-details.html'>
                                    <div class='block-images position-relative'>
                                         <div class='img-box'>
                                            <img src='". $dato['cover'] ."' class='img-fluid' alt=''>
                                         </div>
                                        <div class='block-description'>
                                            <h6>". $dato['name'] ."</h6>
                                            <div class='movie-time d-flex align-items-center my-2'>
                                                <div class='badge badge-secondary p-1 mr-2'>" . $dato['age'] ."</div>
                                                <span class='text-white'>" . $dato['duration'] ." min</span>
                                                <div class='block-social-info'>
                                                    <ul class='list-inline p-0 m-0 music-play-lists'>
                                                        <li><span><i class='fa fa-heart'></i></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class='hover-buttons'>
                                            <a href='#' onclick='vervideo(". $dato['idmovie'] .")' class='btn btn-hover'><i class='fa fa-play mr-2'
                                            aria-hidden='true'></i>Ver Ahora</a>
                                                <a href='". $dato['details'] ."' target='_blank' class='btn btn-link'>Mas detalles</a>
                          
                                            </div>
                       
                                        </div>
                                    </a>
                                </li>";
                  
                        }
                    ?> 
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <?php require_once("Template/footernavigation.php"); ?>
      <?php require_once("Template/footer.php"); ?>
   </body>


</html>