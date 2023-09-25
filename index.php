<!DOCTYPE html>
<html>
<head>
  <title>Página de Cadastro</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Formulário de Cadastro</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
      </div>
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
      </div>
      <div class="form-group">
        <label for="telefone">Número de telefone:</label>
        <input type="tel" id="telefone" name="telefone" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="data_nascimento">Data de nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required>
      </div>
      <div class="form-group">
        <label for="nome_cachorro">Nome do seu pet:</label>
        <input type="text" id="nome_cachorro" name="nome_cachorro" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Cadastrar">
      </div>
    </form>
    <div class="form-group login-link">
      Já tem uma conta? <a href="pagina_de_login.php">Faça login</a>
    </div>
  </div>
</body>

<?php
$servername = "localhost"; // substitua pelo endereço do servidor MySQL, se necessário
$username = "seu_usuario"; // substitua pelo nome de usuário do MySQL
$password = "sua_senha"; // substitua pela senha do MySQL
$dbname = "cadastro_db"; // substitua pelo nome do banco de dados que você criou

// Criar conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = $_POST["usuario"];
  $senha = $_POST["senha"];
  $nome = $_POST["nome"];
  $telefone = $_POST["telefone"];
  $email = $_POST["email"];
  $data_nascimento = $_POST["data_nascimento"];
  $nome_cachorro = $_POST["nome_cachorro"];

  // Inserir os dados do formulário no banco de dados
  $sql = "INSERT INTO usuarios (usuario, senha, nome, telefone, email, data_nascimento, nome_cachorro)
          VALUES ('$usuario', '$senha', '$nome', '$telefone', '$email', '$data_nascimento', '$nome_cachorro')";

  if ($conn->query($sql) === TRUE) {
    echo "<h2>Dados Cadastrados:</h2>";
    echo "<p><strong>Usuário:</strong> $usuario</p>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Número de telefone:</strong> $telefone</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Data de Nascimento:</strong> $data_nascimento</p>";
    echo "<p><strong>Nome do Cachorro:</strong> $nome_cachorro</p>";
  } else {
    echo "Erro ao cadastrar os dados: " . $conn->error;
  }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>


</html>


