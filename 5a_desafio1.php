<!DOCTYPE html>
<html lang="pt-br"> 
    <!-- Idioma definido como português do Brasil -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Maioridade</title>
</head>
<!-- Cabeçalho da página -->
<body>
    <h1>Verificação de Maioridade</h1> 
    <!-- Título da página  -->
    <!-- Onde o usuário enxerga -->
      <form action="" method="post">
<!--  envia dados do formulário para o mesmo arquivo utilizando o método POST-->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <!-- Required indica que o espaço precisa ser preenchido e como tipo texto. -->
         <label for="ano_de_nascimento">Ano de Nascimento:</label>
         <input type="number" name="ano_de_nascimento" required>
         <!-- Required indica que o espaço necessita ser preenchido e como um número. -->
          <button type="submit">Verificar</button>
          <!-- Botão criado de tipo submit para enviar dados do formulário e verificar a maioridade  -->
      </form>

      <?php

    // Transição para php com o objetivo de processar os dados do formulário 
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nome = $_POST['nome'];
      $anodenascimento = $_POST['ano_de_nascimento'];
      $anoatual = date('Y'); // A função date retorna o ano atual do sistema.
      $idade= $anoatual - $anodenascimento;
      //Idade é calculado a partit do ano atual menos o ano de nascimento do usuário


      //Abre/cria arquivo (log_acessos.txt) para armazenar os dados
    //o "a" vem de append e significa que o arquivo será aberto para escrita e os dados serão adicionados ao final do arquivo
      $arquivo = fopen("log_acessos.txt", "a");
      
      $linha = $nome . "," . $idade . "," . $anoatual . "," . $anodenascimento . "\n";
// O conteúdo da variável linha contem o nome do usuário, sua idade, ano atual e seu ano de nascimento, separadas por vírgula. O \n tem a função de pular uma linha no arquivo como se fosse um enter.

      //escrever a linha do arquivo
     //fwrite() escreve o conteúdo variável no arquivo
      fwrite($arquivo, $linha);

      //fclose: fechar o arquivo
      fclose($arquivo);
      

      if($idade >= 18) {
        echo "<script>alert('Acesso permitido!');</script>";
      }
      else {
        echo"<script>alert('Acesso Negado!');</script>";
      }
    }

      
      ?>
    
</body>


</html>