<?php
if (isset($_POST['enviar'])) {
    // Recebe os dados do formulário
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $mensagem = htmlspecialchars($_POST['mensagem'], ENT_QUOTES, 'UTF-8');

    try {
        // Conexão segura com PDO
        $pdo = new PDO('mysql:host=localhost;dbname=site_php', 'site_user', 'atv123');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar e executar o INSERT
        $stmt = $pdo->prepare("INSERT INTO mensagens (nome, email, mensagem) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $mensagem]);

        echo "Mensagem enviada com sucesso! <a href='index.php'>Voltar</a>";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
