<br>
<div class="col-xs-11 respuesta footer" id="respuesta">
    <div class="alert alert-warning alert-white rounded">
        <div class="icon">
        <i class="fas fa-exclamation-triangle"></i>
        </div>
        <strong id="error">ATENCIÓN: </strong>
        <?php echo $GLOBALS['error']; ?>
        <i class="icon-close fa fa-times close-icon" ></i>
    </div>
</div>

<style>
    .alert-white {
        background-image: linear-gradient(to bottom, #F5F545, #F5F545);
        border-top-color: #d8d8d8;
        border-bottom-color: #bdbdbd;
        border-left-color: #cacaca;
        border-right-color: #cacaca;
        color: #404040;
        padding-left: 61px;
        position: relative;
    }
</style>