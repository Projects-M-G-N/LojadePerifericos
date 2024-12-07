async function pesquisar(texto) {
    let resultados = document.querySelector("div.header-search-result")
    if (texto.length >= 3) {
        const dados = await fetch("./fetch/pesquisar.php?texto=" + texto);
        const resposta = await dados.json();
        resultados.style.display = "block";
        resultados.innerHTML = ""
        resposta.forEach(element => {
            resultados.innerHTML += "<a href='./pesquisa.php?search=" + element[0] + "'><p>" + element[0] + "</p></a>";
        });
    } else {
        resultados.style.display = "none";
    }
}