<?php
	require_once("config.php");

	/**
	 * Class responsavel por cadastrar e manipular os dados de usuario
	 */
	class Usuario
	{
		private $idUsuario;
		private $desLogin;
		private $desSenha;
		private $dtCadastro;
		
		# Métodos get
		public function getIdUsuario()
		{
			return $this->idUsuario;
		}

		public function getDesLogin()
		{
			return $this->desLogin;
		}

		public function getDesSenha()
		{
			return $this->desSenha;
		}

		public function getDtCadastro()
		{
			return $this->dtCadastro;
		}

		# Métodos set
		public function setIdUsuario($idUsuario)
		{
			$this->idUsuario = $idUsuario;
		}

		public function setDesLogin($desLogin)
		{
			$this->desLogin = $desLogin;
		}

		public function setDesSenha($desSenha)
		{
			$this->desSenha = $desSenha;
		}

		public function setDtCadastro($dtCadastro)
		{
			$this->dtCadastro = $dtCadastro;
		}

		/** Busca as informações de um usuario pelo id e devolve um array(array)*/
		public function loadById($id)
		{
			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
					":ID"=>$id
				));
			# Testa a existencia de dados no banco
			if(isset($results))
			{
				$row = $results[0];

				# Carrega os dados do banco para o objeto
				$this->setIdUsuario  ($row['idusuario']);
				$this->setDesLogin   ($row['deslogin']);
				$this->setDesSenha   ($row['dessenha']);
				$this->setDtCadastro (new DateTime($row['dtcadastro']));
			}
		}

		# Carrega uma lista de usuarios;
		public static function getList()
		{
			$sql = new Sql();
			return $sql->select("SELECT *FROM tb_usuarios ORDER BY deslogin;");
		}

		# Busca usuarios pelo login
		public static function getSearch($login)
		{
			$sql = new Sql();
			return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
				':SEARCH' => '%'.$login.'%'
			));
		}

		# Busca usuarios apartir de login e senha do mesmo
		public function login($login, $password)
		{
			$sql = new Sql();
			$result= $sql->select("SELECT *FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSW",
				array(
				':LOGIN' => $login,
				':PASSW' => $password
				)
			);
			if(count($result) > 0)
			{
				$row = $result[0];

				$this->setIdUsuario($row['idusuario']);
				$this->setDesLogin ($row['deslogin']);
				$this->setDesSenha ($row['dessenha']);
				$this->setDtCadastro(new DateTime($row['dtcadastro']));
			}
			else{
				throw new Exception(" Login e/ou senha inválidos. ");
			}
		}
		public function __toString()
		{
			return json_encode(array
				(
					"idusuario"  => $this->getIdUsuario(),
					"deslogin"   => $this->getDesLogin(),
					"dessenha"   => $this->getDesSenha(),
					"dtcadastro" => $this->getDtCadastro()->format("d/m/Y H:i:s")
				)
			);
		}
	}
?>