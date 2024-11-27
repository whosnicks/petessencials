<footer class="shadow bg-gray-800 px-5">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8 flex justify-around">
        <div>
            <!-- <img src="" alt=""> -->
            <h1 class="text-white">LOGO</h1>
        </div>

        <div class="text-white">
            <h1 class="uppercase text-yellow-500">Legal</h1>
            <div class="flex flex-col">
                <a href="#" class="hover:text-yellow-500">Privacy Policy</a>
                <a href="#" class="hover:text-yellow-500">Licensing</a>
                <a href="#" class="hover:text-yellow-500">Terms & Conditions</a>
            </div>
        </div>
    </div>
    <hr class="pt-5">
    <div class="text-white space-x-2 text-end">
        <a href="" class="hover:text-yellow-500">
            <i class="fab fa-github fa-lg"></i>
        </a>
        <a href="" class="hover:text-yellow-500">
            <i class="fab fa-discord fa-lg"></i>
        </a>
        <a href="" class="hover:text-yellow-500">
            <i class="fab fa-whatsapp fa-lg"></i>
        </a>
        <a href="" class="hover:text-yellow-500">
            <i class="fab fa-instagram fa-lg"></i>
        </a>
        <a href="" class="hover:text-yellow-500">
            <i class="fab fa-tiktok fa-lg"></i>
        </a>
    </div>


    <div class="text-white text-end pt-5">
        <span class="text-sm sm:text-center ">© <?= date("Y"); ?> <a href="https://nickgabe.com/" class="hover:underline">NickGabe</a>. All Rights Reserved.
        </span>
    </div>
</footer>





<?php wp_footer(); ?>
</body>

</html>