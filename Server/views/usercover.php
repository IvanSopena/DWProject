<?php 
require_once("Template/header.php"); 
require_once('server/models/ActionUsers.php'); ?>
<body >
<header id="main-header">
         <div class="main-header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                           data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                           aria-expanded="false" aria-label="Toggle navigation">
                           <div class="navbar-toggler-icon" data-toggle="collapse">
                              <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                              <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                              <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                           </div>
                        </a>
                        <a class="navbar-brand" href="/home"> <img class="img-fluid logo" src="public/img/tex1.png"
                           alt="streamit" /> </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                           <div class="menu-main-menu-container">
                              <ul id="top-menu" class="navbar-nav ml-auto">
                                 <li class="menu-item">
                                    <a href="index-2.html">Inicio</a>
                                 </li>
                                 <li class="menu-item">
                                    <a href="show-category.html">Series</a>
                                 </li>
                                 <li class="menu-item">
                                    <a href="movie-category.html">Peliculas</a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="mobile-more-menu">
                           <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton"
                              data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                           <i class="ri-more-line"></i>
                           </a>
                           <div class="more-menu" aria-labelledby="dropdownMenuButton">
                              <div class="navbar-right position-relative">
                                 <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                   <li>
                                       <a href="#" class="search-toggle">
                                        <i class="fa fa-search"></i>
                                       </a>
                                       <div class="search-box iq-search-bar">
                                          <form action="#" class="searchbox">
                                             <div class="form-group position-relative">
                                                <input type="text" class="text search-input font-size-12"
                                                placeholder="¿Que pelicula quiere buscar?">
                                                <i class="search-link ri-search-line"></i>
                                             </div>
                                          </form>
                                       </div>
                                    </li>
                                    <li class="nav-item nav-icon">
                                       <a href="#" class="search-toggle position-relative">
                                           <i class="fa fa-bell"></i>
                                          <span class="bg-danger dots"></span>
                                       </a>
                                       <div class="iq-sub-dropdown">
                                          <!--  <div class="iq-card shadow-none m-0">
                                             <div class="iq-card-body">
                                                <a href="#" class="iq-sub-card">
                                                   <div class="media align-items-center">
                                                      <img src="images/notify/thumb-1.jpg" class="img-fluid mr-3"
                                                         alt="streamit" />
                                                      <div class="media-body">
                                                         <h6 class="mb-0 ">Boop Bitty</h6>
                                                         <small class="font-size-12"> just now</small>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="#" class="iq-sub-card">
                                                   <div class="media align-items-center">
                                                      <img src="images/notify/thumb-2.jpg" class="img-fluid mr-3"
                                                         alt="streamit" />
                                                      <div class="media-body">
                                                         <h6 class="mb-0 ">The Last Breath</h6>
                                                         <small class="font-size-12">15 minutes ago</small>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="#" class="iq-sub-card">
                                                   <div class="media align-items-center">
                                                      <img src="images/notify/thumb-3.jpg" class="img-fluid mr-3"
                                                         alt="streamit" />
                                                      <div class="media-body">
                                                         <h6 class="mb-0 ">The Hero Camp</h6>
                                                         <small class="font-size-12">1 hour ago</small>
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                          </div>-->
                                       </div>
                                    </li>
                                    <li> 
                                       <a href="#" class="iq-user-dropdown search-toggle d-flex align-items-center">
                                       <img src="/public/img/users/no_photo.jpg" class="img-fluid avatar-40 rounded-circle"
                                          alt="user">
                                       </a>
                                       <div class="iq-sub-dropdown iq-user-dropdown">
                                          <div class="iq-card shadow-none m-0">
                                             <div class="iq-card-body p-0 pl-3 pr-3">
                                                <a href="manage-profile.html" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="fa fa-user text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">Perfil</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                               
                                               
                                                <a href="/logoff" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="fa fa-sign-out text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0">Salir</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="navbar-right menu-right">
                           <ul class="d-flex align-items-center list-inline m-0">
                               <li class="nav-item nav-icon">
                                 <a href="#" class="search-toggle device-search">
                                 <i class="fa fa-search"></i>
                                 </a>
                                 <div class="search-box iq-search-bar d-search">
                                    <form action="#" class="searchbox">
                                       <div class="form-group position-relative">
                                          <input type="text" class="text search-input font-size-12"
                                             placeholder="¿Que pelicula quiere buscar?">
                                          <i class="search-link ri-search-line"></i>
                                       </div>
                                    </form>
                                 </div>
                              </li>
                              <li class="nav-item nav-icon">
                                 <a href="#" class="search-toggle" data-toggle="search-toggle">
                                 <i class="fa fa-bell"></i>
                                    <!-- <span class="bg-danger dots"></span> -->
                                 </a>
                                 <div class="iq-sub-dropdown">
                                   <!-- <div class="iq-card shadow-none m-0">
                                       <div class="iq-card-body">
                                          <a href="#" class="iq-sub-card">
                                             <div class="media align-items-center">
                                                <img src="images/notify/thumb-1.jpg" class="img-fluid mr-3"
                                                   alt="streamit" />
                                                <div class="media-body">
                                                   <h6 class="mb-0 ">Boot Bitty</h6>
                                                   <small class="font-size-12"> just now</small>
                                                </div>
                                             </div>
                                          </a>
                                          <a href="#" class="iq-sub-card">
                                             <div class="media align-items-center">
                                                <img src="images/notify/thumb-2.jpg" class="img-fluid mr-3"
                                                   alt="streamit" />
                                                <div class="media-body">
                                                   <h6 class="mb-0 ">The Last Breath</h6>
                                                   <small class="font-size-12">15 minutes ago</small>
                                                </div>
                                             </div>
                                          </a>
                                          <a href="#" class="iq-sub-card">
                                             <div class="media align-items-center">
                                                <img src="images/notify/thumb-3.jpg" class="img-fluid mr-3"
                                                   alt="streamit" />
                                                <div class="media-body">
                                                   <h6 class="mb-0 ">The Hero Camp</h6>
                                                   <small class="font-size-12">1 hour ago</small>
                                                </div>
                                             </div>
                                          </a>
                                       </div>
                                    </div> -->
                                 </div>
                              </li>
                              <li class="nav-item nav-icon">
                                 <a href="#" class="iq-user-dropdown search-toggle p-0 d-flex align-items-center"
                                    data-toggle="search-toggle">
                                 <img src=<?php echo "/public/img/users/". $GLOBALS['sq']->getfoto(); ?> class="img-fluid avatar-40 rounded-circle" alt="user">
                                 </a>
                                 <div class="iq-sub-dropdown iq-user-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                       <div class="iq-card-body p-0 pl-3 pr-3">
                                       <a href="manage-profile.html" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="fa fa-user text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">Perfil</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                               
                                               
                                                <a href="/logoff" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="fa fa-sign-out text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0">Salir</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </nav>
                     <div class="nav-overlay"></div>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <section id="home" class="iq-main-slider p-0">
         <div id="home-slider" class="slider m-0 p-0">
         <?php 
            
            $modelo = new ActionUsers();
            $novedades = $modelo->cargaPelis(1);
            //$novedades = $modelo->getresultado();
            $i=1;
            while ($dato = $novedades->fetch()){
              echo "<div class = 'slide slick-bg s-bg-" .$i. "'>
                     <div class='container-fluid position-relative h-100'>
                        <div class='slider-inner h-100'>
                           <div class='row align-items-center  h-100'>
                              <div class='col-xl-6 col-lg-12 col-md-12'>
                               
                                    <div class='channel-logo' data-animation-in='fadeInLeft' data-delay-in='0.5'>
                                       <img src='/Public/img/tex1.png' class='c-logo' alt='streamit'>
                                    </div>
                                  
                                 <h1 class='slider-text big-title title text-uppercase' data-animation-in='fadeInLeft'
                                    data-delay-in='0.6'>" . $dato['name'] ."</h1>
                                 <div class='d-flex align-items-center' data-animation-in='fadeInUp' data-delay-in='1'>
                                    <span class='badge badge-secondary p-2'>18+</span>
                                    <span class='ml-3'>2 Seasons</span>
                                 </div>
                                 <p data-animation-in='fadeInUp' data-delay-in='1.2'>" . $dato['sinopsis'].
                                 "</p>
                                 <div class='d-flex align-items-center r-mb-23' data-animation-in='fadeInUp' data-delay-in='1.2'>
                                 <a href='".$dato['trailler']."' target='_blank' class='btn btn-hover'><i class='fa fa-play mr-2'
                                 aria-hidden='true'></i>Ver Ahora</a>
                                 <a href='". $dato['details'] ."' target='_blank' class='btn btn-link'>More details</a>
                                 </div>
                              </div>
                           </div>
                           <div class='trailor-video'>
                           <a href='". $dato['trailler'] ."'  class='video-open playbtn'>
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
                  </div>";
                  
                  $i=$i+1;
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
                        <h4 class="main-title">Mis Favoritas</h4>
                        <a href="movie-category.html" class="text-primary">Ver Todas</a>
                     </div>
                     <div class="favorites-contens">
                        <ul class="favorites-slider list-inline  row p-0 mb-0">

                        <?php 
            
            $modelo = new ActionUsers();
            $favoritas = $modelo->buscar_favoritas();
            //$favoritas = $modelo->getresultado();
            
            while ($dato = $favoritas->fetch()){
              echo " <li class='slide-item'>
              <a href='movie-details.html'>
                 <div class='block-images position-relative'>
                    <div class='img-box'>
                       <img src='". $dato['cover'] ."' class='img-fluid' alt=''>
                    </div>
                    <div class='block-description'>
                       <h6>". $dato['name'] ."</h6>
                       <div class='movie-time d-flex align-items-center my-2'>
                          <div class='badge badge-secondary p-1 mr-2'>13+</div>
                          <span class='text-white'>2h 30m</span>
                       </div>
                       <div class='hover-buttons'>
                          <span class='btn btn-hover'>
                          <i class='fa fa-play mr-1' aria-hidden='true'></i>
                          Ver Ahora
                          </span>
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
                        <h4 class="main-title">Proximos Extrenos</h4>
                        <a href="movie-category.html" class="text-primary">Ver todas</a>
                     </div>
                     <div class="upcoming-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                        <?php 
            
            $modelo = new ActionUsers();
            $estrenos = $modelo->cargaPelis(2);
            //$estrenos = $modelo->getresultado();
            
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
                          <div class='badge badge-secondary p-1 mr-2'>13+</div>
                          <span class='text-white'>2h 30m</span>
                       </div>
                       <div class='hover-buttons'>
                          <span class='btn btn-hover'>
                          <i class='fa fa-play mr-1' aria-hidden='true'></i>
                          Ver Ahora
                          </span>
                       </div>
                       <div class='block-social-info'>
                           <ul class='list-inline p-0 m-0 music-play-lists'>
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </ul>
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

         <section id="iq-topten">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title topten-title-sm">Nuestro Top 8</h4>
                     </div>
                     <div class="topten-contens">
                        <h4 class="main-title topten-title">Nuestro Top 8</h4>
                        <ul id="top-ten-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                        
                        <?php 
            
            $modelo = new ActionUsers();
            $estrenos = $modelo->cargaPelis(3);
            //$estrenos = $modelo->getresultado();

            while ($dato = $estrenos->fetch()){
               echo "<li>
                        <a href='movie-details.html'>
                           <img src='". $dato['cover'] ."' class='img-fluid w-100' alt=''>
                        </a>
                     </li>";
            }

            ?>
                        
                           
                        </ul>
                        <div class="vertical_s">
                           <ul id="top-ten-slider-nav" class="list-inline p-0 m-0  d-flex align-items-center">
                           <?php 
                        
                                    $modelo = new ActionUsers();
                                    $estrenos = $modelo->cargaPelis(3);
                                    //$estrenos = $modelo->getresultado();
                        
                                    while ($dato = $estrenos->fetch()){
                                       echo "<li>
                                       <div class='block-images position-relative'>
                                       <a href='movie-details.html'>
                                       <img src='". $dato['cover'] ."' class='img-fluid w-100' alt=''>
                                       </a>
                                       <div class='block-description'>
                                          <h5>". $dato['name'] ."</h5>
                                          <div class='movie-time d-flex align-items-center my-2'>
                                             <div class='badge badge-secondary p-1 mr-2'>10+</div>
                                             <span class='text-white'>3h 15m</span>
                                          </div>
                                          <div class='hover-buttons'>
                                             <a href='movie-details.html' class='btn btn-hover' tabindex='0'>
                                             <i class='fa fa-play mr-1' aria-hidden='true'></i> Play Now
                                             </a>
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
                        <h4 class="main-title">Tendencias</h4>
                        <a href="show-category.html" class="text-primary">Ver todas</a>
                     </div>
                     <div class="suggestede-contens">
                        <ul class="list-inline favorites-slider row p-0 mb-0">
                        <?php 
            
            $modelo = new ActionUsers();
            $estrenos =  $modelo->cargaPelis(5);
            //$estrenos = $modelo->getresultado();
            
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
                          <div class='badge badge-secondary p-1 mr-2'>13+</div>
                          <span class='text-white'>2h 30m</span>
                       </div>
                       <div class='hover-buttons'>
                          <span class='btn btn-hover'>
                          <i class='fa fa-play mr-1' aria-hidden='true'></i>
                          Ver Ahora
                          </span>
                       </div>
                       <div class='block-social-info'>
                           <ul class='list-inline p-0 m-0 music-play-lists'>
                              <li><span><i class='fa fa-heart'></i></span></li>
                           </ul>
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
      </div>
      
      <!--  -->
      <section id="parallex" class="parallax-window">
            <?php 
                  
                  $modelo = new ActionUsers();
                  $diaria = $modelo->cargaPelis(6);
                 // $diaria = $modelo->getresultado();
                  while ($dato = $diaria->fetch()){
                  echo " <div class='container-fluid h-100'>
                  <div class='row align-items-center justify-content-center h-100 parallaxt-details'>
                  
                     <div class='col-lg-4 r-mb-23'>
                        <div class='text-left'>
                        <h5 class='text-white'>Hoy Recomendamos</h6>
                           <a href='javascript:void(0);'>
                           <h1 class='slider-text big-title title text-uppercase' data-animation-in='fadeInLeft'
                           data-delay-in='0.6'>" . $dato['name'] ."</h1>
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
                              <span class='text-white ml-3'>9.2 (lmdb)</span>
                           </div>
                           <div class='movie-time d-flex align-items-center mb-3'>
                              <div class='badge badge-secondary mr-3'>13+</div>
                              <h6 class='text-white'>2h 30m</h6>
                           </div>
                           <p>". $dato['sinopsis'] ."</p>
                           <div class='parallax-buttons'>
                           <a href='".$dato['trailler']."' target='_blank' class='btn btn-hover'>Play Now</a>
                           <a href='".$dato['details']."' target='_blank' class='btn btn-link'>More details</a>
                           </div>
                        </div>
                     </div>
                     <div class='col-lg-8'>
                        <div class='parallax-img'>
                           <a href='movie-details.html'>
                              <img src='".$dato['cover']."' class='img-fluid w-100' alt='bailey'>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <style> .parallax-window { height: 100%; padding: 100px 0; position: relative; background: url('".$dato['cover']."')center center; background-size: cover; background-attachment: fixed; } </style>";
            }
            ?> 
      </section>

      <div id="back-to-top">
         <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
      </div>

      <?php require_once("Template/footernavigation.php"); ?>
      <?php require_once("Template/footer.php"); ?>
   </body>


</html>