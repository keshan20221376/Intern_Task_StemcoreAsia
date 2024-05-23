const countryStateInfo = {
  Monaco: [
    "Monte Carlo / Spélugues",
    "La Rousse / Saint Roman",
    "Larvotto/Bas Moulins",
    "La Condamine",
    "Monaco-Ville",
    "Fontvieille",
    "La Colle",
    "Les Révoires",
    "Moneghetti",
    "Saint Michel",
  ],
  SriLanka: [
    "Ampara",
    "Anuradhapura",
    "Badulla",
    "Batticaloa",
    "Colombo",
    "Galle",
    "Gampaha",
    "Hambantota",
    "Jaffna",
    "Kalutara",
    "Kandy",
    "Kegalle",
    "Kilinochchi",
    "Kurunegala",
    "Mannar",
    "Matale",
    "Matara",
    "Monaragala",
    "Mullaitivu",
    "Nuwara Eliya",
    "Polonnaruwa",
    "Puttalam",
    "Ratnapura",
    "Trincomalee",
    "Vavuniya",
  ],
  USA: ["California", "Florida", "Texas"],
};

window.onload = function () {
  const countrySelection = document.querySelector("#country"),
    placeSelection = document.querySelector("#place");

  for (let country in countryStateInfo) {
    countrySelection.options[countrySelection.options.length] = new Option(
      country,
      country
    );
  }

  countrySelection.onchange = (e) => {
    placeSelection.length = 1;
    const places = countryStateInfo[e.target.value];
    for (let i = 0; i < places.length; i++) {
      placeSelection.options[placeSelection.options.length] = new Option(
        places[i],
        places[i]
      );
    }
  };
};
