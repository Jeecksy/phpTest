<?php

//manejo de sesiones de php
session_start();

function validarSesion() {
    return isset($_SESSION);
}

function validarUser() {
    return isset($_SESSION['nombre']);
}

function iniciarSesion($usuario) {
    $attrib = "nombre";
    set($attrib, $usuario);
}

function get($attrib) {
    return $_SESSION["$attrib"];
}

function set($attrib, $value) {
    $_SESSION["$attrib"] = $value;
}

function cerrarSesion() {
    session_destroy();
}
