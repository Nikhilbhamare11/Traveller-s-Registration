document.getElementById('age').addEventListener('input', function () {
  if (this.value < 0) {
    this.value = 0;
  }
});

document.addEventListener('DOMContentLoaded', function () {
  const cities = ["Mumbai", "Pune", "Delhi", "Chennai", "Kolkata", "Hyderabad", "Ahmedabad", "Jaipur", "Lucknow",
    "Bengaluru(Bangalore)", "Surat", "Kanpur", "Nagpur", "Indore", "Thane", "Bhopal", "Visakhapatnam", "Pimpri-Chinchwad", "Patna"];
  const dropdowns = document.querySelectorAll('select');
  const fromSelect = document.querySelector('select[name="from"]');
  const toSelect = document.querySelector('select[name="to"]');

  for (let select of dropdowns) {
    for (let city of cities) {
      let newOption = document.createElement("option");
      newOption.innerText = city;
      newOption.value = city;
      // newOption.value = city.toLowerCase();
      if (select.name === "from" && city === "Select your starting point here") {
        newOption.selected = "selected";
      } else if (select.name === "to" && city === "Select your destination point here") {
        newOption.selected = "selected";
      }
      select.append(newOption);
    }
  }

  function updateDisabledOptions() {
    const fromValue = fromSelect.value;
    const toValue = toSelect.value;

    for (let option of toSelect.options) {
      option.disabled = (option.value === fromValue && fromValue !== "");
    }

    for (let option of fromSelect.options) {
      option.disabled = (option.value === toValue && toValue !== "");
    }
  }
  fromSelect.addEventListener('change', updateDisabledOptions);
  toSelect.addEventListener('change', updateDisabledOptions);
});
