

<div id="toast-container" class="toast-bottom-center">
    <div class="toast toast-warning" aria-live="polite" style="display: block;">
        <button type="button" class="toast-close-button icon-close" role="button">×</button>
        <div class="toast-title">¡¡ATENCIÓN!!</div>
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