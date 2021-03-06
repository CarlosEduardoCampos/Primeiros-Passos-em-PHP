<!--Documento.php-->
<?php
	class Documento
	{
		//Atributos
		private $numero;

		//Métodos
		/// GET
		public function getNumero()
		{
			return $this -> numero;
		}
		/// SET
		public function setNumero($numero)
		{
			if(!Documento::validaCPF($numero))
			{
				throw new Exception("CPF iformado é invalido", 1);// Mostra um erro
			}
			$this -> numero = $numero;
		}

		public function validaCPF($cpf):bool
		{
			//Verifica se um número foi informado
			if (empty($cpf)) return false;
			
			//Elimina possísvel  mascara 
			$cpf = preg_replace('[0-9]', '', $cpf);
			$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

			//Verifica se o numero de digitos informados é igual a 11
			if (strlen($cpf) != 11) return false;

			/* Verifica se nenhuma das seguências invalidas abaixo
			foi digitada. Caso afirmativo, retorna false */
			else if
				(
					$cpf == "00000000000" ||
					$cpf == "11111111111" ||
					$cpf == "22222222222" ||
					$cpf == "33333333333" ||
					$cpf == "44444444444" ||
					$cpf == "55555555555" ||
					$cpf == "66666666666" ||
					$cpf == "77777777777" ||
					$cpf == "88888888888" ||
					$cpf == "99999999999"
				)
			{
				return false;
			}
			// Calcula os digitos verificandores para ver se o cpf e valido
			/* !!!A sintaxe de acesso a array e string com colchetes não é
				mais suportada!!
				//
				else
				{
					for ($t=0; $t < 11 ; $t++)
					{ 
						for ($d=0; $d < 11 ; $d++)
						{ 
							$d += $cpf{$c} * (($t + 1) - $c);
						}
						$d = ((10 * $d) % 11) % 10;
						if($cpf{$c} != $d) return false;
					}
				}
			*/
			return true;
		}
	}
	$cpf = new Documento();
	//
	$cpf -> setNumero("12345678912");
	var_dump($cpf -> getNumero());
?>
