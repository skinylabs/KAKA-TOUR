document.addEventListener("DOMContentLoaded", function () {
    const customSelect = document.getElementById("custom-select");
    const optionsContainer = document.getElementById("options");
    const selectedUser = document.getElementById("selected-user");
    const hiddenInput = document.getElementById("user_id"); // Ambil input tersembunyi

    customSelect.addEventListener("click", function () {
        optionsContainer.classList.toggle("hidden");
    });

    optionsContainer.addEventListener("click", function (event) {
        const value = event.target.dataset.value;
        const name = event.target.innerText;

        if (value) {
            selectedUser.innerText = name;
            hiddenInput.value = value; // Set value ke input tersembunyi
        }

        optionsContainer.classList.add("hidden");
    });
});
