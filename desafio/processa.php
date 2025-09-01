<?php
// Recebe os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
try {
// Conexão segura com PDO
$pdo = new PDO('mysql:host=localhost;dbname=site_php', 'site_user', 'atv123');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Preparar e executar o INSERT
$stmt = $pdo->prepare("INSERT INTO mensagens (nome, email, mensagem) VALUES (?,
?, ?)");
$stmt->execute([$nome, $email, $mensagem]);

echo "Mensagem enviada com sucesso! <a href='contato.html'>Voltar</a>";
} catch (PDOException $e) {
echo "Erro: " . $e->getMessage();
}
?> 