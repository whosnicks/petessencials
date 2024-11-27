<?php
// TODO: Refactor
// Get animal CPT terms

$terms = get_terms([
    'taxonomy' => 'animal_category',
    'orderby'  => 'name',
    'order'    => 'ASC',
    'hide_empty' => true,
]);

$valid_terms = [];
foreach ($terms as $term) {
    $args = [
        'post_type' => 'animal',
        'posts_per_page' => 5, // FIXME
        'tax_query' => [
            [
                'taxonomy' => 'animal_category',
                'field' => 'id',
                'terms' => $term->term_id,
            ]
        ]
    ];

    $term_query = new WP_Query($args);
    if ($term_query->have_posts()) {
        $valid_terms[] = $term;
    }
}

$default_tab = !empty($valid_terms) ? $valid_terms[0]->term_id : null;
?>

<!-- Adopt section -->
<section class="bg-gray-200 h-full py-5 flex flex-col items-center gap-y-5">
    <h1 class="text-7xl font-bold text-center pt-5"><span class="text-yellow-500">Adopt</span> campaign</h1>
    <p class="text-lg text-center p-4"> Adopt a dog or cat and we'll provide 6 months of vet assistante and food. <a href=""><small class="text-blue-600">Check rules</small></a></p>

    <!-- Tab component -->
    <div class="font-sans flex w-full items-center justify-center">
        <div x-data="{ openTab: <?= $default_tab ?> }" class="p-8 w-full">
            <div class="mx-auto">
                <!-- Tabs -->
                <div class="max-w-md mx-auto mb-4 flex flex-wrap space-x-4 p-2 bg-white rounded-lg shadow-md">
                    <?php
                    if (!empty($valid_terms)) :
                        foreach ($valid_terms as $term) :
                    ?>
                            <button
                                x-on:click="openTab = <?= $term->term_id ?>"
                                :class="{ 'bg-yellow-500 text-white': openTab === <?= $term->term_id ?> }"
                                class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-yellow transition-all duration-300">
                                <?= $term->name ?>
                            </button>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <?php
                // Loop trhough not empty categories
                if (!empty($valid_terms)) :
                    foreach ($valid_terms as $term) :
                ?>
                        <div class="flex gap-5 flex-wrap justify-center">


                            <?php
                            $args = [
                                'post_type' => 'animal',
                                'posts_per_page' => 4,
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'animal_category',
                                        'field' => 'id',
                                        'terms' => $term->term_id,
                                    ]
                                ]
                            ];
                            $term_query = new WP_Query($args);
                            if ($term_query->have_posts()) :
                                while ($term_query->have_posts()) :
                                    $term_query->the_post();

                                    $post_id = get_the_ID();
                                    $meta_name = get_post_meta(get_the_ID(), "_animal_name", true);
                                    $meta_age = get_post_meta(get_the_ID(), "_animal_age", true);
                                    $meta_breed = get_post_meta(get_the_ID(), "_animal_breed", true);
                                    $meta_comments = get_post_meta(get_the_ID(), "_animal_comments", true);
                                    $thumbnail_url = get_the_post_thumbnail_url()
                                        ? get_the_post_thumbnail_url()
                                        : "https://www.scripps.org/sparkle-assets/preview_thumbnails/news_items/7021/default-248f647b69eb4b8945032a98962055a4.jpg";

                            ?>
                                    <!-- Display cards -->
                                    <div x-show="openTab === <?= $term->term_id ?>" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-yellow-600">
                                        <div class="">
                                            <h2 class="text-2xl font-semibold mb-2 text-yellow-600"><?= $meta_name ?></h2>
                                            <img src="<?= $thumbnail_url ?>" alt="" class="w-72 h-60">
                                            <div class="py-3 max-w-56">
                                                <p> <span class="font-semibold">Age:</span> <?= $meta_age ?></p>
                                                <p> <span class="font-semibold">Breed:</span> <?= $meta_breed ?></p>
                                            </div>
                                            <div class="flex align-bottom">
                                                <button class="px-6 py-2 mx-auto focus:ring focus:border-yellow-400 rounded text-gray-900 font-medium">Details</button>
                                                <button class="px-6 py-2 mx-auto bg-yellow-500 focus:ring focus:border-yellow-400 rounded text-gray-900 font-medium">Adopt</button>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <button class="px-6 py-3 bg-yellow-500 focus:ring focus:border-yellow-400 rounded text-gray-900 font-semibold">See more</button>
</section>