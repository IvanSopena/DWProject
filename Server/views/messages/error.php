
<div id="toast-container" class="toast-bottom-full-width"> <!-- bottom-center  toast-top-right    toast-bottom-full-width-->
    <div class="toast toast-error" aria-live="assertive" style="display: block;">
        <button type="button" class="toast-close-button icon-close" role="button">×</button>
        <div class="toast-title">ERROR</div>
        <div class="toast-message"><?php echo $GLOBALS['error']; ?></div>
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
