<?php
require 'conexao.php';

$busca = $_GET['busca'] ?? '';
if ($busca) {
    $stmt = $pdo->prepare("SELECT * FROM materiais WHERE nome LIKE ?");
    $stmt->execute(["%$busca%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM materiais");
}
$materiais = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lista de Materiais</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Materiais / Insumos</h2>

<form method="GET">
    <input type="text" name="busca" placeholder="Buscar por nome" value="<?= htmlspecialchars($busca) ?>">
    <button type="submit">Buscar</button>
</form>

<a href="create.php">Novo Material</a>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Unidade</th>
    <th>Armazem</th>
    <th>Valor ($)</th>
    <th></th>
</tr>
<?php foreach ($materiais as $m): ?>
<tr>
    <td><?= $m['id'] ?></td>
    <td><?= htmlspecialchars($m['nome']) ?></td>
    <td><?= htmlspecialchars($m['unidade']) ?></td>
    <td><?= $m['estoque_atual'] ?></td>
    <td><?= number_format($m['preco'], 2, ',', '.') ?></td>
    <td>
        <a href="edit.php?id=<?= $m['id'] ?>">Editar</a> | 
        <a href="delete.php?id=<?= $m['id'] ?>" onclick="return confirm('Excluir este item?')">Excluir</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>