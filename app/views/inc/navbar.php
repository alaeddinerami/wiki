<!-- <body class="bg-gray-100"> -->

<!-- Navigation Bar -->
<nav class="bg-white shadow-lg mb-5">
    <div class="container mx-auto pl-4 pr-4 md:px-8 flex items-center justify-between">

        <!-- Logo -->
        <a href="<?=URLROOT?>/UserController/author" class="text-lg font-bold text-gray-800">
            <img src="<?= URLROOT ?>/img/wiki-high-resolution-logo.png" alt="Logo" class="h-20 w-auto">
        </a>
        <ul class="hidden md:flex items-center space-x-4">
            <li>
                <a href="<?=URLROOT?>/UserController/author" class="text-gray-800 text-2xl hover:text-yellow-500 ">Wiki</a>
            </li>
            <li>
                <a href="#" class="text-gray-800 text-2xl hover:text-yellow-500 ">Tag</a>
            </li>
        </ul>
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
            <input type="text" placeholder="Search" class="border border-gray-600 p-2 w-80 rounded-md focus:outline-none focus:border-yellow-500">
        </div>

        <!-- Add Article Button -->
        <a href="<?= URLROOT ?>/AuthteurController/addwiki" class="hidden md:block bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600  ">
            Add Wiki
        </a>
        <a href="<?=URLROOT?>/AdminController/logout" class="hidden md:block bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600  ">
            Log out
        </a>
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
<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>