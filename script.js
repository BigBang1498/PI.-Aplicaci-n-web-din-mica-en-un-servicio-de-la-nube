const btn_agregar = document.getElementById('btn_agregar');
const formulario = document.getElementById('formulario_agregar');
const seccionMostrar = document.querySelector(".mostrar");

btn_agregar.addEventListener("click", async () => {
    btn_agregar.style.display = "none";
    seccionMostrar.style.display = "none"; 
    formulario.style.display = "flex";
});

formulario.addEventListener("submit", async (e) => {
    e.preventDefault();

    const titulo = formulario.querySelector("[name='titulo']").value;
    const url = formulario.querySelector("[name='url']").value;

    const data = new FormData(formulario);
    data.append("accion", "agregar_libro");

    const respuesta = await fetch("queries.php", {
        method: "POST",
        body: data
    });

    alert("¡PDF subido con éxito!");

    seccionMostrar.innerHTML += `
        <div class="tarjeta-libro">
            <a href="${url}" target="_blank">📖 Leer: ${titulo}</a>
        </div>
    `;

    formulario.style.display = "none";
    seccionMostrar.style.display = "flex"; 
    btn_agregar.style.display = "block";

    formulario.reset();
});