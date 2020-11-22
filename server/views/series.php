<?php 
require_once("Template/header.php"); 
require_once('server/models/ActionUsers.php'); ?>

<body>

    <?php 
require_once("Template/navigation.php"); 

$temp = "".$GLOBALS['error']; 
if ($temp != "") {    
   switch ($GLOBALS['tipo']) {
      case 'info':
          require_once  'Server/views/messages/info.php';
          break;
          case 'error':
              require_once  'Server/views/messages/error.php';
          break;
          case 'warning':
              require_once  'Server/views/messages/warning.php';
          break;
          case 'ok':
              require_once  'Server/views/messages/success.php';
          break;
  }
 }

?>

<br>
<br>
<br>
<br>
<br>

<section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">SERIES DE COMEDIA</h4>
                           
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <?php 
            
            $modelo = new ActionUsers();
            $datos = $modelo->carga_por_categoria(1,2);
            
            
            while ($dato = $datos->fetch()){
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
                           <a href='#' onclick='addfav(". $dato['idmovie'] .",". $GLOBALS['sq']->getMAppUserId() .")'> 
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </a>
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

<section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">SERIES ROMANTICAS</h4>
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <?php 
            
            $modelo = new ActionUsers();
            $datos = $modelo->carga_por_categoria(2,2);
            
            
            while ($dato = $datos->fetch()){
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
                           <a href='#' onclick='addfav(". $dato['idmovie'] .",". $GLOBALS['sq']->getMAppUserId() .")'> 
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </a>
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

<section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">SERIES DE TERROR</h4>
                           
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <?php 
            
            $modelo = new ActionUsers();
            $datos = $modelo->carga_por_categoria(3,2);
            
            
            while ($dato = $datos->fetch()){
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
                           <a href='#' onclick='addfav(". $dato['idmovie'] .",". $GLOBALS['sq']->getMAppUserId() .")'> 
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </a>
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

<section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">SERIES DE DRAMA</h4>
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <?php 
            
            $modelo = new ActionUsers();
            $datos = $modelo->carga_por_categoria(4,2);
            
            
            while ($dato = $datos->fetch()){
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
                           <a href='#' onclick='addfav(". $dato['idmovie'] .",". $GLOBALS['sq']->getMAppUserId() .")'> 
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </a>
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
<section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">SERIES INFANTILES</h4>
                           
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <?php 
            
            $modelo = new ActionUsers();
            $datos = $modelo->carga_por_categoria(5,2);
            
            
            while ($dato = $datos->fetch()){
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
                           <a href='#' onclick='addfav(". $dato['idmovie'] .",". $GLOBALS['sq']->getMAppUserId() .")'> 
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </a>
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

<section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">SERIES DE FANTASIA</h4>
                            
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <?php 
            
            $modelo = new ActionUsers();
            $datos = $modelo->carga_por_categoria(6,2);
            
            
            while ($dato = $datos->fetch()){
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
                           <a href='#' onclick='addfav(". $dato['idmovie'] .",". $GLOBALS['sq']->getMAppUserId() .")'> 
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </a>
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

<section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">SERIES DE THILLER</h4>
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <?php 
            
            $modelo = new ActionUsers();
            $datos = $modelo->carga_por_categoria(7,2);
            
            
            while ($dato = $datos->fetch()){
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
                           <a href='#' onclick='addfav(". $dato['idmovie'] .",". $GLOBALS['sq']->getMAppUserId() .")'> 
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </a>
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

<section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">SERIES DE DOCUMENTALES</h4>
                            
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <?php 
            
            $modelo = new ActionUsers();
            $datos = $modelo->carga_por_categoria(8,2);
            
            
            while ($dato = $datos->fetch()){
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
                           <a href='#' onclick='addfav(". $dato['idmovie'] .",". $GLOBALS['sq']->getMAppUserId() .")'> 
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </a>
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

<section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">SERIES BELICAS</h4>
                            
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <?php 
            
            $modelo = new ActionUsers();
            $datos = $modelo->carga_por_categoria(10,2);
            
            
            while ($dato = $datos->fetch()){
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
                           <a href='#' onclick='addfav(". $dato['idmovie'] .",". $GLOBALS['sq']->getMAppUserId() .")'> 
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </a>
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

<section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">SERIES DE CIENCIA FICCIÓN</h4>
                            
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <?php 
            
            $modelo = new ActionUsers();
            $datos = $modelo->carga_por_categoria(11,2);
            
            
            while ($dato = $datos->fetch()){
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
                           <a href='#' onclick='addfav(". $dato['idmovie'] .",". $GLOBALS['sq']->getMAppUserId() .")'> 
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </a>
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




<div id="back-to-top">
        <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
    </div>

    <?php require_once("Template/footernavigation.php"); ?>
    <?php require_once("Template/footer.php"); ?>
</body>

</html>