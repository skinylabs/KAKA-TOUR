<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <!-- Include Navbar Component -->
    <x-backend.navigation.navbar />

    <!-- Include Sidebar Component -->
    <x-backend.navigation.sidebar />

    <!-- Main Content -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
            @yield('content')
        </div>
    </div>

    <script>
        // Script untuk toggle sidebar dan dropdown menu
        document.addEventListener("DOMContentLoaded", function() {
            // Sidebar toggle functionality
            const sidebarToggleButton = document.querySelector(
                '[data-drawer-toggle="logo-sidebar"]'
            );
            const sidebar = document.getElementById("logo-sidebar");

            if (sidebarToggleButton && sidebar) {
                sidebarToggleButton.addEventListener("click", function() {
                    sidebar.classList.toggle("-translate-x-full");
                });
            }

            // Dropdown toggle functionality
            const dropdownToggleButton = document.querySelector(
                '[data-dropdown-toggle="dropdown-user"]'
            );
            const dropdownMenu = document.getElementById("dropdown-user");

            if (dropdownToggleButton && dropdownMenu) {
                dropdownToggleButton.addEventListener("click", function() {
                    dropdownMenu.classList.toggle("hidden");
                });

                // Close dropdown if clicked outside
                window.addEventListener("click", function(event) {
                    if (
                        !dropdownToggleButton.contains(event.target) &&
                        !dropdownMenu.contains(event.target)
                    ) {
                        dropdownMenu.classList.add("hidden");
                    }
                });
            }
        });
    </script>
</body>

</html>
