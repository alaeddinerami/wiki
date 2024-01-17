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

function closeEditModal() {
  document.getElementById("editModal").classList.add("hidden");
}

document
  .getElementById("mobile-menu-button")
  .addEventListener("click", function () {
    document.getElementById("mobile-menu").classList.toggle("hidden");
  });

function showeditModal(id) {
  localStorage.setItem("id", id);
}

document.addEventListener('DOMContentLoaded', () => {
        const submit = document.querySelector('#submit');

        submit.addEventListener('click', (event) => {
            // Prevent default form submission

            const email = document.getElementById('email').value;
            const username = document.getElementById('name').value;
            const password = document.getElementById('password').value;
            const verifyPassword = document.getElementById('confirm-password').value;

            const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

            let isValid = true;

            if (username.length === 0) {
                isValid = false;
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "Please enter your username",
                    showConfirmButton: false,
                    timer: 2000
                });
            } else if (!emailRegex.test(email)) {
                isValid = false;
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "Please enter a valid email address",
                    showConfirmButton: false,
                    timer: 2000
                });
            } else if (!passwordRegex.test(password)) {
                isValid = false;
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "Password must be between 6 to 20 characters and contain at least one numeric digit, one uppercase and one lowercase letter",
                    showConfirmButton: false,
                    timer: 5000
                });
            } else if (password !== verifyPassword) {
                isValid = false;
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "Passwords do not match",
                    showConfirmButton: false,
                    timer: 5000
                });
            }

            if (!isValid) {

                event.preventDefault();
            }
        });
    });
