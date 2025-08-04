<!DOCTYPE html>
<html>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?> | <?php echo get_the_title(); ?> </title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <?php wp_head(); ?>

</head>

<body class="bg-neutral-50">

    <header class="text-white p-4 py-8">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="bg-white py-2 px-4 rounded-lg shadow-lg flex justify-between items-center w-full border">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="no-underline flex justify-center items-center items-center gap-3 group">
                    <div class="relative inline-block">
                        <p class="ostcom-font text-5xl text-black">O</p>
                        <p class="ostcom-font text-5xl text-yellow-400 group-hover:text-blue-900 transition duration-700 ease-in-out absolute bottom-0 right-0 group-hover:rotate-y-360">.</p>
                    </div>
                    <h1 class="text-3xl text-black ostcom-new-font font-titilium-web no-underline font-titilium">
                        <?php bloginfo('name'); ?>
                    </h1>
                </a>
                <div class="flex items-center justify-between gap-4">
                    <nav class="space-x-4 text-black flex font-titilium-web font-open-sans uppercase ">
                        <?php
                        echo wp_nav_menu([
                            'theme_location' => 'header',
                            'container' => false,
                        ]);
                        ?>
                    </nav>
                    <div class="border border-black py-3"></div>
                    <a 
                        href="<?php echo esc_url(home_url('/')); ?>" 
                        class="no-underline text-white text-sm bg-red-700 text-white px-3 py-1.5 rounded-sm shadow-md hover:bg-red-800 transition cursor-pointer uppercase">Free estimate</a>
                </div>
            </div>
        </div>
    </header>