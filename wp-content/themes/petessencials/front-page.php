<?php get_header() ?>

<!-- Section container -->
<div class="relative h-screen bg-cover bg-center">
    <!-- Background Image with filter -->
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="absolute inset-0 bg-hero-pattern bg-cover bg-center opacity-40"></div>

    <!-- Navbar -->
    <?php
    get_template_part('partials/header_menu', 'header_menu')
    ?>

    <!-- Hero Section -->
    <!-- FIXME: relative is breaking the menu -->
    <section class="relative flex items-center justify-center h-full text-center text-white z-10">
        <div>
            <h1 class="text-7xl font-bold"><span class="text-yellow-500">Pet</span> Essentials</h1>
            <p class="mt-4 text-xl font-bold">Delivered at the confort of your home</p>
            <button class="mt-6 px-6 py-3 bg-yellow-500 focus:ring focus:border-yellow-400 rounded text-gray-900 font-semibold">Explore our procuts</button>
        </div>
    </section>
</div>

<!-- Products section -->
<section class="bg-gray-200 h-screen">
    <div class="pt-5">
        <h1 class="text-7xl font-bold text-center"><span class="text-yellow-500">Our</span> Products</h1>
    </div>
</section>


<!-- About section -->
<!-- TODO: It's switched????? -->
<section class="bg-gray-800 h-screen flex flex-row justify-around items-center overflow-hidden relative">
    <!-- Image: absolute position on mobile screens only -->
    <div class="w-full h-full opacity-20 sm:absolute sm:top-0 sm:left-0 sm:z-0">
        <img src="https://cdn.britannica.com/34/235834-050-C5843610/two-different-breeds-of-cats-side-by-side-outdoors-in-the-garden.jpg" alt="" class="h-full w-full object-cover">
    </div>

    <!-- Text: ensures text appears above the image on mobile -->
    <div class="text-white lg:w-3/4 p-5 flex flex-col items-center gap-y-5 sm:relative sm:z-10">
        <h1 class="text-7xl font-bold text-white"><span class="text-yellow-500">About</span> Us</h1>
        <p class="lg:w-2/3 sm:w-full text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae unde blanditiis molestiae sequi esse corporis et nobis ipsam eum voluptatem iure obcaecati nihil, officia omnis vel nemo impedit id illo. Corrupti expedita ea quod quibusdam sed, itaque nostrum eos officia, autem reprehenderit aliquid, quaerat debitis accusantium maxime natus earum voluptas eius veritatis illum in ut quam libero deserunt. Numquam laudantium illo temporibus praesentium delectus tenetur dolorem optio recusandae inventore exercitationem, soluta similique ea asperiores libero aperiam? Aliquam magnam dolorem architecto, nam quisquam dolorum dolore. Sit, tempora! Earum, tenetur aspernatur, rem sapiente voluptatem totam quia excepturi illum nihil eveniet, harum amet!
        </p>
        <button class="mt-6 px-6 py-3 bg-yellow-500 focus:ring focus:border-yellow-400 rounded text-gray-900 font-semibold">Read more</button>
    </div>
</section>




<!-- Campaign -->
<?php
get_template_part('partials/adopt_campaign', 'adopt')
?>
<?php
// get_template_part('partials/vaccine_campaign', 'vaccine')
?>

<?php get_footer();
