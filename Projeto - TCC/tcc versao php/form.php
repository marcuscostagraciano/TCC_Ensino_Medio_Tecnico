<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Formulário HTML</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <form action="exibir-dados.php" class="formulario" method="post"> 
        <p> Envie uma mensagem preenchendo o formulário abaixo</p>
        
        <div class="field">
            <label for="nome">Seu Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome*" required>
        </div>
        
        <div class="field">
            <label for="telefone">Seu Telefone:</label>
            <input type="text" id="telefone" name="telefone" placeholder="Digite seu Telefone">
        </div>

        <div class="field">
            <label for="email">Seu E-Mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu E-Mail*" required>
        </div>        
        <div class="field radiobox">
            <span>Deseja receber nossas novidades?</span>
            <input type="radio" name="novidades" id="sim" value="sim" checked><label for="sim">Sim</label>
            <input type="radio" name="novidades" id="nao" value="nao"><label for="nao">Não</label>
        </div>
        <div class="field">
            <label for="mensagem">Sua mensagem:</label>
            <textarea name="mensagem" id="mensagem" placeholder="Mensagem*" required></textarea>
        </div>

        <input type="submit" name="acao" value="Enviar">
    </form>



</body>