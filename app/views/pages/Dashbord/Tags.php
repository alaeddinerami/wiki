<?php
 $nonavbar=''; 
require_once APPROOT . '/views/inc/header.php' ?>

<div>

    <!-- Header -->

    <!-- ./Header -->

    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

        <!-- Statistics Cards -->

        <!-- ./Statistics Cards -->


        <form method="post" action="<?= URLROOT ?> /AdminController/InsertTags" class="max-w-sm mx-auto">
            <div class="mb-5">
                <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add new tag</label>
                <input type="text" id="tags" name="tags" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="new tag" required>
            </div>
            <button type="submit" name="add_tags" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ADD</button>
        </form>


        <!-- Client Table -->
        <div class="mt-4 mx-4">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <div class="w-full">
                        <table class="w-full">
                            <thead>
                                <h2>All Tags</h2>
                                <tr class="text-xs font-semibold tracking-wide  text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 text-center">
                                    <th class="px-4 py-3">ID</th>
                                    <th class="px-4 py-3">Nom</th>
                                    <!-- <th class="px-4 py-3">Wikis</th> -->
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <?php

                                foreach ($data['Tags'] as $tags) {
                                ?>

                                    <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400 text-center">
                                        <td data-key="10" class="px-4 py-3">

                                            <?= $tags->getIdTag() ?>

                                        </td>
                                        <td data-key="10" class="px-4 py-3" id="tagCell">

                                            <?= $tags->getNameTag() ?>

                                        </td>
                                        <!-- <td data-key="10" class="px-4 py-3" id="categoryCellt">
                                        5
                                    </td> -->
                                        <td class="px-4 py-3">
                                            <!-- Edit button -->
                                            <button type="button" value="<?= $tags->getIdTag() ?>" class="tagEditBtn text-blue-500 hover:underline">Edit</button>
                                            <!-- Delete button -->
                                            <a href="<?= URLROOT ?>/AdminController/DelletTag?id=<?= $tags->getIdTag() ?>" class="text-red-500 hover:underline ml-2">Delete</a>
                                            <!-- onclick="deleteCategory()" -->
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
                                    <form action="<?= URLROOT ?> /AdminController/UpdateTag" method="POST">
                                        <label for="editedTAg">Edit Tag:</label>
                                        <input type="hidden" name="TagsId" id="idTag" value="">
                                        <input type="text" id="editedTAg" name="Tagsname" class="w-full border rounded px-3 py-2 mt-2 mb-4">
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded ml-2" onclick="closeEditModal()">Cancel</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- <div id="editModal" class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50">
                            <div class="flex items-center justify-center h-full">
                                <div class="bg-white p-8 rounded shadow-lg">
                                    <form action="" method="POST">
                                        <label for="editedtag">Edit Category:</label>
                                        <input type="text" name="tagId" class="id" hidden>
                                        <input type="text" id="edited_tag" name="tag_name" class="w-full border rounded px-3 py-2 mt-2 mb-4">
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="saveEdit()">Save</button>
                                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded ml-2" onclick="closeEditModal()">Cancel</button>
                                    </form>

                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!--  -->

        <script>
            function editCategory(e) {
                console.log(e.target);

                // // editedCategoryId = categoryCell.getAttribute('data-key'); // If you have an ID associated with the category, store it here
                // document.querySelector('#idCat').value = idCat;
            }
        </script>
        <?php require_once APPROOT . '/views/inc/footer.php' ?>