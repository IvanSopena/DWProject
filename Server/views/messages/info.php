<div class="col-xs-11" id="respuesta">
    <div class="main-alert">
        <i class="icono  text-white float-left fa fa-info-circle"></i>
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
        width: 750px;
        height: 60px;
        border-color: black;
        border-width: 1px;
        border-style: solid;
        /* background-color: #ffff; */
        border-color: #3a8ace;
        background-image: linear-gradient(to bottom, #82ACF5, #82ACF5);
        position: relative;
        margin: 20px 0;
    }

    .icono {
        padding-left: 10px;
        padding-bottom: 12px;
        padding-right: 10px;
        padding-top: 13px;
        font-size: 36px;
    }
</style>