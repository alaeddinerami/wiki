const categoryEditButton = document.querySelectorAll(".categoryEditBtn");
const tagEditButton = document.querySelectorAll(".tagEditBtn");
categoryEditButton.forEach((btn) => {
  btn.addEventListener("click", function (e) {
    const tr = this.closest("tr");

    const categoryCell = tr.querySelector("#categoryCell");
    const editedCategory = document.getElementById("editedCategory");

    editedCategory.value = categoryCell.textContent.trim();
    let EditValue = e.target.value;

    document.querySelector("#idCat").value = EditValue;
    document.getElementById("editModal").classList.remove("hidden");
  });
});

tagEditButton.forEach((btn) => {
  btn.addEventListener("click", function (e) {
    const tr = this.closest("tr");
    console.log(tr);
    const tagCell = tr.querySelector("#tagCell");
    console.log(tagCell);
    const editedTag = document.getElementById("editedTAg");

    editedTag.value = tagCell.textContent.trim();
    let EditValue = e.target.value;

    document.querySelector("#idTag").value = EditValue;
    document.getElementById("editModal").classList.remove("hidden");
  });
});

function editCategory(e) {
  console.log(e.target);

  // // editedCategoryId = categoryCell.getAttribute('data-key'); // If you have an ID associated with the category, store it here
  // document.querySelector('#idCat').value = idCat;
}

// function saveEdit() {
//   const editedCategory = document.querySelector("#idCat").value;
//   // Perform the update operation here using JavaScript or send it to the server
//   // You can use editedCategoryId to identify the category

//   // Close the modal
//   // document.getElementById('editModal').classList.add('hidden');
// }

function closeEditModal() {
  document.getElementById("editModal").classList.add("hidden");
}

// function deleteCategory() {
//    // Perform the delete operation here using JavaScript or send it to the server
// }

// function showWarning() {
//    // Display a warning message (replace alert with a more sophisticated solution)
//    alert("Editing categories is not allowed in this demo!");
// }
// function clickme(e) {
//   console.log(e);
//   const tr = e.target;

//   const categoryCell = tr.querySelector("#categoryCell");
//   const editedCategory = document.getElementById("editedCategory");

//   editedCategory.value = categoryCell.innerText;
//   let EditValue = e.target.value;

//   document.querySelector("#idCat").value = EditValue;
//   document.getElementById("editModal").classList.remove("hidden");
// }
