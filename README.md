# GESUAS DESAFIO - Danniel C. Lucas

Olá, obrigado pela oportunidade de apresentar o meu trabalho.
Um ponto de esclarecimento para este projeto, é que foi solicitado especificamente o número do NIS, porém em toda a documentação que encontrei este número apresentado como NIS, também é identificado como PIS/PASEP/NIT e a fórmula para seu cálculo é uma só, portanto foi utilizada neste projeto.

## Referências
    - [Previdência](http://sa.previdencia.gov.br/site/2015/07/rgrv_RegrasValidacao.pdf)
    - [Ingracio Advocacia] (https://ingracio.adv.br/pis-nis-pasep-nit/)

## Instructions

- Faça a importação do arquivo gesuas.sql que está na raiz do projeto para a base de dados.
- Se necessário, faça modificações no arquivo config/Database.php, para acesso correto ao Banco de Dados.
- Acesse a raiz do projeto em um ambiente Apache.

## Utilização:

- O menu à esquerda permite navegar pelas telas da aplicação.
- Ao iniciar a aplicação no diretório raiz, a tela inicial é o formulário de cadastro.
- A validação no cadastro consiste apenas em verificar se o nome foi preenchido com pelo menos 2 caracteres.
- Seguindo os requerimentos do desafio, a pesquisa não considera uma parte do NIS, mas todos os 11 dígitos (sem máscara) ou 14 dígitos quando utilizada a máscara. O campo de pesquisa prepara a máscara para os números inseridos.
- Foi incluída uma lista para validação de todos os dados registrados na base.
- Há uma tela para teste de validação do NIS gerado pela aplicação. A validação executa dois procedimentos: testa os registros para considerá-los válidos e testa o índice de repetição de cada registro. É comum que para um número elevado de amostras e/ou em máquinas com ótima velocidade de processamento os números possam se repetir.
- Para utilizar a tela de teste e validação basta informar quantos registros deseja gerar e clicar em GERAR. Em seguida, após a geração dos registros, clique em validar.

## Requirementos:

- Servidor MySQL local funcionando
- Servidor PHP 7.x local funcionando

Gratidão!
Danniel C. Lucas