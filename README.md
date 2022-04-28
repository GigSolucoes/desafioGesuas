# GESUAS DESAFIO - Danniel C. Lucas

Olá, obrigado pela oportunidade de apresentar o meu trabalho.
Um ponto de esclarecimento para este projeto, é que foi solicitado especificamente o número do NIS, porém em toda a documentação que encontrei este número apresentado como NIS, também é identificado como PIS/PASEP/NIT e a fórmula para seu cálculo é uma só, portanto foi utilizada neste projeto.

## Requerimentos:

- Servidor MySQL local funcionando
- Servidor PHP 7.x local funcionando
- Aplicação descarregada diretamente na raiz do localhost

## Instructions

- Faça a importação do arquivo gesuas.sql que está na raiz do projeto para a base de dados.
- Se necessário, faça modificações no arquivo config/Database.php, para acesso correto ao Banco de Dados.
- Acesse a raiz do projeto em um ambiente Apache.

## Utilização:

- O menu à esquerda permite navegar pelas telas da aplicação.
- Ao iniciar a aplicação no diretório raiz, a tela inicial é o formulário de cadastro.
- A validação no cadastro consiste apenas em verificar se o nome foi preenchido com pelo menos 2 caracteres.
- Seguindo os requerimentos do desafio, a pesquisa não considera uma parte do NIS, mas todos os 11 dígitos (sem máscara) ou 14 dígitos quando utilizada a máscara. O campo de pesquisa prepara a máscara para os números inseridos.
- No menu LISTA é possível acompanhar todos os dados registrados na base.
- O último item do menu leva à tela para teste de validação do NIS gerado pela aplicação. Durante a validação dois procedimentos são executados: teste para validar os registros e teste do índice de repetição de cada registro. Este segundo é realizado porque pelo modo como os registros de NIS são gerados, é comum que para um número elevado de amostras e/ou em máquinas com ótima velocidade de processamento os números possam se repetir. Porém para a utilização da aplicação não é possível cadastrar dois registros com o mesmo NIS.
- Para utilizar a tela de teste e validação basta informar quantas amostrar deseja gerar e clicar em GERAR. Em seguida, após a geração dos registros, clique em VALIDAR.

## Referências
    - [Previdência](http://sa.previdencia.gov.br/site/2015/07/rgrv_RegrasValidacao.pdf)
    - [Ingracio Advocacia] (https://ingracio.adv.br/pis-nis-pasep-nit/)


Gratidão!
Danniel C. Lucas