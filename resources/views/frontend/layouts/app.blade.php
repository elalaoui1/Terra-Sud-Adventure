<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#3b82f6", secondary: "#10b981" },
            borderRadius: {
              none: "0px",
              sm: "4px",
              DEFAULT: "8px",
              md: "12px",
              lg: "16px",
              xl: "20px",
              "2xl": "24px",
              "3xl": "32px",
              full: "9999px",
              button: "8px",
            },
          },
        },
      };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />
    <style>
      :where([class^="ri-"])::before {
        content: "\f3c2";
      }
      body {
        font-family: "Inter", sans-serif;
      }
      /* .hero-section {
        background-image: url("https://readdy.ai/api/search-image?query=beautiful%20coastal%20scene%20with%20ocean%20waves%20crashing%20against%20rocky%20cliffs%2C%20palm%20trees%20visible%2C%20bright%20sunny%20day%20with%20clear%20blue%20sky%2C%20perfect%20for%20travel%20website%20hero%20image%2C%20natural%20landscape%20with%20dramatic%20coastline%2C%20professional%20photography%2C%20high%20resolution&width=1200&height=600&seq=123456&orientation=landscape");
        background-size: cover;
        background-position: center;
      } */
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('styles')
  </head>
  <body class="bg-white">

    <!-- Navbar -->
    @include('frontend.components.home.navbar')


    {{-- dinamic content --}}
    @yield('content')



    {{-- footer --}}
    {{-- @include('frontend.components.home.footer') --}}

    {{-- scripts section --}}
    @yield('scripts')

<script>
      document.addEventListener("DOMContentLoaded", function () {
        const menuButton = document.getElementById("menuButton");
        const closeButton = document.getElementById("closeButton");
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("overlay");
        function openSidebar() {
          sidebar.classList.remove("translate-x-full");
          overlay.classList.add("opacity-100");
          overlay.classList.remove("pointer-events-none");
          document.body.style.overflow = "hidden";
        }
        function closeSidebar() {
          sidebar.classList.add("translate-x-full");
          overlay.classList.remove("opacity-100");
          overlay.classList.add("pointer-events-none");
          document.body.style.overflow = "";
        }
        menuButton.addEventListener("click", openSidebar);
        closeButton.addEventListener("click", closeSidebar);
        overlay.addEventListener("click", closeSidebar);
        // Date inputs - set min date to today
        const dateInputs = document.querySelectorAll('input[type="date"]');
        const today = new Date().toISOString().split("T")[0];
        dateInputs.forEach((input) => {
          input.min = today;
          if (!input.value) {
            input.value = today;
          }
        });
      });
    </script>
  </body>
</html>
