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
        app.innerHTML = data.map((obj) => `<a id="${obj.eub_id}" href="http://localhost/php2_oefeningen/oef2.2/btw_form.php?eub_id=${obj.eub_id}" target="_blank" class="list-group-item">${obj.eub_land}, ${obj.eub_code}</a>`).join(' ');
      }).catch((error) => console.log(error))
}

// app.onclick = (e) => {
//     e.preventDefault()
//     // console.log(e);
//     const landCode = e.target.textContent.split(",")
//     const id = e.target.id;
//     app.innerHTML = (
//         ` <div class="col-sm-5 ml-auto mr-auto mt-5 mb-5 p-5 border border-info rounded-top">
//                 <div class="col-sm-12 mb-4 text-center">
//                     <h4>Verwijder of pas informatie aan</h4>
//                 </div>
//
//                 <div class="col-sm-5">
//                     <div class="form-group row">
//                         <div class="col-sm-10">
//                             <p>Land: ${landCode[0]}</p>
//                         </div>
//                     </div>
//                     <div class="row">
//                         <div class="col-sm-10">
//                             <p>Code: ${landCode[1]}</p>
//                         </div>
//                     </div>
//                 </div>
//                 </div>
//                </div>`)
//     app.onclick = false
//     const formUpdate = document.getElementById('form_update')
//     console.log(formUpdate);
// }


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



