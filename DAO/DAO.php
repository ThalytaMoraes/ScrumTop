<?php
	

// Classe Dao abstrata
abstract class Dao {
	
	
	protected $connection; 				  		   # Conexão
	protected $query;      				  		   # Armazena a última consulta realizada
	
	protected $host 	   = "localhost";   # Host para acesso ao banco
	protected $banco 	   = "scrumtop"; # Banco de dados a ser usado
	protected $usuario 	   = "root";      	# Login para acesso ao banco
	protected $senha 	   = "";                # Senha do usuário no banco
	
	// Construtor
	protected function __construct(){
	}
	
	// Destrutor
	public function __destruct(){ 
	}
	
	public function ChangeSpecialCharacterAndDelSqlInjection($str){ // Evita sql injection e converte caracters especiais
		if (!is_numeric($str)) {
			
			// Convert os caracters - início
			$accents = array("á", "â", "ã", "ä", "é", "è", "ê",
											 "ë", "í", "ì", "î", "ï", "ó", "ò", "ô",
											 "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á",
											 "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë",
											 "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ",
											 "Ö", "Ú", "Ù", "Û", "Ü", "Ç", "à", "à");
			
			$utf8 = array("Ã¡","Ã¢","Ã£","Ã¤","Ã©","Ã¨","Ãª","Ã«",
										"Ã­","Ã¬","Ã®","Ã¯","Ã³","Ã²","Ã´","Ãµ","Ã¶",
										"Ãº","Ã¹","Ã»","Ã¼","Ã§","Ã","Ã€","Ã‚","Ãƒ","
										Ã„","Ã‰","Ãˆ","ÃŠ","Ã‹","Ã","ÃŒ","ÃŽ","Ã","Ã
										“","Ã’","Ã”","Ã•","Ã–","Ãš","Ã™","Ã›","Ãœ","Ã‡","Ã","Ã ");
		
			// Convert os caracters - fim
			$str = str_replace($utf8, $accents, $str); 
			
			// Converte os caracters especiais HTML para código
			$str = htmlentities($str, ENT_QUOTES);
			
			// Corrige erro com à
			$str = str_replace("&agrave;&nbsp;", "&agrave;", $str);			
		
			// Evita SQL injection
			$str = get_magic_quotes_gpc() ? stripslashes($str) : $str;
			$str = function_exists('mysqli_real_escape_string') ? mysqli_real_escape_string($str) : mysqli_escape_string($str);
		}
		return $str;
	}
	
	private function __connect(){ // Efetua a conexão com o servidor de bando de dados usando os dados informados (host, usuario, senha)
		if(!$this->connection = mysqli_connect("{$this->host}",$this->usuario,$this->senha,$this->banco))
			if(mysqli_errno() == 2002)
				throw new Exception("Erro! O host informado está inacessível.");
			else 
				if(mysqli_errno() == 1045)
					throw new Exception("Erro! Usuário ou Senha do banco de dados inexistente.");
			else 
				throw new Exception("Erro! Não foi possível conectar ao banco de dados.");		
			
		mysqli_query($this->connection,"SET NAMES 'utf8';");
			
	}
	
	private function __selectDB(){ // Seleciona o bando de dados para ser usado utilizando (banco, conexao obtida de __connect())
		if(!mysqli_select_db($this->connection,$this->banco))
			if(mysqli_errno() == 1049)
				throw new Exception("Erro! O banco de dados informado inexistente.");
			else
				throw new Exception("Erro! Não foi possível selecionar o banco de dados especificado.");
	}
	
	private function __close(){ // Encerra a conexão com o servidor
		if(!mysqli_close($this->connection))
			throw new Exception("Erro! Não foi possível encerrar a conexão com o banco de dados.");
	}
	
	private function __query($pSQL){ // Executa uma consulta SQL
		if(!$this->query = mysqli_query($this->connection,$pSQL))
			throw new Exception("Erro! Não foi possível executar a consulta SQL:<br>".$pSQL);
		return $this->query;
	}
	
	private function __lines(){ // Conta o número de resultados obtidos na última consulta SQL
                        $lines = null;
            if(mysqli_num_rows($this->query)>0)
				if(!$lines = mysqli_num_rows($this->query))
				throw new Exception("Erro! Não foi possível contar o número de resultados para a consulta SQL.");
		return $lines;
	}
			
//	private function __content($pLine, $pField){ // Retorna o conteúdo da coluna e linha do resultado escolhidos
//		return mysqli_result($this->query, $pLine, $pField);
//	}
		
	private function __free(){ // Libera a memória usada para os dados da consulta
		if(!mysqli_free_result($this->query))
			throw new Exception("Erro! Não foi possível liberar a memória utilizada.");
	}

	public function __initialize(){ // Tenta fazer a conexão e seleção do banco de dados
		try{
			$this->__connect();
			$this->__selectDB();
		}catch(Exception $e){
			throw $e;
		}
	}
	
	public function __finalize(){ // Tenta encerrar a conexão com o banco de dados
		try{
			$this->__close();								
		}catch(Exception $e){
			throw $e;
		}
	}
					
	public function __executeSQL($pSQL){ // Tenta executar uma consulta SQL no banco de dados
		try{
			$pSQL = trim($pSQL); // Remove os espaços em branco no string
									
			return $this->__query($pSQL);								
		}catch(Exception $e){
			throw $e;
		}
	}
	
	public function __returnLinesSQL(){ // Tenta executar uma consulta SQL no banco de dados
		try{
			return $this->__lines();								
		}catch(Exception $e){
			throw $e;
		}
	}
	
	public function __returnSpecificContentSQL($pLine, $pField){ // Tenta obter o conteúdo de uma coluna e uma linha específicos
		try{
			return $this->__content($pLine, $pField);								
		}catch(Exception $e){
			throw new Exception("Erro! Não foi possível obter o conteúdo solicitado.");
		}
	}
	
	public function __freeMemory(){ // Tenta limpar a última consulta da memória
		try{
			$this->__free();								
		}catch(Exception $e){
			throw $e;
		}
	}

	public function __set($atributo, $valor){ // O método __set() sobrescrevendo o da classe mãe
		switch($atributo){
			case host  : $this->host  = $valor; break;
			case banco : $this->banco = $valor; break;
			case login : $this->login = $valor; break;
			case senha : $this->senha = $valor; break;
			case query : $this->query = $valor; break;
			default    : echo "Erro! Atributo {$atributo} inexistente<br>"; break;
		}
	}
	
	public function __get($atributo){ // O método __get() sobrescrevendo o da classe mãe
		switch($atributo){
			case host  : return $this->host;  break;
			case banco : return $this->banco; break;
			case login : return $this->login; break;
			case senha : return $this->senha; break;
			case query : return $this->query; break;
			default    : echo "Erro! Atributo {$atributo} inexistente<br>"; break;
		}
	}
	
	public function __call($metodo, $parametros){ // Quando um método não é econtrado, a chamada é redirecionada para o método __call()   
		echo "Erro! O método {$metodo}(";
		$i = 1;
		foreach($parametros as $key => $parametro){
			echo "$parametro";
			if ($i < count($parametros)) echo ", ";
			$i++;
		}
		echo ") não foi encontrado.<br>";   
	}
	
	public function __tostring(){ // O método __tostring() sobrescrevendo o da classe mãe   
		$tostring .= "Host: {$this->host}       <br>";
		$tostring .= "Banco: {$this->banco}     <br>";
		$tostring .= "Usuário: {$this->usuario} <br>";
		$tostring .= "Senha: {$this->senha}     <br>";
		return $tostring;        
	}
}
?>