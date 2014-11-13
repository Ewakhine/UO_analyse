<?php
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
		//Vérification du login et du mot de passe haché.
		include('connectionbdd.php');
		$sql = $bdd->query("SELECT * FROM membres WHERE id=1");
		$data = $sql->fetch();
		
		
		if($data['login'] == $_POST['login'] && $data['pass_md5'] == md5($_POST['pass'])) {
			session_start();
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['pass'] = md5($_POST['pass']);
			header('Location: index.php');
		}
		
		else {
			echo '<body onLoad="alert(\'Membre non reconnu...\')">';
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';
		}
		
	}
	else {
		echo '<body onLoad="alert(\'Les variables du formulaire ne sont pas déclarées.\')">';
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
	
	$sql->close();
}
?>
