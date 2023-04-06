<?php 
session_start();
$bdd  = new PDO('mysql:host=127.0.0.1;dbname=quickcal_db;charset=utf8','root','');
?>

<?php 
if(!isset($_SESSION['pseudo']) && !isset($_SESSION['email']) ){
    header('location:connection.php');
    exit();
}
// if (isset($_SESSION["id"]) && $_GET['id']>0){
//     $get_id = intval($_GET['id']);
//     $users_req = $bdd->prepare("SELECT * FROM users WHERE id=?");
//     $users_req->execute(array($get_id));
//     $info = $users_req->fetch();
// };


?>

