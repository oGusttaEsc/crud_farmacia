<?php
require 'conexao.php';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $unidade = trim($_POST['unidade']);
    $estoque = (int)$_POST['estoque_atual'];
    $preco = (float)$_POST['preco'];

    if ($nome && $unidade && $estoque >= 0 && $preco >= 0) {
        $sql = "INSERT INTO insumo (nome, unidade, estoque_atual, preco) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $unidade, $estoque, $preco]);
        $msg = "✅ Insumo adicionado com sucesso!";
    } else {
        $msg = "⚠️ Preencha todos os campos corretamente!";
    }
}
?>

<h2>Novo Insumo</h2>
<p><?= $msg ?></p>

<form method="post">
    Nome: <input type="text" name="nome" required><br>
    Unidade: <input type="text" name="unidade" required><br>
    Estoque Atual: <input type="number" name="estoque_atual" min="0" required><br>
    Preço: <input type="number" step="0.01" name="preco" min="0" required><br>
    <button type="submit">Salvar</button>
</form>

<a href="index.php">Voltar</a>