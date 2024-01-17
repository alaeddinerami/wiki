<?php
$nosidebar = '';
require_once APPROOT . '/views/inc/header.php';
?>

<?php 
foreach ($data['Wiki'] as $wiki) : ?>
    <div class="max-w-2xl mx-auto bg-white p-8 mt-8 rounded-md shadow-md">
        
        <h2 class="text-2xl font-bold text-gray-800 mb-4"><?= $wiki->getNameWiki() ?></h2>

        <div
             class="text-gray-700 mb-6"><?= $wiki->getDescriptionWiki() ?>
        </div>
        
        <div class="flex flex-col gap-2 items-start mb-4">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-blue-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.143 1H1.857A.857.857 0 0 0 1 1.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 6.143V1.857A.857.857 0 0 0 6.143 1Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 17 6.143V1.857A.857.857 0 0 0 16.143 1Zm-10 10H1.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 16.143v-4.286A.857.857 0 0 0 6.143 11Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                </svg>
                <span class="bg-blue-500 text-white px-2 py-1 rounded-md"><?= $wiki->getCategorie()->getNameCat() ?></span>
            </div>
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-yellow-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.583 5.445h.01M8.86 16.71l-6.573-6.63a.993.993 0 0 1 0-1.4l7.329-7.394A.98.98 0 0 1 10.31 1l5.734.007A1.968 1.968 0 0 1 18 2.983v5.5a.994.994 0 0 1-.316.727l-7.439 7.5a.975.975 0 0 1-1.385.001Z" />
                </svg>
                <span class="bg-yellow-500 text-white px-2 py-1 rounded-md"><?= $wiki->getTags()->getNameTag() ?></span>
            </div>
            <div class="flex items-center space-x-2 mt-3 text-gray-500">
                <span>Author:</span>
                <span><?= $wiki->getUser()->getName() ?></span>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php require_once APPROOT . '/views/inc/footer.php' ?>