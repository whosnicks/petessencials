<?php
$args = [
    'theme_location' => 'primary_menu',
    'items_wrap' => '%3$s',
    'container' => true,
    'menu_class' => 'flex space-x-4',
];
?>
<nav class="absolute top-0 w-full bg-opacity-50 bg-black text-white z-999">
    <div class="container mx-auto flex justify-between items-center p-4">
        <h1 class="text-lg font-bold">LOGO</h1>
        <ul class="flex space-x-4">
            <?php
            wp_nav_menu($args)
            ?>
        </ul>
    </div>
</nav>