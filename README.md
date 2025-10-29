Sistema CRUD - Farmácia Vila Boa 💊

CRUD em PHP + MySQL para controle de materiais/insumos da Farmácia Vila Boa.

🚀 Tecnologias
- PHP 7+
- MySQL
- PDO (prepared statements)
- HTML/CSS

⚙️ Funcionalidades
- Criar, Listar, Editar e Excluir materiais.
- Busca por nome.
- Validação de campos e mensagens de erro/sucesso.
- Segurança básica: prepared statements + htmlspecialchars().

🧱 Estrutura da Tabela
| Campo | Tipo | Descrição |
|-------|------|------------|
| id | INT | Identificador |
| nome | VARCHAR(100) | Nome do insumo |
| unidade | VARCHAR(20) | Unidade (ex: caixa, frasco) |
| estoque_atual | INT | Quantidade atual |
| preco | DECIMAL(10,2) | Preço unitário |

🖼️ Diagramas
- DER: Uma tabela simples `materiais`
- Casos de Uso: Cadastrar, Listar, Editar, Excluir (usuário: funcionário)

📦 Instalação
1. Copie o projeto para `htdocs/farmacia`
2. Crie o banco via `farmacia_vila_boa.sql`
3. Acesse: [http://localhost/farmacia](http://localhost/farmacia)
