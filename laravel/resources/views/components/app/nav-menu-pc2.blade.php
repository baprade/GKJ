<div class="w-64 h-screen bg-gray-800 text-white">
  <div class="p-4">
    <h1 class="text-xl font-bold">Sidebar</h1>
    <ul class="mt-4">
      <!-- Menu Item 1 -->
      <li>
        <button id="menuToggle" class="flex justify-between w-full p-2 bg-gray-700 rounded-md hover:bg-gray-600">
          Menu 1
          <span>&#x25BC;</span>
        </button>
        <div id="dropdownMenu" class="hidden overflow-hidden transition-all duration-300">
          <ul class="mt-2 pl-4">
            <li><a href="#" class="block p-2 rounded-md hover:bg-gray-700">Submenu 1</a></li>
            <li><a href="#" class="block p-2 rounded-md hover:bg-gray-700">Submenu 2</a></li>
            <li><a href="#" class="block p-2 rounded-md hover:bg-gray-700">Submenu 3</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
<script>
  $(document).ready(function () {
    $("#menuToggle").on("click", function () {
      const dropdown = $("#dropdownMenu");

      if (dropdown.hasClass("hidden")) {
        dropdown.removeClass("hidden").hide().slideDown(300);
      } else {
        dropdown.slideUp(300, function () {
          $(this).addClass("hidden");
        });
      }
    });
  });
</script>
</div>
