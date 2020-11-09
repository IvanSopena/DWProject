


<div class="col-xs-11" id="respuesta">
    <div class="main-alert">
        <i class="icono  text-white float-left fa fa-times-circle"></i>
        <div class="alert">
            <span class="texto">  <?php echo $GLOBALS['error']; ?></span>
            <i class="icon-close fa fa-times close-icon"></i>
        </div>
    </div>
</div>
<script>
    var closesIcon = document.querySelectorAll('.icon-close');

    closesIcon.forEach(function(closeIcon) {
        closeIcon.addEventListener('click', function() {
            this.parentNode.parentNode.classList.add('d-none');
        });
    });
</script>
<style>
    .main-alert {
        width: 150%;
        height: 100px;
        border-color: black;
        border-width: 1px;
        border-style: solid;
        /*background-color: #ffff;*/
        border-color: #FAB19B;
        background-image: linear-gradient(to bottom, #FAB19B, #FAB19B);
        position: relative;
        margin: 20px 0;
    }

    .icono {
        color:black;
        padding-left: 10px;
        padding-bottom: 12px;
        padding-right: 10px;
        padding-top: 22px;
        font-size: 36px;
    }
</style>

