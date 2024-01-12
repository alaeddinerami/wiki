<?php
$nosidebar = '';
require_once APPROOT . '/views/inc/header.php';
?>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md">

    <h2 class="text-3xl font-bold mb-6 text-center">Create a Wiki</h2>

    <form action="" method="post">

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
            <select id="category" name="category" class="mt-1 p-3 w-full border rounded-md">
                <option value="category1">Category 1</option>
                <option value="category2">Category 2</option>
                <option value="category3">Category 3</option>
            </select>
        </div>

        <!-- Tags Checkboxes -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-600">Tags</label>
            <div class="mt-2 space-y-2">
                <label for="tag1" class="">
                    <input type="checkbox" id="tag1" name="tags[]" value="tag1" class="mr-2">
                    Tag 1
                </label>
                <label for="tag2" class="">
                    <input type="checkbox" id="tag2" name="tags[]" value="tag2" class="mr-2">
                    Tag 2
                </label>
                <label for="tag3" class="">
                    <input type="checkbox" id="tag3" name="tags[]" value="tag3" class="mr-2">
                    Tag 3
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="bg-yellow-500 text-white px-6 py-3 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring focus:border-yellow-300">
                Submit
            </button>
        </div>

    </form>
</div>



<?php require_once APPROOT . '/views/inc/footer.php' ?>