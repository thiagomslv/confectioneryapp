<h1 align=center>Sistema de gerenciamento de filiais de confeitaria</h1>

## 1 - Sobre

O sistema de gerenciamento de filiais permite que administradores do sistema cadastrem filiais de uma confeitaria principal, além de permitir o controle de estoque dos insumos de cada uma das filiais. Essas filiais, por sua vez, podem ser vistas em um mapa. Ao clicar no pino da filial no mapa, é possível notar também detalhes sobre a filial em questão.

## 2 - Tecnologias utilizadas

- Laravel (v11.x)
- Inertia (v1.3)
- JavaScript 
- CSS
- Leaflet (v1.9.4)
- PostgreSQL (v15)
- PostGIS (v3.3)
- Flowbite (v2.5.2)
- ionicons (v7.1.0)
- Vue (v3.5.13)

## 3 - Rotas da Aplicação

Aqui é apresentada uma descrição detalhada de todas as rotas dos sistema.

# Filiais [/branches]

+ /branches é um grupo de rotas responsável pelo gerenciamento das filiais no sistema.

### Ver todas as filiais [GET  /branches]

+ Retorna uma view com todas as filiais cadastradas no sistema.

### Cadastro de filial [GET  /branches/create]

+ Retorna uma view com o formulário de cadastro de filiais no sistema.

### Armazenar filial [POST  /branches/store]

+ Rota de criação de novas filiais no sistema.

    + Atributos (object)

        + name: nome da filial (string, required)
        + address: endereço (string, required)
        + phone: telefone (string, required)
        + lat: latitude (string, required)
        + long: longitude (string, required)

### Editar filial [GET  /branches/edit/{id}]

+ Retorna uma view com o formulário para edição de informações relacionadas a branch indicada pelo parâmetro id.

    + Parâmetros

        + id: id da filial que se deseja editar (integer, required)

### Salvar edições da filial [POST  /branches/update/{id}]

+ Rota para salvar mudanças nos dados das filiais no sistema.

    + Parâmetros

        + id: id da filial que se deseja editar (integer, required)

    + Atributos (object)

        + name: nome da filial (string, required)
        + address: endereço (string, required)
        + phone: telefone (string, required)
        + lat: latitude (string, required)
        + long: longitude (string, required)

### Excluir filial [POST  /branches/destroy/{id}]

+ Rota para excluir filiais no sistema. A exclusão de uma filial também provoca a exclusão de seus itens no estoque.

    + Parâmetros

        + id: id da filial que se deseja excluir (integer, required)

### Ver todas as filiais no mapa [GET  /branches/map]

+ Retorna uma view com a visualização em mapa de todas as filiais cadastradas no sistema.

# Estoque [/branches/stock]

+ /branches/stock é um grupo de rotas responsável pelo gerenciamento do estoque das filiais no sistema.

### Escolher filial para ver o estoque [GET  /branches/stock]

+ Retorna uma view para seleção de qual filial se deseja gerenciar o estoque.

### Gerenciar estoque da filial [GET  /branches/stock/show/{id}]

+ Retorna uma view para gestão do estoque da filial informada pelo parâmetro id.

    + Parâmetros

        + id: id da filial que se deseja exibir o estoque (integer, required)

### Adicionar produto no estoque [POST  /branches/stock/store]

+ Rota para adicionar produtos no estoque da filial.

    + Atributos (object)

        + name: nome do produto (string, required)
        + amount: quantidade (integer, min 1, required)
        + branch_id: id da branch para qual o produto será adicionado (integer, required)

### Atualizar quantidade do produto no estoque [POST  /branches/stock/update/{id}]

+ Rota para atualizar a quantidade de um produto no estoque da filial.

    + Parâmetros

        + id: id do produto que se deseja atualizar a quantidade (integer, required)

    + Atributos (object)

        + qnt: quantidade a ser adicionada do produto (integer, min -1, max 1, required)

### Excluir filial [POST  /branches/stock/destroy/{id}]

+ Rota para excluir produtos do estoque de filiais no sistema.

    + Parâmetros

        + id: id do produto que se deseja excluir (integer, required)

### Pesquisar produto no estoque da filial [GET  /branches/search/{id}/{name}]

+ Rota para pesquisar produtos por nome no estoque da filial. Não é necessário digitar o nome todo, o sistema vai procurar produtos de acordo com partes do nome que for digitado.

    + Parâmetros

        + id: id da filial que se deseja procurar o produto (integer, required)
        + name: nome do produto (string, required)

## 4 - Como rodar o projeto

```
1. Faça o clone do repositório com o Git.

$ git clone https://github.com/thiagomslv/confectioneryapp.git

2. Entre na pasta confectioneryapp e crie um arquivo .env utilizando como modelo o arquivo .env.example

3. Configure a conexão com o PostgreSQL dentro do arquivo .env

4. Abra o terminal na pasta do arquivo e use o composer para baixar as dependências do projeto usando o comando
    
composer update

5. Com a conexão do banco feita, execute as migrations para criação das tabelas usando o comando

php artisan migrate

6. Instale as dependências do JavaScript usando o comando

npm install

7. Execute o servidor de desenvolvimento para o JavaScript usando o comando

npm run dev

6. Execute o servidor de desenvolvimento para o PHP usando o comando

php artisan serve

7. Acesse a URL disponibilizada pelo servidor de desenvolvimento em 

http://127.0.0.1:8000
```

<p align="center">De <a href="https://www.linkedin.com/in/thiagomslv/">Thiago Marques</a> para o mundo!</p>
