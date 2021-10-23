# Teste Laravel Pleno
O teste é um CRUD de lojas com vários produtos

<table style="width:100%">
    <thead>
      <tr>
        <th></th>
        <th>Ambiente de trabalho</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src="https://www.docker.com/sites/default/files/d8/2019-07/Moby-logo.png" width="50" alt="docker"></td>
        <td>Docker</td>
        <td><a target="_blank" href="https://www.docker.com/">https://www.docker.com/</a></td>
      </tr>   
      <tr>
        <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" width="50" alt="laravel"></td>
        <td>Laravel 8</td>
        <td><a target="_blank" href="https://laravel.com/">https://laravel.com/</a></td>
      </tr> 
      <tr>
        <td><img src="https://seeklogo.com/images/I/insomnia-logo-A35E09EB19-seeklogo.com.png" width="50" alt="insomnia"></td>
        <td>Insomnia</td>
        <td><a target="_blank" href="https://insomnia.rest/">https://insomnia.rest/</a></td>
      </tr>    
    </tbody>
</table>

## Características da aplicação
* [x] - Arquitetura recomendada: Repository;
* [x] - Testes unitários e de integração
* [x] - Não há construção de frontend
## Regra da loja
* [x] - Ao visualizar uma loja já devemos carregar todos os produtos dessa loja;
* [x] - O CRUD dever ser completo com todas as rotas para API: index, show, store, update, delete;

## Regras do Produto
* [x] -  Ao criar ou atualizar um produto ele deve armazenar em um banco de dados, entrará na fila e depois gerar
uma notificação de sucesso através de email;

* [x] - Ao retornar o campo de valor nas Apis através de um mutator criar uma máscara de
   R$ ####,##.

* [x] - O CRUD dever ser completo com todas as rotas para API: index, show, store,
   update, delete;

* [x] - Worflow adicionado;

## Comandos de execução

- Para iniciar o projeto pela primeira vez, execute:
```
    docker-compose up -d --build
```
- Após o 1º build, poderá está executando sem a flag --build
```
    docker-compose up -d
```
- Para derrubar os container, execute:
```
    docker-compose down
```

## status

<p><img src="https://github.com/R4YC0NLima/teste-loja/workflows/Loja-PHP%20Workflow/badge.svg"></p>

# !ok
