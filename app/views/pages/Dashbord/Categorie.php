<?php require_once APPROOT . '/views/inc/header.php'?>

<div>

   <!-- Header -->

   <!-- ./Header -->

   <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

      <!-- Statistics Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
         <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
               <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
               </svg>
            </div>
            <div class="text-right">
               <p class="text-2xl">1,257</p>
               <p>Visitors</p>
            </div>
         </div>
         <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
               <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
               </svg>
            </div>
            <div class="text-right">
               <p class="text-2xl">557</p>
               <p>Orders</p>
            </div>
         </div>
         <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
               <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
               </svg>
            </div>
            <div class="text-right">
               <p class="text-2xl">$11,257</p>
               <p>Sales</p>
            </div>
         </div>
         <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
               <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
               </svg>
            </div>
            <div class="text-right">
               <p class="text-2xl">$75,257</p>
               <p>Balances</p>
            </div>
         </div>
      </div>
      <!-- ./Statistics Cards -->


      <!-- Client Table -->
      <div class="mt-4 mx-4">
         <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
               <div class="w-full">
                  <table class="w-full">
                     <thead>
                        <h2>All categories</h2>
                        <tr class="text-xs font-semibold tracking-wide  text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 text-center">
                           <th class="px-4 py-3">ID</th>
                           <th class="px-4 py-3">Nom</th>
                           <th class="px-4 py-3">Wikis</th>
                           <th class="px-4 py-3">Actions</th>
                        </tr>
                     </thead>
                     <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php

                        // foreach ($data['category'] as $category) {
                        ?>

                           <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400 text-center">
                              <td data-key="10" class="px-4 py-3" id="categoryCellt">
                                 1
                              </td>
                              <td data-key="10" class="px-4 py-3" id="categoryCell">
                                 Sport
                              </td>
                              <td data-key="10" class="px-4 py-3" id="categoryCellt">
                                 5
                              </td>
                              <td class="px-4 py-3">
                                 <!-- Edit button -->
                                 <button class="text-blue-500 hover:underline" onclick="editCategory()">Edit</button>
                                 <!-- Delete button -->
                                 <button class="text-red-500 hover:underline ml-2" onclick="deleteCategory()">Delete</button>
                              </td>
                           </tr>

                        <?php
                        // }

                        ?>

                        <!-- Add more rows as needed -->
                     </tbody>
                  </table>

                  <!-- Modal for Edit Category -->
                  <div id="editModal" class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50">
                     <div class="flex items-center justify-center h-full">
                        <div class="bg-white p-8 rounded shadow-lg">
                           <form action="" method="POST">
                              <label for="editedCategory">Edit Category:</label>
                              <input type="text" name="categoryId" class="id" hidden>
                              <input type="text" id="editedCategory" name="categoryName" class="w-full border rounded px-3 py-2 mt-2 mb-4">
                              <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="saveEdit()">Save</button>
                              <button class="bg-gray-500 text-white px-4 py-2 rounded ml-2" onclick="closeEditModal()">Cancel</button>
                           </form>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  -->
      
      <?php require_once APPROOT . '/views/inc/footer.php'?>