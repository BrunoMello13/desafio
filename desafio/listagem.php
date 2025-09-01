<?php
try {
    // Conexão segura com PDO
    $pdo = new PDO('mysql:host=localhost;dbname=site_php', 'site_user', 'atv123');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Seleciona todas as mensagens ordenadas pela data de envio
    $stmt = $pdo->query("SELECT * FROM mensagens ORDER BY data_envio DESC");

    // Cabeçalho do HTML
    echo "<!DOCTYPE html>";
    echo "<html lang='pt-br'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Mensagens Recebidas</title>";
    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' rel='stylesheet'>";
    echo "<style>";
    echo "body { font-family: Arial, sans-serif; }";
    echo ".message-box { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; background-color: #f9f9f9; border-radius: 5px; }";
    echo ".message-box h3 { font-size: 1.5em; color: #333; }";
    echo ".message-box p { font-size: 1em; color: #666; margin-bottom: 10px; }";
    echo ".message-box em { color: #888; font-style: italic; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<div class='container mt-5'>";

    echo "<h1>Mensagens Recebidas</h1>";
    echo "<a href='index.php' class='btn btn-primary mb-4'>Voltar ao formulário</a>";

    // Exibe cada mensagem com um layout mais organizado
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='message-box'>";
        echo "<h3>Nome: " . htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8') . "</h3>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p><strong>Mensagem:</strong><br>" . nl2br(htmlspecialchars($row['mensagem'], ENT_QUOTES, 'UTF-8')) . "</p>";
        echo "<em>Enviada em: " . $row['data_envio'] . "</em>";
        echo "</div>";
    }

    echo "</div>";
    echo "</body>";
    echo "</html>";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
