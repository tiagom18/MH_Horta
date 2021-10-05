<?php
    session_start();
    session_destroy();

    echo '<script>window.location = "./login/screen/index.html"</script>'
?>