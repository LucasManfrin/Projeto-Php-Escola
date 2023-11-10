let inp1 = document.getElementById("brahma")
let inp2 = document.getElementById("skol")

function total() {
    const txt = document.querySelector("span")
    let brahma = Number(inp1.value) * 5
    let skol = Number(inp2.value) * 3
    const soma = brahma + skol
    txt.innerText = "O valor total é de R$" + soma + ",00."
}