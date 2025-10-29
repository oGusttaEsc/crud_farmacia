<?php
require 'conexao.php';

// Busca simples
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';
$sql = "SELECT * FROM insumo WHERE nome LIKE :busca ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([':busca' => "%$busca%"]);
$insumos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Controle de Insumos</h2>

<form method="get">
    <input type="text" name="busca" placeholder="Buscar por nome" value="<?= htmlspecialchars($busca) ?>">
    <button type="submit">Buscar</button>
</form>

<a href="criar.php">Novo Insumo</a>
<br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Unidade</th>
        <th>Estoque</th>
        <th>Preço (R$)</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($insumos as $i): ?>
    <tr>
        <td><?= $i['id'] ?></td>
        <td><?= htmlspecialchars($i['nome']) ?></td>
        <td><?= htmlspecialchars($i['unidade']) ?></td>
        <td><?= $i['estoque_atual'] ?></td>
        <td><?= $i['preco'] ?></td>
        <td>
            <a href="editar.php?id=<?= $i['id'] ?>">Editar</a> |
            <a href="excluir.php?id=<?= $i['id'] ?>" onclick="return confirm('Excluir este item?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
