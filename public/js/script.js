
let editedCategoryId;

function editCategory() {
   const categoryCell = document.getElementById('categoryCell');
   const editedCategory = document.getElementById('editedCategory');

   editedCategory.value = categoryCell.innerText;
   editedCategoryId = categoryCell.getAttribute('data-key'); // If you have an ID associated with the category, store it here
   document.querySelector('.id').value = editedCategoryId;
   document.getElementById('editModal').classList.remove('hidden');
}

function saveEdit() {
   const editedCategory = document.getElementById('editedCategory').value;
   // Perform the update operation here using JavaScript or send it to the server
   // You can use editedCategoryId to identify the category

   // Close the modal
   closeEditModal();
}

function closeEditModal() {
   document.getElementById('editModal').classList.add('hidden');
}

function deleteCategory() {
   // Perform the delete operation here using JavaScript or send it to the server
}

function showWarning() {
   // Display a warning message (replace alert with a more sophisticated solution)
   alert("Editing categories is not allowed in this demo!");
}