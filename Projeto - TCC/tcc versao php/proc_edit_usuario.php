
<?php
	require 'conexao.php';

	if(isset($_POST['alterar'])) {
		$errMsg = '';

		// Get data from FROM
		$id = $_POST['id'];
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
			echo "erro ao alterar";

			try {
				$stmt = $connect->prepare('UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, usuario = :usuario, email = :email, senha = :senha, modified = current_timestamp  WHERE id = :id');
				 $stmt->execute(array( 
					':id' => $id,
					':nome' => $nome,
					':sobrenome' => $sobrenome,
					':usuario' => $usuario,
					':email' => $email,
					':senha' => $senha,
				));
				$_SESSION['usuario'] = $usuario;
				$_SESSION['senha'] = $senha;
				header('Location: perfil.php');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can <a href="perfil.php">Perfil</a>';
	}
?>

