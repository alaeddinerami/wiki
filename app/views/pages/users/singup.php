<?php
$nonavbar = '';
$nosidebar = '';
require_once APPROOT . '/views/inc/header.php'; ?>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <!-- <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Flowbite
            </a> -->
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Create and account
                </h1>

                <form class="space-y-4 md:space-y-6" method="POST" id="myForm" action="<?= URLROOT ?>/UserController/singupAuthor">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Full name">
                        <!-- <span class="text-red-500"> $data['name_error'] </span> -->
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com">
                        <!-- <span class="text-red-500"> $data['email_error'] </span> -->
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <!-- <span class="text-red-500">$data['password_error'] </span> -->
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <!-- <span class="text-red-500"> $data['confirm_password_error'] ?></span> -->
                    </div>


                    <button type="submit" name="registre" id="submit" class="w-full text-white bg-amber-400 hover:bg-amber-500 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create an account</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Already have an account? <a href="<?= URLROOT ?>/UserController/LoginAuthor" class="font-medium text-amber-600 hover:underline dark:text-amber-500">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
</script>



<?php require_once APPROOT . '/views/inc/footer.php' ?>