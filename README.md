# Comunidade CakePHP Brasil

## Para adicionar um link

Fork este repositório e adicione o seu pacote no final de arquivo `public/links.json` no seguinte formato.

	{
		"title" : "Título do artigo",
		"desc" : "Uma breve descrição.",
		"link": "link para seu artigo"
	}

Não esqueça de adicionar uma virgula no final do item anterior.

## Para ajudar com correções

Você vai precisar do NPM e Bower instalados, após isso rode os comandos a seguir:

	npm install
	bower install

No final você deverá acabar com dois novos diretórios, `node_modules` e `resources`, você vai usar o `resources`

Dentro do diretório `resources` temos o diretório `my`, dentro dele estão os arquivos originais de Javascript e Sass.

Após editar os arquivos você deverá gerar os novos css e js minificados com o comando a seguir:

	gulp --production

Para manter o Gulp aguardando suas alterações (em vez de digital o comando acima toda hora), basta fazer isso:

	gulp watch --production

O site está dentro do diretório public, você deve acessa-lo no navegador ou apontar o servidor para ele, não é possível ver a aplicação sem um servidor HTTP.


