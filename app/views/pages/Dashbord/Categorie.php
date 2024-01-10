<?php require_once APPROOT . '/views/inc/header.php' ?>

<div>

    <!-- Header -->

    <!-- ./Header -->

    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

        


        <form method="post" action="<?= URLROOT ?> /AdminController/InsertCategorie" class="max-w-sm mx-auto">
            <div class="mb-5">
                <label for="categorie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add new category</label>
                <input type="text" id="categorie" name="categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="new gategorie" required>
            </div>
            <button type="submit" name="add_categorie" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ADD</button>
        </form>


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
                                    <!-- <th class="px-4 py-3">Wikis</th> -->
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <?php

                                foreach ($data['Categorie'] as $category) {
                                ?>

                                    <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400 text-center">
                                        <td class="px-4 py-3" id="categoryCellt">
                                            <?= $category->getIdCat() ?>
                                        </td>
                                        <td class="px-4 py-3" id="categoryCell">
                                            <?= $category->getNameCat() ?>
                                        </td>
                                        <!-- <td data-key="10" class="px-4 py-3" id="categoryCellt">
                                        5
                                    </td> -->
                                        <td class="px-4 py-3">
                                            <!-- Edit button -->
                                            <button class="categoryEditBtn text-blue-500 hover:underline" value="<?= $category->getIdCat() ?>">Edit</button>
                                            <!-- Delete button -->
                                            <a href="<?= URLROOT ?>/AdminController/DelletCategorie?id=<?= $category->getIdCat() ?>" class="text-red-500 hover:underline ml-2">Delete</a>
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
                                    <form action="<?= URLROOT ?> /AdminController/UpdateCategorie" method="POST">
                                        <label for="editedCategory">Edit Category:</label>
                                        <input type="hidden" name="categoryId" id='idCat' value="">
                                        <input type="text" id="editedCategory" name="categoryName" class="w-full border rounded px-3 py-2 mt-2 mb-4">
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded ml-2" onclick="closeEditModal()">Cancel</button>
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