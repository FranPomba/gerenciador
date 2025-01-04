# Gerenciador de Projetos

Bem-vindo ao Gerenciador de Projetos, uma aplicação PHP para organizar e acompanhar o progresso de seus projetos. Este projeto utiliza SimpleRouter, TwigTemplate e SQLite.

## Tecnologias Utilizadas

- **PHP 8+**
- **SQLite** para armazenamento de dados
- **Tailwind CSS** para estilização
- **SimpleRouter** para gerenciamento de rotas
- **TwigTemplate** como motor de templates

## Funcionalidades

- Criar, listar, editar e excluir projetos (CRUD completo).
- Associação de stacks tecnológicas a cada projeto.
- Exibição de detalhes do projeto, incluindo tecnologias utilizadas.
- Interface moderna e responsiva com Tailwind CSS.

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/FranPomba/gerenciador.git
   ```
2. Navegue até o diretório do projeto:
   ```bash
   cd gerenciador
   ```
3. Instale as dependências utilizando o Composer:
   ```bash
   composer install
   ```
4. Crie o arquivo do banco de dados SQLite:
   ```bash
   touch database/database.sqlite
   ```
5. Configure o banco de dados no arquivo `config/database.php`:
   ```php
   return [
       'driver' => 'sqlite',
       'database' => __DIR__ . '/../database/database.sqlite',
       'prefix' => '',
   ];
   ```
6. Execute as migrações para criar as tabelas:
   ```bash
   php scripts/migrate.php
   ```

## Uso

1. Inicie o servidor embutido do PHP:
   ```bash
   php -S localhost:8000 -t public
   ```
2. Acesse a aplicação no navegador:
   ```
   http://localhost:8000
   ```

## Estrutura de Diretórios

- **public/**: Contém o ponto de entrada principal do projeto (`index.php`).
- **controllers/**: Controladores para gerenciar a lógica de negócio.
- **models/**: Modelos para interação com o banco de dados.
- **views/**: Templates Twig para renderização de UI.
- **config/**: Configurações do projeto (ex.: banco de dados).
- **database/**: Banco de dados SQLite.


Desenvolvido por Francisco Pomba.

