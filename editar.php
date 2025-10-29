<?php
require 'conexao.php';
$id = $_GET['id'];
$msg = '';

// Buscar insumo
$stmt = $pdo->prepare("SELECT * FROM insumo WHERE id = ?");
$stmt->execute([$id]);
$insumo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$insumo) die("Insumo não encontrado.");

// Atualizar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $unidade = trim($_POST['unidade']);
    $estoque = (int)$_POST['estoque_atual'];
    $preco = (float)$_POST['preco'];

    if ($nome && $unidade && $estoque >= 0 && $preco >= 0) {
        $stmt = $pdo->prepare("UPDATE insumo SET nome=?, unidade=?, estoque_atual=?, preco=? WHERE id=?");
        $stmt->execute([$nome, $unidade, $estoque, $preco, $id]);
        $msg = "✅ Atualizado com sucesso!";
    } else {
        $msg = "⚠️ Dados inválidos!";
    }
}
?>

<h2>Editar Insumo</h2>
<p><?= $msg ?></p>

<form method="post">
    Nome: <input type="text" name="nome" value="<?= htmlspecialchars($insumo['nome']) ?>" required><br>
    Unidade: <input type="text" name="unidade" value="<?= htmlspecialchars($insumo['unidade']) ?>" required><br>
    Estoque Atual: <input type="number" name="estoque_atual" value="<?= $insumo['estoque_atual'] ?>" min="0" required><br>
    Preço: <input type="number" step="0.01" name="preco" value="<?= $insumo['preco'] ?>" min="0" required><br>
    <button type="submit">Salvar Alterações</button>
</form>

<a href="index.php">Voltar</a>