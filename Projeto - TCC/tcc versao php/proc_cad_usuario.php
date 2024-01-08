
<?php
	require 'conexao.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$usuario = $_POST['usuario'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		

		if($nome == '')
			$errMsg = 'Enter your nome';

		if($sobrenome == '')
			$errMsg = 'Enter sobrenome';

		if($usuario == '')
			$errMsg = 'Enter your usuario';

		if($email == '')
			$errMsg = 'Enter email';

		if($senha == '')
			$errMsg = 'Enter your senha';

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO usuarios (nome, sobrenome, usuario, email, senha ) VALUES (:nome, :sobrenome, :usuario, :email, :senha )');
				$stmt->execute(array(
					':nome' => $nome,
					':sobrenome' => $sobrenome,
					':usuario' => $usuario,
					':email' => $email,
					':senha' => $senha));
				/*mudar para a página depois do cadastro */
				header('Location: entrar.php');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can <a href="#">Perfil</a>';
	}
?>

