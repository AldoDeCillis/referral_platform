import axios from "axios";

const cityWrapper = document.querySelector("#city_wrapper");
const cityHiddenInput = document.querySelector("#city_id");
let cityInput = document.querySelector("#city");
let cityList = document.createElement("ul");
let delayApiCall;
cityList.classList.add(
    "max-h-[200px]",
    "overflow-y-scroll",
    "border",
    "border-gray-200",
    "bg-gray-200",
    "px-4",
    "py-1",
    "leading-tight",
    "text-gray-700",
    "focus:border-gray-500",
    "focus:bg-white",
    "focus:outline-none"
);

cityInput.addEventListener("input", (e) => {
    clearTimeout(delayApiCall);
    delayApiCall = setTimeout(() => {
        if (e.target.value.length < 1) {
            cityList.remove();
            return;
        }
        axios.get(`/api/citySearch/${e.target.value}`).then((response) => {
            let cities = response.data.cities;
            cityList.innerHTML = "";
            cities.forEach((city) => {
                let cityElement = document.createElement("li");
                cityElement.classList.add(
                    "cursor-pointer",
                    "border",
                    "p-2",
                    "rounded-3xl",
                    "hover:bg-white",
                    "hover:outline-none",
                    "text-sm"
                );
                cityElement.textContent = city.name;
                cityList.appendChild(cityElement);
                cityElement.addEventListener("click", () => {
                    cityHiddenInput.value = city.id;
                    cityInput.value = city.name;
                    cityList.remove();
                });
            });
            console.log(e.target.value);
            cityWrapper.appendChild(cityList);
        });
    }, 300);
});
