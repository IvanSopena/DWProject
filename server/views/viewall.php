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
    <div class="main-content">
        <section id="iq-favorites">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <?php
                            switch ($datos) {
                                case 'fav':
                                    echo "<h1  class='main-title'>MIS FAVORITAS</h1>";
                                    break;
                                case 'est':
                                    echo "<h1   class='main-title'>TODOS LOS ESTRENOS</h1>";
                                    break;
                                case 'ten':
                                    echo "<h1  class='main-title'>TODAS LAS TENDENCIAS</h1>";
                                    break;
                                default:
                                    echo "<h1  class='main-title'>RESULTADOS DE LA BUSQUEDA</h1>";
                                    break;
                            }
                            ?>

                        </div>
                        
                        <div class="favorites-contens">

                            <ul class=" list-inline  row p-0 mb-0 ">
                                <?php
                                $modelo = new MoviesModel();

                                switch ($datos) {
                                    case 'fav':
                                        $resultados = $modelo->Carga_Favoritas(false);
                                        break;
                                    case 'est':
                                        $resultados = $modelo->Carga_Pelis(2, 0);
                                        break;
                                    case 'ten':
                                        $resultados = $modelo->Carga_Pelis(5, 0);
                                        break;
                                    default:
                                        $resultados = $modelo->BuscarPelis($datos);
                                        break;
                                }


                                while ($campo = $resultados->fetch()) {
                                    $html = "
                                                <li class='slide-item'>
                                                <a href='movie-details.html'>
                                                   <div class='block-images position-relative'>
                                                      <div class='img-box'>
                                                         <img src='/DWProject" . $campo['cover'] . "' class='img-fluid' alt=''>
                                                      </div>
                                                      <div class='block-description'>
                                                         <h6>" . $campo['name'] . "</h6>
                                                         <div class='movie-time d-flex align-items-center my-2'>
                                                            <div class='badge badge-secondary p-1 mr-2'>" . $campo['age'] . "</div>
                                                            <span class='text-white'>" . $campo['duration'] . " min</span>
                                                            <div class='block-social-info'>
                                                             <ul class='list-inline p-0 m-0 music-play-lists'> ";
                                    if ($datos === "fav") {
                                        $html = $html . "<a href='#' onclick='delfav(" . $campo['idmovie'] . "," . $GLOBALS['sq']->getMAppUserId() . ")'> 
                                                                   <li><span><i class='fa fa-trash'></i></span></li>
                                                                </a>";
                                    } else {
                                        $html = $html . "<a href='#' onclick='addfav(" . $campo['idmovie'] . "," . $GLOBALS['sq']->getMAppUserId() . ")'> 
                                                                <li><span><i class='fa fa-heart'></i></span></li>
                                                             </a>";
                                    }
                                    $html = $html . "</ul>
                                                          </div>
                                                         </div>
                                                         <div class='hover-buttons'>
                                                         <a href='#' onclick='vervideo(" . $campo['idmovie'] . ")' class='btn btn-hover'><i class='fa fa-play mr-2'
                                                                   aria-hidden='true'></i>Ver Ahora</a>
                                                         <a href='" . $campo['details'] . "' target='_blank' class='btn btn-link'>Mas detalles</a>
                                                            
                                                         </div>
                                                         
                                                    </div>
                                                </a>
                                             </li>
                                               ";
                                    echo $html;
                                }
                                ?>


                            </ul>   
                        </div> 

                    </div> 

                </div>
            </div>
    </div>
</section>
</div>

<?php require_once("shared/footernavigation.php"); ?>
<?php require_once("global/footer.php"); ?>
</body>


</html>

