Projeto de CRUD simples com PHP e Mysql

## Como configurar o banco de dados

1. Certifique-se de que o MySQL esteja rodando no seu ambiente.
2. Navegue até o diretório do projeto:
   cd /caminho/para/o/projeto
3. mysql -u USUARIO -p BANCO_DE_DADOS < database/backup.sql
    Substitua:
    USUARIO: Pelo seu nome de usuário do MySQL (ex.: root).
    BANCO_DE_DADOS: 'empresa' deverá ser o nome do banco de dados
4. Digite sua senha do MySQL quando solicitado.

## Alternativa: Usando phpMyAdmin
1. Acesse o phpMyAdmin no navegador.
2. Clique no nome do banco de dados ou crie um novo.
3. Acesse a aba Importar.
4. Clique em Escolher arquivo e selecione database/backup.sql.
5. Clique em Executar.