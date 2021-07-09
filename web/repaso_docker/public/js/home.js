
const cargarMarcas = async()=>{
    let marcas = await getMarcas();
    let marcaSelect = document.querySelector("#marca-select");
    marcas.forEach(m=>{
        let option = document.createElement("option");
        option.innerText = m;
        marcaSelect.appendChild(option);
    });     
};

document.addEventListener("DOMContentLoaded", ()=>{
    cargarMarcas();
});
document.querySelector("#registrar-btn").addEventListener("click", async ()=>{
    let nombre = document.querySelector("#nombre-txt").value;
    let marca = document.querySelector("#marca-select").value;
    let anio = document.querySelector("#anio-txt").value;
    
    let errores = [];
    if(nombre === ""){
        errores.push("Debe ingresar un nombre");
    }else{
        let consolas = await getConsolas();
        let consolaEncontrada = consolas.find(c=>c.nombre.toLowerCase() === nombre.toLowerCase());
        if(consolaEncontrada != undefined){
            errores.push("La consola ya existe");
        }
    }

    if(isNaN(anio)){
        errores.push("El año debe ser numérico");
    }else if( +anio < 1958){
        errores.push("El año es incorrecto");
    }

    if(errores.length == 0){
        let consola = {};
        consola.nombre = nombre;
        consola.marca = marca;
        consola.anio = anio;
        let res = await crearConsola(consola);
        await Swal.fire("Consola creada","Consola creada existosamente","success")

        window.location.href = "ver_consolas";
    }else{
        Swal.fire({
            title: "Errores de validacion",
            icon: "warning",
            html: errores.join("<br  />")
        });
    }

    
});