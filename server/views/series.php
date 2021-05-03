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


    <br>
    <br>
    <br>
    <br>
    <br>
    <h1  class='main-title'>NUESTRO CATALOGO DE PELICULAS</h1>
    <br>
    <br>
    <section id="iq-upcoming-movie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h2 class="main-title">COMEDIA</h2>

                    </div>
                    <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                            <?php
                            $modelo = new MoviesModel();
                            $datos = $modelo->carga_por_categoria(1, 2);


                            while ($dato = $datos->fetch()) {
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

    <section id="iq-upcoming-movie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h2 class="main-title">ROMANTICAS</h2>
                    </div>
                    <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                            <?php
$modelo = new MoviesModel();
$datos = $modelo->carga_por_categoria(2, 2);


while ($dato = $datos->fetch()) {
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

    <section id="iq-upcoming-movie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h2 class="main-title">TERROR</h2>

                    </div>
                    <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                            <?php
$modelo = new MoviesModel();
$datos = $modelo->carga_por_categoria(3, 2);


while ($dato = $datos->fetch()) {
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

    <section id="iq-upcoming-movie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h2 class="main-title">DRAMA</h2>
                    </div>
                    <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                            <?php
$modelo = new MoviesModel();
$datos = $modelo->carga_por_categoria(4, 2);


while ($dato = $datos->fetch()) {
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
    <section id="iq-upcoming-movie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h2 class="main-title">INFANTILES</h2>

                    </div>
                    <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                            <?php
$modelo = new MoviesModel();
$datos = $modelo->carga_por_categoria(5, 2);


while ($dato = $datos->fetch()) {
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

    <section id="iq-upcoming-movie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h2 class="main-title">FANTASIA</h2>

                    </div>
                    <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                            <?php
$modelo = new MoviesModel();
$datos = $modelo->carga_por_categoria(6, 2);


while ($dato = $datos->fetch()) {
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

    <section id="iq-upcoming-movie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h2 class="main-title">THILLER</h2>
                    </div>
                    <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                            <?php
$modelo = new MoviesModel();
$datos = $modelo->carga_por_categoria(7, 2);


while ($dato = $datos->fetch()) {
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

    <section id="iq-upcoming-movie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h2 class="main-title">DOCUMENTALES</h2>

                    </div>
                    <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                            <?php
$modelo = new MoviesModel();
$datos = $modelo->carga_por_categoria(8, 2);


while ($dato = $datos->fetch()) {
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

    <section id="iq-upcoming-movie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h2 class="main-title">BELICAS</h2>

                    </div>
                    <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                            <?php
$modelo = new MoviesModel();
$datos = $modelo->carga_por_categoria(10, 2);


while ($dato = $datos->fetch()) {
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

    <section id="iq-upcoming-movie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h2 class="main-title">CIENCIA FICCIÓN</h2>

                    </div>
                    <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                            <?php
                            $modelo = new MoviesModel();
                            $datos = $modelo->carga_por_categoria(11, 2);


                            while ($dato = $datos->fetch()) {
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




    <div id="back-to-top">
        <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
    </div>

    <?php require_once("shared/footernavigation.php"); ?>
    <?php require_once("global/footer.php"); ?>
</body>

</html>