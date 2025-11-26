    <?php
    if (PHP_INT_SIZE === 4) {
        echo "PHP is running in 32-bit (x86) mode.";
    } elseif (PHP_INT_SIZE === 8) {
        echo "PHP is running in 64-bit (x64) mode.";
    } else {
        echo "Unable to determine PHP architecture.";
    }
    ?>