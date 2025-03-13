function elementos(e)//argumento entrada, parametro saida
{
    let div=document.getElementsByTagName(div)[0];
    let div1 = document.getElementById("div1");
    //console.log(div.nextElementSibling); //esse vai mostrar o prox elemento mesmo!
    console.log(div.nextSibling); //esse vai mostrar a prox "info" do elemento
    console.log(div.parentElement); //para saber o pai do elemento
    //alert(e);
    //e++; //unario
    //e==1?2+2:3-2 //ternario

    //itamar.nieradka@ifpr.edu.br email do professor Itamar
}

function criaTabela() {
    
    let pai=document.getElementsByTagName("body")[0];
    let tabela = document.createElement("table");
    tabela.setAttribute("border", 1);

    for(let i=0; i<10;i++) {

        let linha=document.createElement("tr");

        for(let j=0;j<10;j++) {

            let coluna=document.createElement("td");
            // coluna.
            linha.appendChild(coluna)
            
        }

        tabela.appendChild(linha);
    }

    pai.appendChild(tabela);
}