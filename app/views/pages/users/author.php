<?php
$nosidebar = '';
require_once APPROOT . '/views/inc/header.php';
?>



<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden">

  <div class="p-6">
    <a href="#" class="text-2xl font-bold text-gray-900 dark:text-white hover:underline">Noteworthy Technology Acquisitions 2021</a>
    <p class="mt-2 text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    <div class="flex items-center space-x-2 mt-3 text-gray-500">
      <span>Category:</span>
      <span>Technology</span>
    </div>
    <div class="flex items-center space-x-2 mt-1 text-gray-500">
      <span>Tags:</span>
      <span>Tag1, Tag2, Tag3</span>
    </div>
    <a href="#" class="inline-flex items-center mt-3 text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded-md px-4 py-2 transition duration-300 ease-in-out transform hover:scale-105">
      Read more
      <svg class="rtl:rotate-180 w-4 h-4 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
      </svg>
    </a>
  </div>

  <div class="flex justify-evenly py-3 bg-gray-100 dark:bg-gray-700">
    <button class="bg-blue-500 w-20 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 transition duration-300 ease-in-out transform hover:scale-105">
      Edit
    </button>
    <button class="bg-red-500 w-20 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:border-red-300 transition duration-300 ease-in-out transform hover:scale-105">
      Delete
    </button>
  </div>

</div>


<?php require_once APPROOT . '/views/inc/footer.php' ?>