<?php
$nosidebar = '';
require_once APPROOT . '/views/inc/header.php';
// echo '<pre>';
// var_dump($data);
// die();
?>
<section>
  <div class="hidden  md:flex  items-center justify-center gap-5 pb-5">
    <?php

    foreach ($data['Categories'] as $categorie) {
      // var_dump($data); 
      // die;
    ?>
      <a href="" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:border-yellow-700"><?= $categorie->getNameCat() ?></a>
    <?php } ?>
  </div>

  <?php
  if (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) { ?>
    <div class="flex justify-end pr-10">
      <a href="<?= URLROOT ?>/AuthteurController/addwiki" class="mb-3 md:block bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">
        <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z" />
        </svg>
      </a>
    </div>
  <?php } ?>

  <div id="cardWiki" class="grid md:grid-cols-3 sm:grid-cols-1 justify-center md:ml-11 gap-4 grid-wrap">
    <?php

    foreach ($data['Wiki'] as $wiki) {
      // var_dump($data); 
      // die;
    ?>


      <div class="max-w-sm min-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden">

        <div class="p-6">
          <a href="#" class="text-2xl font-bold text-gray-900 dark:text-white hover:underline"><?= $wiki->getNameWiki() ?></a>
          <p class="mt-2 min-h-[10vh] text-gray-700 dark:text-gray-400"><?= substr($wiki->getDescriptionWiki(), 0, 100) ?>...</p>
          <div class="flex items-center space-x-2 mt-3 text-gray-500">
            <span>Category:</span>
            <span><?= $wiki->getCategorie()->getNameCat() ?></span>
          </div>

          <div class="flex items-center space-x-2 mt-1 text-gray-500">
            <span>Tags:</span>
            <span><?= $wiki->getTags()->getNameTag() ?></span>
          </div>
          <div class="flex items-center space-x-2 mt-3 text-gray-500">
            <span>Author:</span>
            <span><?= $wiki->getUser()->getName() ?></span>
          </div>
          <a href="<?= URLROOT ?>/UserController/wikimore?id=<?= $wiki->getIdWiki() ?>" class="inline-flex items-center mt-3 text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded-md px-4 py-2 transition duration-300 ease-in-out transform hover:scale-105">
            Read more
            <svg class="rtl:rotate-180 w-4 h-4 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
          </a>
        </div>
        <?php
        if (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) { ?>
          <div class="flex justify-evenly py-3 bg-gray-100 dark:bg-gray-700">
            <a href="<?= URLROOT ?>/AuthteurController/UpdateWikis?id=<?= $wiki->getIdWiki() ?>" onclick="showeditModal(<?= $wiki->getIdWiki() ?>)" class="  text-white px-4 py-2 rounded-md hover:bg-blue-600   focus:border-blue-300 transition duration-300 ease-in-out transform hover:scale-105">
              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
              </svg>
            </a>
            <a href="<?= URLROOT ?>/AuthteurController/DelletWiki?id=<?= $wiki->getIdWiki() ?>" name="deletWiki" class=" text-white px-4 py-2 rounded-md hover:bg-red-600   focus:border-red-300 transition duration-300 ease-in-out transform hover:scale-105" value="">
              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
              </svg>
            </a>
          </div>
        <?php } ?>
      </div>

    <?php }  ?>
  </div>
  </div>



  <script>
    // function
    // showeditModal(id) {
    //   localStorage.setItem("id", id);

    // }
  </script>
  </div>
</section>

<?php
require_once APPROOT . '/views/inc/footer.php'
?>
<script>
  const searchInput = document.querySelector("#search");
  const cardWiki = document.querySelector("#cardWiki");

  searchInput.addEventListener("input", function(event) {
    const valueSearch = this.value;
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          if (valueSearch !== "") {
            const searchResults = JSON.parse(xhr.response);


            cardWiki.innerHTML = "";
            appendWikiCard(searchResults);


          } else {
            cardWiki.innerHTML = "";

            console.log(xhr.response);
            const allResults = JSON.parse(xhr.response);



            appendWikiCard(allResults);

          }
        }
      } else {
        console.error('Error: ' + xhr.status);

      }
    };

    xhr.open('POST', "<?= URLROOT ?>/AuthteurController/searchWikiTagCategory", true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send('search=' + encodeURIComponent(valueSearch));
  });

  function appendWikiCard($result) {
    $result.wikis.forEach(result => {
      const card = document.createElement("div");
      card.className = "max-w-sm min-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden";
      card.innerHTML = `
              <div class="p-6">
                <a href="#" class="text-2xl font-bold text-gray-900 dark:text-white hover:underline">${result.nameWiki}</a>
                <p class="mt-2 min-h-[10vh] text-gray-700 dark:text-gray-400">${result.descriptionWiki?.slice(0, 100)}...</p>
                <div class="flex items-center space-x-2 mt-3 text-gray-500">
                  <span>Category:</span>
                  <span>${result.nameCat}</span>
                </div>
                <div class="flex items-center space-x-2 mt-1 text-gray-500">
                  <span>Tags:</span>
                  <span>${result.tag_names}</span>
                </div>
                <div class="flex items-center space-x-2 mt-3 text-gray-500">
                  <span>Author:</span>
                  <span>${result.name}</span>
                </div>
                <a href="<?= URLROOT ?>/UserController/wikimore?id=${result.idWiki}" class="inline-flex items-center mt-3 text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded-md px-4 py-2 transition duration-300 ease-in-out transform hover:scale-105">
                  Read more
                  <svg class="rtl:rotate-180 w-4 h-4 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                  </svg>
                </a>
              </div>
            `;

      cardWiki.appendChild(card);
    });
  }
</script>