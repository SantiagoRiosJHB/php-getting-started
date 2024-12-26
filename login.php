<?php
session_start();

// Datos de conexión a Active Directory
$ldap_host = "ldap://192.168.96.15";
$ldap_dn = "DC=macroagro,DC=com,DC=ar";
$ldap_user = "CN=srios,CN=Users," . $ldap_dn;
$ldap_password = "S4nt1ag0.04";

// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Conectar a LDAP
$ldap_conn = ldap_connect($ldap_host) or die("No se pudo conectar al servidor LDAP.");
ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);

// Autenticar usuario
if (@ldap_bind($ldap_conn, "CN=$username,CN=Users,$ldap_dn", $password)) {
    $_SESSION['username'] = $username;
    header("Location: principal.php");
    exit();
} else {
    echo "Credenciales incorrectas. <a href='index.html'>Inténtalo de nuevo</a>";
}

ldap_close($ldap_conn);
?>