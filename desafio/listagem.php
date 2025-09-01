<?php
try {
// Conexão segura com PDO
$pdo = new PDO('mysql:host=localhost;dbname=site_php', 'site_user', 'atv123');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Seleciona todas as mensagens
$stmt = $pdo->query("SELECT * FROM mensagens ORDER BY data_envio DESC");

echo "<h1>Mensagens Recebidas</h1>";
echo "<a href='contato.html'>Voltar ao formulário</a><br><br>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo "<p><strong>Nome:</strong> {$row['nome']}<br>";
echo "<strong>Email:</strong> {$row['email']}<br>";
echo "<strong>Mensagem:</strong> {$row['mensagem']}<br>";
echo "<em>Enviada em: {$row['data_envio']}</em></p><hr>";
}
} catch (PDOException $e) {
echo "Erro: " . $e->getMessage();
}
?>