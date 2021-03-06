# Capivara Naval

<!--- Exemplos de badges. Acesse https://shields.io para outras opções. Você pode querer incluir informações de dependencias, build, testes, licença, etc. --->
![GitHub repo size](https://img.shields.io/github/repo-size/DiZanlucas/Capivara_Naval)
![GitHub contributors](https://img.shields.io/github/contributors/DiZanlucas/Capivara_Naval)

## Objetivos do projeto:
* Criar um jogo simulando a batalha naval utilizando de tecnologias de desenvolvimento web, tais como html, javascript, css.
* Trabalhar em conjunto com o grupo para a criação do projeto utilizando o modelo de desenvolvimento ágil Scrum.


## Como será o jogo desenvolvido?
* O jogo simulará uma batalha naval tradicional com seus princípios, com um sistema de pontos também.
* Ranking: O jogo conta com um sistema de pontos que são adquiridos ao longo das batalhas e os 5 usuários com mais pontos serão listados em um ranking.


## Como funciona o jogo:

* O jogo é realizado com 2 usuários, um contra o outro.
* Cada jogador enxerga duas tabelas, a sua e a so seu inimigo.
* Cada tabela contém um tamanho de 10 colunas(1-10) e 10 linhas(A-J) somando 100 quadrados.
* Antes do jogo começar cada jogador organiza suas capivaras nos quadrados desejados da sua tabela. 
* Ganha quem conseguir acertar todas as capivaras espalhadas na tabela do inimigo.
* A cada acerto o jogador ganha um ponto de rank.
* Os pontos dos usuários ficam salvos.
* Para se cadastrar é preciso fornecer um nome de usuário (nick).


## Requisitos Funcionais:

* O jogo deve validar o nick de usuário.
* O jogo deve permitir a inclusão/alteração/remoção da posição da capivara no campo de batalha.
* O jogo deve permitir que o usuário selecione um quadrado da tabela para atingir.
* O jogo deve exibir  a quantidade de capivaras destruídas na partida.
* O jogo deve exibir a quantidade de tempo restante do jogador para cada jogada.
* O jogo deve exibir os pontos de rank do jogador.


## Requisitos Não-funcionais:

* Tempo para realizar a distribuição das capivaras dentro do campo deve ser menor que 3 minutos.
* Tempo para realizar cada jogada deve ser menor que 45 segundos.
* O jogo deve ser compatível com os navegadores Google Chrome e Mozilla Firefox.

## Pré-requisitos

Antes de iniciar, certifique-se de cumprir os seguintes requisitos:
* Você deve possuir servidor web com suporte a PHP.
* Você deve possuir a última versão do PHP,PDO,sqlite instalados.
* Você deve possuir uma máquina Linux.
* Você deve ler a documentação dos termos de uso.

## Como executar

Para fazer o deploy da aplicação siga os seguintes passos:

Linux:

php -S localhost:8080  -d error_reporting="E_ERROR | E_WARNING | E_PARSE"

Windows (opcional):


## Usando Capivara Naval

Para usar Capivara Naval, siga os seguintes passos (exemplos):

* Abra o navegador e digite o seguinte endereço: `http://localhost:8080/Capivara_Naval/trabalho/index.php
* Ao abrir a aplicação você poderá:
  * Acessar o ranking do jogo.
  * Entrar com o nick dos dois usuários e iniciar a partida.
* Ranking: 
  * Lista os 5 usuários com maior pontuação no jogo.
* Campo de batalha:
  * Mostra as capivaras e o campo de batalha.

## Contribuidores

As seguintes pessoas contribuiram para este projeto:

* [Édini Marques Zanlucas](https://github.com/DiZanlucas)
* [Lucas Kazuo Mimura](https://github.com/Mimurakl)
* [Rogério De Souza Oliveira Filho](https://https://github.com/oliveirarogerio)
* [Rafael Eduardo](https://github.com/raraedu)

## Licença de uso

<!--- Se não tiver certeza de qual, verifique este site: https://choosealicense.com/--->
Este projeto usa a seguinte licença: MIT License https://opensource.org/licenses/MIT

