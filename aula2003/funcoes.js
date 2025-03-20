var ctxCabecalho;
var ctxLinks;
var ctxConteudo;
var ctxRodape;

function configEstiloCabecalho(){

    bg=document.getElementById("corFundo").value;
    corFonte=document.getElementById("corFonte").value;
    tamanhoFonte=document.getElementById("tamanhoFonte").value;
    ctxCabecalho= #cabecalho(\n background-color: +bg+";\n";
    ctxCabecalho+= "color: "+corFonte+";\n";
    ctxCabecalho+= " font-size" +tamanhoFonte+pt;\n)\n";
    return ctxCabecalho;

}

function configEstiloLink(){...}
function configHtmlLinks(){...}
function configHtmlCabecalho(){

    let aux=document.querySelector("#textoCabecalho").ariaValueMax;
    ctxCabecalho = <h1> +aux+ </h1>;
    return ctxCabecalho

}

function gerarCodigo(){

    //codigo para o css do html
    let codeCSS=document.querySelector(#codeCSS);
    let css=configEstiloCabecalho();
    css+=configEstiloLink();

    //codigo para o html
    let codeHTML=document.querySelector(#codeHTML);
    ctxHTML=<html>\n<head>\n +
        
        <link rel="stylesheet" href="estilo.css">\n+
        <title> Minha Página </title>\n+
        </head>\n<body>+

        <div id="cabecalho"> +configHtmlCabecalho()+ </div>\n+
        <nav id="links"> \n +configHtmlLinks() </nav>\n+
        <div id="conteudo"></div>\n+
        </body>\n</html>;

    codeHTML.value=ctxHTML;

}

function download(campo, arquivo){...}