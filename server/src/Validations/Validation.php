<?php

namespace WebDevBr\Validations;

use Respect\Validation\Validator as v;

class Validation
{

	public static function add(Array $data)
	{
		extract($data);

		if (empty($title) or empty($desc) or empty($link))
			throw new \InvalidArgumentException("Você precisa enviar todos os campos");

		if (!v::string()->length(3,100)->validate($title))
			throw new \InvalidArgumentException("Título inválido");

		if (!v::string()->length(5,500)->validate($desc))
			throw new \InvalidArgumentException("Descrição inválida");

		if (!v::string()->length(5,270)->validate($link))
			throw new \InvalidArgumentException("Link inválido");

		if (!v::url()->validate($link))
			throw new \InvalidArgumentException("Isso não é um link");

		return true;
	}
}