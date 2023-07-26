<?php
require "../../dao/user.php";
require "../../dao/product.php";
require "../../dao/category.php";
require "../../dao/comment.php";

$viewsArr = product_count_views_each_month();

?>

<main>

  <div class="flex flex-col md:flex-row">
    <section>
      <div id="main" class="main-content flex-1 bg-white   mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="bg-white pt-3">
          <div class="rounded-tl-3xl p-4 shadow text-2xl text-gray-900">
            <h1 class="font-bold pl-2">Analytics</h1>
          </div>
        </div>

        <div class="flex flex-wrap">
          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div
              class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
              <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                  <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                  <h2 class="font-bold uppercase text-gray-600">Total Products</h2>
                  <p class="font-bold text-3xl">
                    <?= product_count() ?> <span class="text-green-500"><i class="fas fa-caret-up"></i></span>
                  </p>
                </div>
              </div>
            </div>
            <!--/Metric Card-->
          </div>
          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
              <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                  <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                  <h2 class="font-bold uppercase text-gray-600">Total Users</h2>
                  <p class="font-bold text-3xl">
                    <?= users_count() ?> <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span>
                  </p>
                </div>
              </div>
            </div>
            <!--/Metric Card-->
          </div>
          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div
              class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
              <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                  <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                  <h2 class="font-bold uppercase text-gray-600">Total Categories</h2>
                  <p class="font-bold text-3xl">
                    <?= category_count() ?> <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span>
                  </p>
                </div>
              </div>
            </div>
            <!--/Metric Card-->
          </div>
          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
              <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                  <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-server fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                  <h2 class="font-bold uppercase text-gray-600">Total comments</h2>
                  <p class="font-bold text-3xl">
                    <?= comments_count_all() ?>
                  </p>
                </div>
              </div>
            </div>
            <!--/Metric Card-->
          </div>


        </div>


        <div class="flex flex-row flex-wrap flex-grow mt-2">

          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Graph Card-->
            <div class="bg-white border-transparent rounded-lg shadow-xl">
              <div
                class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h5 class="font-bold uppercase text-gray-600">Rates of Goods</h5>
              </div>
              <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                  new Chart(document.getElementById("chartjs-4"), {
                    "type": "doughnut",
                    "data": {
                      "labels": ["Iphone", "Apple Watch", "Samsung"],
                      "datasets": [{
                        "label": "Issues",
                        "data": [<?= product_count_by_category_name("Iphone") ?>,
                          <?= product_count_by_category_name("Apple Watch") ?>,
                          <?= product_count_by_category_name("Samsung") ?>
                        ],
                        "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                      }]
                    }
                  });
                </script>
              </div>
            </div>
            <!--/Graph Card-->
          </div>

          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Graph Card-->
            <div class="bg-white border-transparent rounded-lg shadow-xl">
              <div
                class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h2 class="font-bold uppercase text-gray-600">Product Views</h2>
              </div>
              <div class="p-5">
                <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                  new Chart(document.getElementById("chartjs-0"), {
                    "type": "line",
                    "data": {
                      "labels": ["January", "February", "March", "April", "May", "June", "July"],
                      "datasets": [{
                        "label": "Total Views",
                        "data": [605, 59, 80, 81, 56, <?= $viewsArr[0][1] ?>, 40],
                        "fill": false,
                        "borderColor": "rgb(75, 192, 192)",
                        "lineTension": 0.1
                      }]
                    },
                    "options": {}
                  });
                </script>
              </div>
            </div>
            <!--/Graph Card-->
          </div>

          <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Graph Card-->
            <div class="bg-white border-transparent rounded-lg shadow-xl">
              <div
                class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h2 class="font-bold uppercase text-gray-600">Graph</h2>
              </div>
              <div class="p-5">
                <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                  new Chart(document.getElementById("chartjs-1"), {
                    "type": "bar",
                    "data": {
                      "labels": ["January", "February", "March", "April", "May", "June", "July"],
                      "datasets": [{
                        "label": "Likes",
                        "data": [10, 59, 80, 81, 56, 55, 40],
                        "fill": false,
                        "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
                          "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)",
                          "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
                        ],
                        "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
                          "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"
                        ],
                        "borderWidth": 1
                      }]
                    },
                    "options": {
                      "scales": {
                        "yAxes": [{
                          "ticks": {
                            "beginAtZero": true
                          }
                        }]
                      }
                    }
                  });
                </script>
              </div>
            </div>
            <!--/Graph Card-->
          </div>




          <!--/table Card-->
        </div>

        <!--/Advert Card-->
      </div>


  </div>
  </div>
  </section>
  </div>
</main>




<script>
  /*Toggle dropdown list*/
  function toggleDD(myDropMenu) {
    document.getElementById(myDropMenu).classList.toggle("invisible");
  }
  /*Filter dropdown options*/
  function filterDD(myDropMenu, myDropMenuSearch) {
    var input, filter, ul, li, a, i;
    input = document.getElementById(myDropMenuSearch);
    filter = input.value.toUpperCase();
    div = document.getElementById(myDropMenu);
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function (event) {
    if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
      var dropdowns = document.getElementsByClassName("dropdownlist");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (!openDropdown.classList.contains('invisible')) {
          openDropdown.classList.add('invisible');
        }
      }
    }
  }
</script>