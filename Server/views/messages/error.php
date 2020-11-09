<br>
<div class="col-xs-11 respuesta footer" id="respuesta" >
    <div class="alert alert-danger alert-white rounded">
        <div class="icon">
            <i class="fas fa-times-circle"></i>
        </div>
        <strong id="error">ERROR: </strong>
        <?php echo $GLOBALS['error']; ?>
        <i class="icon-close fa fa-times close-icon" ></i>
    </div>
</div>
<style>
    .alert-white {
        background-image: linear-gradient(to bottom, #FAB19B, #FAB19B);
        /*background-image: linear-gradient(to bottom, #fff, #f9f9f9); original blanco*/
        border-top-color: #d8d8d8;
        border-bottom-color: #bdbdbd;
        border-left-color: #cacaca;
        border-right-color: #cacaca;
        color: #404040;
        padding-left: 61px;
        position: relative;
    }
</style>

