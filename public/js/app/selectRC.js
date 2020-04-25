function getRegiones(selectObject) {
    let id = selectObject.value;
    axios
        .get("../ciudades_json/" + id)
        .then((response) => {
            selectCiudades(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
}

function selectCiudades(response) {
    let CiudadesSelect = document.querySelector(".selectCiudades");
    CiudadesSelect.innerHTML = "";
    document.querySelector(".selectCiudades").disabled = false;
    let opt = new Option("Selecionar Ciudad", null);
    CiudadesSelect.insertBefore(opt, CiudadesSelect.firstChild).disabled = true;
    for (let op of response) {
        CiudadesSelect.innerHTML += `
        
        <select class="form-control selectRegiones" style="width: 100%">
        <option value="${op.id}">
            ${op.nombre_ciudad}
        </option>
        </select>
        
        `;
    }
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".selectCiudades").disabled = true;
});
