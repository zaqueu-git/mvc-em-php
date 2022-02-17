Adicione o remote, ou seja, o link para o servidor do seu projeto no GitHub:
git remote add origin https://github.com/<nome do usuário>/<nome do repositório>.git
Exemplo: git remote add origin https://github.com/zaqueu-git/mvc-em-php

Por fim, envie as alterações com o comando:
git push remote origin

----

mkdir repo && cd repo
git remote add origin https://github.com/zaqueu-git/mvc-em-php
git add .

git commit -m "initial commit"
git push origin master


----





Git checkout
git checkout <nombre-de-la-rama>
git checkout -b <nombre-de-tu-rama>

Git status
git status

Git push
git push <nombre-remoto> <nombre-de-tu-rama>
git push --set-upstream <nombre-remoto> <nombre-de-tu-rama>
git push -u origin <nombre-de-tu-rama>

Git pull
git pull <nombre-remoto>

Git revert
git revert 3321844

Git merge
git checkout dev
git fetch
git merge <nombre-de-la-rama>


------------------------------------------


Criar um repositório no GitHub

Abra o terminal de comando do seu sistema operacional

Acesse a pasta do seu projeto
Digite: cd <caminho da pasta>

Cria um repositório Git
Digite: git init

Clonar um projeto de um repositório remoto
Digite: git clone <link do repositório>

Cria ramificação
Digite: git branch <nome da ramificação>
Digite: git push <nome do repositório> <nome da ramificação>

Visualiza ramificação
Digite: git branch
Digite: git branch --list

Exclui ramificação
git branch -d <nome da ramificação>





Adiciona os arquivos solicitados ao ambiente de stage
Digite: git add <arquivo> ou git add -A
git add .


Digite: git commit -m "mensagem de confirmação"

Digite: git push <nombre-remoto> <nombre-rama>

Git status

Git checkout

