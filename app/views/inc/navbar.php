<!-- <body class="bg-gray-100"> -->
<?php
// var_dump($data['Categories']); 
// die;
?>
<!-- Navigation Bar -->
<nav class="bg-white shadow-lg mb-5">
    <div class="container mx-auto pl-4 pr-4 md:px-8 flex items-center justify-between">

        <!-- Logo -->
        <a href="<?= URLROOT ?>/UserController/author" class="text-lg font-bold text-gray-800">
            <img src="<?= URLROOT ?>/img/wiki-high-resolution-logo.png" alt="Logo" class="h-20 w-auto">
        </a>
        <!-- <ul class="hidden md:flex items-center space-x-4">
            <li>
                <a href="<?= URLROOT ?>/UserController/author" class="text-gray-800 text-2xl hover:text-yellow-500 ">Wiki</a>
            </li>
            <li>
                <a href="#" class="text-gray-800 text-2xl hover:text-yellow-500 ">Tag</a>
            </li>
        </ul> -->


        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-gray-800 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Search Bar -->
        <div class="hidden md:flex items-center space-x-4">
            <input type="text" placeholder="Search" id='search' class="border border-gray-600 p-2 w-80 rounded-md focus:outline-none focus:border-yellow-500">
        </div>

        <!-- <div class=" relative mx-auto text-gray-600">
        <input class="border border-gray-300 placeholder-current h-10 px-5 pr-16  rounded-lg text-sm focus:outline-none dark:bg-gray-500 dark:border-gray-50 dark:text-gray-200 " type="searchInput" id="searchInput" name="search" placeholder="search">

        <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
            <svg class="text-gray-600 dark:text-gray-200 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
            </svg>
        </button>

    </div> -->

        <!-- Add Article Button -->
        <?php
        if (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) {
            echo '<a href="' . URLROOT . '/AdminController/logout" class="hidden md:block bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Log out</a>';
        } else {
            echo '<a href="' . URLROOT . '/UserController/LoginAuthor" class="hidden md:block bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Log in</a>';
        }
        ?>



    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="md:hidden bg-white hidden">
        <!-- Mobile Menu Content -->
        <div class="flex flex-col items-center space-y-4 py-4">
            <!-- Search Bar for Mobile -->
            <div class="flex items-center w-78 space-x-4">
                <input type="text" placeholder="Search" class="border  border-gray-300 p-2 rounded-md focus:outline-none focus:border-yellow-500">
            </div>
            <!-- Navigation Links for Mobile -->
            <ul class="flex flex-col items-center space-y-4">
                <li>
                    <a href="#" class="text-gray-800 hover:text-yellow-500">Wiki</a>
                </li>
                <li>
                    <a href="#" class="text-gray-800 hover:text-yellow-500">Tag</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<!-- Your Content Goes Here -->

<!-- Add JavaScript for Mobile Menu -->
<!-- <script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script> -->





