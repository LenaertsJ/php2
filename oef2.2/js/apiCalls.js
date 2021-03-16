//SELECT DOM ELEMENTS
const app = document.getElementById("codes");
const form = document.getElementById("mainform");
const showBtn = document.getElementById("show_codes")
const inputLand = document.getElementById("eub_land")
const inputCode = document.getElementById("eub_code")


//GET ALL COUNTRIES AND BTW CODES
showBtn.onclick = async (e) => {
  await fetch("http://localhost/php2_oefeningen/oef2.2/api/btwcodes")
      .then((response) => response.json())
      .then((data) => {
        app.innerHTML = data.map((obj) => `<li id="${obj.eub_id}" class="list-group-item">${obj.eub_land}, ${obj.eub_code}</li>`).join(' ');
      }).catch((error) => console.log(error))
}

// ADD NEW BTW CODE AND COUNTRY
form.onsubmit = async (e) => {
  e.preventDefault();
  await fetch(form.action, {
    method: form.method,
    body: new URLSearchParams([...(new FormData(form))])
  })
      .then((response) => response.json())
      .then((data) => console.log(data))
      .catch((error) => console.log(error))

  inputLand.value=""
  inputCode.value=""

  alert("The BTW code has been added");
}



