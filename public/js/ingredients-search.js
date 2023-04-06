const searchInput = document.getElementById("input-group-search");
searchInput.addEventListener("input", filterList);

function filterList() {
    const searchText = this.value.toLowerCase();
    const listItems = document.querySelectorAll("#dropdownSearch li");

    listItems.forEach((item) => {
      const label = item.querySelector("label");
      const labelText = label.textContent.toLowerCase();

      if (labelText.includes(searchText)) {
        item.classList.remove("hidden");
      } else {
        item.classList.add("hidden");
      }
    });
  }
  const listItems = document.querySelectorAll("#dropdownSearch li");

  listItems.forEach((item) => {
    item.classList.add("hidden");
  });
