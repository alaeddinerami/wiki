<?php
$nosidebar = '';
require_once APPROOT . '/views/inc/header.php';
?>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md">

    <h2 class="text-3xl font-bold mb-6 text-center">Update a Wiki</h2>

    <form action="<?= URLROOT ?> /AuthteurController/UpdateWiki" method="post">

    
        <!-- Name Input -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
            <input type="text" id="name" name="name" class="mt-1 p-3 w-full border rounded-md">
        </div>

        <!-- Description Textarea -->
        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <textarea id="description" name="description" rows="4" class="mt-1 p-3 w-full border rounded-md"></textarea>
        </div>

        <!-- Category Select -->
        <div class="mb-6">
            <label for="category" class="block text-sm font-medium text-gray-600">Category</label>
            <select id="category" name="categorie" class="mt-1 p-3 w-full border rounded-md">
                <?php
                foreach ($data['Categories'] as $cat) { ?>
                    <option value="<?= $cat->getIdCat() ?>"><?= $cat->getNameCat() ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Tags Checkboxes -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-600">Tags</label>
            <div class="mt-2 space-y-2">
                <?php

                foreach ($data['Tags'] as $tag) { ?>
                    <label for="tag1" class="flex space-x-2">
                        <input type="checkbox" id="tag1" name="tags[]" value="<?= $tag->getIdTag() ?>" class="mr-2">
                        <?= $tag->getNameTag() ?>
                    </label>
                <?php } ?>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" id="id-edit" name="updateWiki" class="bg-yellow-500 text-white px-6 py-3 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring focus:border-yellow-300">
                Submit
            </button>
        </div>

    </form>
</div>
<script>
    var id = localStorage.getItem("id");
    document.getElementById('id-edit').value = id;
</script>



<?php require_once APPROOT . '/views/inc/footer.php' ?>