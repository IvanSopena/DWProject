<?php
require_once("global/header.php");
require_once('server/models/MoviesModel.php');
?>

<body>

    <?php
    require_once("shared/navigation.php");

    if (isset($GLOBALS['error'])) 
    { 
        echo " <script>
                       toastr.".$GLOBALS['type']."('".$GLOBALS['error']."','STREAMING MOVIES',{
                          'closeButton': true,
                          'preventDuplicates': false,
                          'progressBar': false,
                          'positionClass': 'toast-bottom-full-width'
                    });
                 </script>";
                 
        $GLOBALS['error'] = "";
    }
    ?>

    <section id="home" class="iq-main-slider p-0">
        <div id="home-slider" class="slider m-0 p-0">
            <?php
            $modelo = new MoviesModel();
            $novedades = $modelo->Carga_Pelis(1, 5);
            $i = 1;
            while ($dato = $novedades->fetch()) {
                echo "<div class = 'slide slick-bg s-bg-" . $i . "'>
                     <div class='container-fluid position-relative h-100'>
                        <div class='slider-inner h-100'>
                           <div class='row align-items-center  h-100'>
                              <div class='col-xl-6 col-lg-12 col-md-12'>
                               
                                    <div class='channel-logo' data-animation-in='fadeInLeft' data-delay-in='0.5'>
                                       <img src='/DWProject/Public/img/tex1.png' class='c-logo' alt='streamit'>
                                    </div>
                                    
                                 <h1 class='slider-text big-title title text-uppercase' id='title' data-animation-in='fadeInLeft'
                                    data-delay-in='0.6'>" . $dato['name'] . "</h1>
                                    
                                 <div class='d-flex align-items-center' data-animation-in='fadeInUp' data-delay-in='1'>
                                    <span class='badge badge-secondary p-2'>" . $dato['age'] . "</span>
                                    <span class='ml-3 text-white'>" . $dato['duration'] . " min</span>
                                 </div>
                                 <p data-animation-in='fadeInUp' data-delay-in='1.2'>" . $dato['sinopsis'] .
                "</p>
                                 <div class='d-flex align-items-center r-mb-23' data-animation-in='fadeInUp' data-delay-in='1.2'>
                                 <a href='#' onclick='vervideo(" . $dato['idmovie'] . ")' class='btn btn-hover'><i class='fa fa-play mr-2'
                                 aria-hidden='true'></i>Ver Ahora</a>
                                 <a href='" . $dato['details'] . "' target='_blank' class='btn btn-link'>Mas detalles</a>
                                 </div>
                              </div>
                           </div>
                           <div class='trailor-video'>
                           <a href='" . $dato['trailler'] . "'  class='video-open playbtn'>
                                 <svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'
                                    x='0px' y='0px' width='80px' height='80px' viewBox='0 0 213.7 213.7'
                                    enable-background='new 0 0 213.7 213.7' xml:space='preserve'>
                                    <polygon class='triangle' fill='none' stroke-width='7' stroke-linecap='round'
                                       stroke-linejoin='round' stroke-miterlimit='10'
                                       points='73.5,62.5 148.5,105.8 73.5,149.1 ' />
                                    <circle class='circle' fill='none' stroke-width='7' stroke-linecap='round'
                                       stroke-linejoin='round' stroke-miterlimit='10' cx='106.8' cy='106.8' r='103.3' />
                                 </svg>
                                 <span class='w-trailor'>Ver Trailer</span>
                              </a>
                           </div>
                        </div>
                     </div>
                     <style>
                     #home-slider .slick-bg.s-bg-" . $i . " { background-image: url(/DWproject" . $dato['cover'] . "); }
               </style>
                  </div>";
                 
                $i = $i + 1;
            }
            ?>

        </div>

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle"
                fill="none" stroke="currentColor">
                <circle r="20" cy="22" cx="22" id="test"></circle>
            </symbol>
        </svg>
    </section>

    <div class="main-content">
        <section id="iq-favorites">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">MIS 5 FAVORITAS</h4>
                            <a href="#" onclick="viewall('fav')" class="text-primary">Ver Todas las Favoritas</a>
                        </div>
                        <div class="favorites-contens">
                            <ul class="favorites-slider list-inline  row p-0 mb-0">

                                <?php
$modelo = new MoviesModel();
$favoritas = $modelo->Carga_Favoritas(true);


while ($dato = $favoritas->fetch()) {
    echo " <li class='slide-item'>
              <a href='movie-details.html'>
                 <div class='block-images position-relative'>
                    <div class='img-box'>
                       <img src='/DWProject" . $dato['cover'] . "' class='img-fluid' alt=''>
                    </div>
                    <div class='block-description'>
                       <h6>" . $dato['name'] . "</h6>
                       <div class='movie-time d-flex align-items-center my-2'>
                          <div class='badge badge-secondary p-1 mr-2'>" . $dato['age'] . "</div>
                          <span class='text-white'>" . $dato['duration'] . " min</span>
                       </div>
                       <div class='hover-buttons'>
                       <a href='#' onclick='vervideo(" . $dato['idmovie'] . ")' class='btn btn-hover'><i class='fa fa-play mr-2'
                       aria-hidden='true'></i>Ver Ahora</a>
                       </div>
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
        <section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">TOP 5 PROXIMOS ESTRENOS</h4>
                            <a href="#" onclick="viewall('est')" class="text-primary">Ver todos los Estrenos</a>
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <?php
$modelo = new MoviesModel();
$estrenos = $modelo->Carga_Pelis(2, 5);


while ($dato = $estrenos->fetch()) {
    echo " <li class='slide-item'>
              <a href='movie-details.html'>
                 <div class='block-images position-relative'>
                    <div class='img-box'>
                       <img src='/DWProject" . $dato['cover'] . "' class='img-fluid' alt=''>
                    </div>
                    <div class='block-description'>
                       <h6>" . $dato['name'] . "</h6>
                       <div class='movie-time d-flex align-items-center my-2'>
                          <div class='badge badge-secondary p-1 mr-2'>" . $dato['age'] . "</div>
                          <span class='text-white'>" . $dato['duration'] . " min</span>
                          <div class='block-social-info'>
                           <ul class='list-inline p-0 m-0 music-play-lists'>
                           <a href='#' onclick='addfav(" . $dato['idmovie'] . "," . $GLOBALS['sq']->getMAppUserId() . ")'> 
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </a>
                           </ul>
                        </div>
                       </div>
                       <div class='hover-buttons'>
                       <a href='#' onclick='vervideo(" . $dato['idmovie'] . ")' class='btn btn-hover'><i class='fa fa-play mr-2'
                                 aria-hidden='true'></i>Ver Ahora</a>
                       <a href='" . $dato['details'] . "' target='_blank' class='btn btn-link'>Mas detalles</a>
                          
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

        <section id="iq-topten">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title topten-title-sm">NUESTRO TOP 10</h4>
                        </div>
                        <div class="topten-contens">
                            <h4 class="main-title topten-title">NUESTRO TOP 10</h4>
                            <ul id="top-ten-slider" class="list-inline p-0 m-0  d-flex align-items-center">

                                <?php
$modelo = new MoviesModel();
$estrenos = $modelo->Carga_Pelis(3, 10);


while ($dato = $estrenos->fetch()) {
    echo "<li>
                        <a href='movie-details.html'>
                           <img src='/DWProject" . $dato['cover'] . "' class='img-fluid w-100' alt=''>
                        </a>
                     </li>";
}
?>
                            </ul>
                            <div class="vertical_s">
                                <ul id="top-ten-slider-nav" class="list-inline p-0 m-0  d-flex align-items-center">
                                    <?php
                                $modelo = new MoviesModel();
                                $estrenos = $modelo->Carga_Pelis(3, 10);


                                while ($dato = $estrenos->fetch()) {
                                    echo "<li>
                                       <div class='block-images position-relative'>
                                       <a href='movie-details.html'>
                                       <img src='/DWProject" . $dato['cover'] . "' class='img-fluid w-100' alt=''>
                                       </a>
                                       <div class='block-description'>
                                          <h5>" . $dato['name'] . "</h5>
                                          <div class='movie-time d-flex align-items-center my-2'>
                                             <div class='badge badge-secondary p-1 mr-2'>" . $dato['age'] . "</div>
                                             <span class='text-white'>" . $dato['duration'] . " min</span>
                                          </div>
                                          <div class='hover-buttons'>
                                          <a href='#' onclick='vervideo(" . $dato['idmovie'] . ")' class='btn btn-hover'><i class='fa fa-play mr-2'
                                 aria-hidden='true'></i>Ver Ahora</a>
                                          <a href='" . $dato['details'] . "' target='_blank' class='btn btn-link'>Mas detalles</a>
                                          </div>
                                       </div>
                                    </div>
                                 </li>";
                                }
                                ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="iq-suggestede" class="s-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">TOP 5 EN TENDENCIAS</h4>
                            <a href="#" onclick="viewall('ten')" class="text-primary">Ver todas las Tendencias</a>
                        </div>
                        <div class="suggestede-contens">
                            <ul class="list-inline favorites-slider row p-0 mb-0">
                                <?php
$modelo = new MoviesModel();
$estrenos = $modelo->Carga_Pelis(5, 5);


while ($dato = $estrenos->fetch()) {
    echo " <li class='slide-item'>
              <a href='movie-details.html'>
                 <div class='block-images position-relative'>
                    <div class='img-box'>
                       <img src='/DWProject" . $dato['cover'] . "' class='img-fluid' alt=''>
                    </div>
                    <div class='block-description'>
                       <h6>" . $dato['name'] . "</h6>
                       <div class='movie-time d-flex align-items-center my-2'>
                          <div class='badge badge-secondary p-1 mr-2'>" . $dato['age'] . "</div>
                          <span class='text-white'>" . $dato['duration'] . " min</span>
                          <div class='block-social-info'>
                           <ul class='list-inline p-0 m-0 music-play-lists'>

                           <a href='#' onclick='addfav(" . $dato['idmovie'] . "," . $GLOBALS['sq']->getMAppUserId() . ")'> 

                              <li><span><i class='fa fa-heart'></i></span></li>
                           </ul>
                        </div>
                       </div>
                       <div class='hover-buttons'>
                       <a href='#' onclick='vervideo(" . $dato['idmovie'] . ")' class='btn btn-hover'><i class='fa fa-play mr-2'
                       aria-hidden='true'></i>Ver Ahora</a>
                       <a href='" . $dato['details'] . "' target='_blank' class='btn btn-link'>Mas detalles</a>
                          
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
    </div>


    <section id="parallex" class="parallax-window">
        <?php
                                $modelo = new MoviesModel();
                                $diaria = $modelo->Carga_Pelis(6, 1);

                                while ($dato = $diaria->fetch()) {
                                    echo " <div class='container-fluid h-100'>
                  <div class='row align-items-center justify-content-center h-100 parallaxt-details'>
                  
                     <div class='col-lg-4 r-mb-23'>
                        <div class='text-left'>
                        <h5 class='text-white'>Hoy Recomendamos</h6>
                           <a href='javascript:void(0);'>
                           <h1 class='slider-text big-title title text-uppercase' data-animation-in='fadeInLeft'
                           data-delay-in='0.6'>" . $dato['name'] . "</h1>
                           </a>
                           <div class='parallax-ratting d-flex align-items-center mt-3 mb-3'>
                              <ul
                                 class='ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left'>
                                 <li><a href='javascript:void(0);' class='text-primary'><i class='fa fa-star'
                                    aria-hidden='true'></i></a></li>
                                 <li><a href='javascript:void(0);' class='pl-2 text-primary'><i class='fa fa-star'
                                    aria-hidden='true'></i></a></li>
                                 <li><a href='javascript:void(0);' class='pl-2 text-primary'><i class='fa fa-star'
                                    aria-hidden='true'></i></a></li>
                                 <li><a href='javascript:void(0);' class='pl-2 text-primary'><i class='fa fa-star'
                                    aria-hidden='true'></i></a></li>
                                 <li><a href='javascript:void(0);' class='pl-2 text-primary'><i class='fa fa-star-half-o'
                                    aria-hidden='true'></i></a></li>
                              </ul>
                              <span class='text-white ml-3'>4.5</span>
                           </div>
                           <div class='movie-time d-flex align-items-center mb-3'>
                              <div class='badge badge-secondary mr-3'>" . $dato['age'] . "</div>
                              <h6 class='text-white'>" . $dato['duration'] . " min</h6>
                           </div>
                           <p>" . $dato['sinopsis'] . "</p>
                           <div class='parallax-buttons'>
                           <a href='#' onclick='vervideo(" . $dato['idmovie'] . ")' class='btn btn-hover'><i class='fa fa-play mr-2'
                           aria-hidden='true'></i>Ver Ahora</a>
                           <a href='" . $dato['details'] . "' target='_blank' class='btn btn-link'>Mas Detalles</a>
                           </div>
                        </div>
                     </div>
                     <div class='col-lg-8'>
                        <div class='parallax-img'>
                           <a href='movie-details.html'>
                              <img src='/DWProject" . $dato['cover'] . "' class='img-fluid w-100' alt='bailey'>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <style> .parallax-window { height: 100%; padding: 100px 0; position: relative; background: url('/DWProject" . $dato['cover'] . "')center center; background-size: cover; background-attachment: fixed; } </style>";
                                }
                                ?>
    </section>

    <div id="back-to-top">
        <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
    </div>



    <?php require_once("shared/footernavigation.php"); ?>
    <?php require_once("global/footer.php"); ?>
</body>


</html>