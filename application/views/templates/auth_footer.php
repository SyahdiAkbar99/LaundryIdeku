<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script>
    $("body").on('click', '.toggle-password1', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#password1");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

    });
    $("body").on('click', '.toggle-password2', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#password2");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

    });
    $("body").on('click', '.toggle-id-entitas', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#id_entitas");
        if (input.attr("type") === "password") {
            input.attr("type", "number");
        } else {
            input.attr("type", "password");
        }

    });
    $("body").on('click', '.toggle-login', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#password-login");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

    });
</script>
</body>

</html>