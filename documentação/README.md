# Documentação

Projeto de Checkout Transparente desenvolvido em Laravel 5.3 com banco de dados SQLite.

## Conhecendo o sistema

Abaixo, serão apresentadas informações relevantes sobre o projeto como um todo.

## Estrutura de pastas e arquivos principais

resources/views - Diretório onde ficam todas as visões do projeto, no caso, o front-end.

app/Models - Diretório onde ficam localizados os modelos da aplicação.

app/Http/Controllers - Diretório onde ficam localizados as classes controladoras da aplicação.

database/migrations - Diretório onde ficam todos os arquivos de migração, esses arquivos são responsáveis por gerar o script da estrutura do banco de dados

database/migrations/database.sqlite - Arquivo do banco de dados SQLite (obs: verificar se o mesmo se encontra na aplicação antes de executar)

routes/web.php - Arquivo responsável por gerenciar todas as rotas utilizadas pela aplicação.

## Principais Rotas

Rotas utilizadas no desenvolvimento de toda a lógica da aplicação. Como dito anteriormente, as rotas ficam localizadas no arquivo web.php

### Autenticação

 Abaixo, é possível visualizar as rotas utilizadas para a autenticação do usuário, na qual faz referência com a controller LoginController.

```
Route::get('/login',['as'=>'login','uses' =>'Auth\LoginController@index']); - Ir para a Página de Login
Route::post('/login/entrar',['as'=>'login.entrar','uses' =>'Auth\LoginController@login']); -  Função de Login
Route::get('/login/sair',['as'=>'login.sair','uses' =>'Auth\LoginController@logout']); - Função de Logout

```

### Cadastro

 Abaixo, é possível visualizar as rotas utilizadas para o cadastro do usuário, na qual faz referência com a controller RegisterController.

```
Route::get('/cadastro',['as'=>'cadastro','uses' =>'Auth\RegisterController@index']); - Ir para a Página de Cadastro
Route::post('/cadastro/cadastrar',['as'=>'cadastrar','uses' =>'Auth\RegisterController@cadastrar']); - Função de Cadastro

```

### Página Inicial

 Abaixo, é possível visualizar as rotas utilizadas para a Página inicial , na qual faz referência com a controller HomeController.

```
Route::get('/',['as'=>'homepage','uses' =>'HomeController@index']); - Ir para a Página Inicial
Route::get('/produtos/carrinho/{id}',['as'=>'produtos.add','uses' =>'HomeController@addToCart']); - Função para adicionar um produto ao carrinho
Route::get('/carrinho',['as'=>'carrinho','uses' =>'HomeController@Cart']); - Ir para Página do Carrinho
Route::get('/carrinho/adicionarQuantidade/{id}',['as'=>'carrinho.add','uses' =>'HomeController@addQtd']); - Função para adicionar uma unidade no carrinho de um item específico
Route::get('/carrinho/removerQuantidade/{id}',['as'=>'carrinho.remove','uses' =>'HomeController@removeQtd']); - Função para remover uma unidade no carrinho de um item específico
Route::get('/carrinho/removerItem/{id}',['as'=>'carrinho.removeItem','uses' =>'HomeController@removeItem']); Função para adicionar um produto no carrinho

```

### Histórico de Compras

 Abaixo, é possível visualizar as rotas utilizadas para o Histórico de compras, na qual faz referência com a controller HistoricoController.

```
  Route::get('/historico',['as'=>'historico','uses' =>'HistoricoController@index']); - Ir para a página de Histórico e busca no banco a lista de compras do usuário logado.

```

### Checkout

 Abaixo, é possível visualizar as rotas utilizadas para o Checkout, na qual faz referência com a controller CheckoutController.

```
  Route::get('/checkout',['as'=>'checkout','uses' =>'CheckoutController@index']); -  Ir para a página de Checkout.
  Route::post('/finalizar',['as'=>'finalizar','uses' =>'CheckoutController@finalizar']); - Função para finalizar a compra
```

## Tecnologias utilizadas

* [Bootstrap](https://getbootstrap.com/) - Framework de desenvolvimento de componentes front-end responsivos.
* [Laravel](https://maven.apache.org/) - Framework PHP livre e open-source para desenvolvimento de sistemas web em padrão MVC.
* [SQLite](https://www.sqlite.org/index.html) - SQLite é uma biblioteca que implementa um banco de dados SQL embutido.

## Autor

* **Gustavo Gomes Farias** - *Desenvolvedor de software* - [GitHub](https://github.com/gust142/)



