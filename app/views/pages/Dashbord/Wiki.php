<?php 
 $nonavbar=''; 
require_once APPROOT . '/views/inc/header.php' ?>

<div>

    <!-- Header -->

    <!-- ./Header -->

    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

        <!-- Statistics Cards -->

        <!-- ./Statistics Cards -->


        


        <!-- Client Table -->
        <div class="mt-4 mx-4">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <div class="w-full">
                        <table class="w-full">
                            <thead>
                                <h2>All Wikis</h2>
                                <tr class="text-xs font-semibold tracking-wide  text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 text-center">
                                    <th class="px-4 py-3">ID</th>
                                    <th class="px-4 py-3">Nom</th>
                                    <th class="px-4 py-3">description</th>
                                    <th class="px-4 py-3">Archiver</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <?php

                                foreach ($data['Wiki'] as $wiki) {
                                    // var_dump($data);
                                    // die;
                                ?>

                                    <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400 text-center">
                                        <td data-key="10" class="px-4 py-3" id="categoryCellt">

                                            <?= $wiki->getIdWiki() ?>

                                        </td>
                                        <td data-key="10" class="px-4 py-3" id="categoryCell">

                                            <?= $wiki->getNameWiki() ?>

                                        </td>
                                        <td data-key="10" class="px-4 py-3" id="categoryCellt">
                                            <?= $wiki->getDescriptionWiki() ?>
                                        </td>
                                        <td data-key="10" class="px-4 py-3" id="categoryCellt">
                                            <?php var_dump($wiki->getArchivedWiki());
                                            
                                             if ($wiki->getArchivedWiki() == 0) { ?>
                                               <form action="<?= URLROOT ?> /AdminController/Archiver" method="post">
                                                <button type="submit" name="archiver" value="<?= $wiki->getIdWiki() ?>" class="text-green-700 border border-green-700 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                                                    <svg class="w-13 h-7" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                            <?php } else { ?>
                                                <form action="<?= URLROOT ?> /AdminController/NomArchiver" method="post">
                                                <button type="submit" name="non_archiver" value="<?= $wiki->getIdWiki() ?>" class="text-red-700 border border-red-700 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                                                    <svg class="w-13 h-7" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                <?php
                                }

                                ?>

                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>

                        <!-- Modal for Edit Category -->
                        <div id="editModal" class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50">
                            <div class="flex items-center justify-center h-full">
                                <div class="bg-white p-8 rounded shadow-lg">
                                    <form action="" method="POST">
                                        <label for="editedtag">Edit Category:</label>
                                        <input type="text" name="tagId" class="id" hidden>
                                        <input type="text" id="edited_tag" name="tag_name" class="w-full border rounded px-3 py-2 mt-2 mb-4">
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

        <?php require_once APPROOT . '/views/inc/footer.php' ?>