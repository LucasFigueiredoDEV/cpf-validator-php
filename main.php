<?php
// Execute this function with cpf parameter. If return true, cpf is valid else isn't valid
// Execute essa função passando o cpf como paramêtro. Se retornado true, o cpf é valido, se não o cpf é inválido.

function validaCpf($numero) {
	// Converta o número para uma string
	$numeroString = (string)$numero;
	$soma = 0;
	$multiplicador = 10;
	// Percorre cada caractere da string
	for ($i = 0; $i < strlen($numeroString) - 2; $i++) {
		// Obtém o dígito atual
		$digito = $numeroString[$i];
		// Converte o digito atual de string para inteiro
		$digitoInt = (int) $digito;
		// Multiplica o digito atual pelo valor que corresponde à sua posição no algoritmo
		$multplicaDigito = $digitoInt * $multiplicador;
		// Soma os valores da multiplicação
		$soma += $multplicaDigito;
		// Subtrai -1 do multiplicador
		$multiplicador --;
	}
	// Calcula o resto da divisão feita entre a soma/11
	$resto = $soma % 11;
	// Verifica se o valor do resto é menor que dois e define o valor do penúltimo digito
	if ($resto >= 2){
		$penultimoDigito = 11 - $resto;
	} else {
		$penultimoDigito = 0;
	}
	// Verifica se o valor do penultimo digito calculado é igual ao do penultimo digito do cpf enviado
	if (substr($numeroString, -2, -1) === (string) $penultimoDigito){
		$primeiraValidacao = true;
	} else {
		$primeiraValidacao = false;
	}
	// Predefinindo segunda soma  e mutiplicaçao
	$soma2 = 0;
	$multiplicador2 = 11;
	// Verifica se a primeira validação foi igual true e caso seja executa o calculo do último digito se não, é retornado falso, ou seja, cpf inválido.
	if ($primeiraValidacao){
		for ($i = 0; $i < strlen($numeroString) - 1; $i++) {
			// Obtém o dígito atual
			$digito = $numeroString[$i];
			$digitoInt = (int) $digito;
			$multplicaDigito = $digitoInt * $multiplicador2;
			$soma2 += $multplicaDigito;
			$multiplicador2 --;
		}
                                    
		$resto2 = $soma2 % 11;
		if ($resto2 >= 2){
			$ultimoDigito = 11 - $resto2;
		} else {
			$ultimoDigito = 0;
		}

		if (substr($numeroString, -1) === (string) $ultimoDigito){
			$segundaValidacao = true;
		} else {
			$segundaValidacao = false;
		}
	} else {
		return false;
	}
                                
	// Verifica se a primeira e a segunda validação são iguais a true e retorna true caso as duas sejam iguais se não, é retornado false
	if($primeiraValidacao == true && $segundaValidacao == true){
		return true;
	} else {
		return false;
	}
}
?>