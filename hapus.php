<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

require 'function.php';

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
    <script>
    alert('data berhasil dihapus!');
    document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('gagal menghapus data!);
    </script>
    ";
}
?>