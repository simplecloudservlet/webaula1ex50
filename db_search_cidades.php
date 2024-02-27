
	<?php

	function echoTabelaJSON($tabela){
		$tabela->setFetchMode(PDO::FETCH_ASSOC);
		header("Content-Type: application/json", true);
		echo json_encode($tabela->fetchAll()); //Retorna a resposta no formato JSON
	}

	function buscarTabela(){

		//Para popular a tabela, mesmos passos do webaula1ex48
		$DATABASE = "mysql";
		$HOST = "localhost";
		$DBNAME = "db_cidades"; //mysql> create database db_cidades;
		$USER = "lucio";
		$PASSWORD = "root";

		$db = new PDO("$DATABASE: host=$HOST; dbname=$DBNAME", $USER, $PASSWORD); //Para o MySQL

		$parametro = '%' . $_GET["cidade"] . '%';
		$sql = 'SELECT * FROM T_CIDADES WHERE nome LIKE \'' . $parametro . '\';';
		
		$tabela = $db->query($sql);

		if($tabela){
			echoTabelaJSON($tabela);
		} else {
			echo 'Cidade não encontrada.';
		}

		
	}

	function main(){

		if(isset($_GET["cidade"])){
			console.log($_GET["cidade"]);
			buscarTabela();
		} else {
			echo 'Cidade não informada na requisição';
		}
	}

	//Invoca a funcao
	main();

	?>
	