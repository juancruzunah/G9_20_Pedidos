<?php

  header('Content-Type:application/json');

  require_once ("../config/conexion.php");
  require_once ("../models/Pedidos.php");

  $pedidos=new Pedidos();

  $body=json_decode(file_get_contents("php://input"), true);

switch($_GET["OP"]){ 

  case "GetMapedidos":
    $datos=$pedidos->get_pedidos();
    echo json_encode($datos);
  break;

  case"GetUno":
    $datos=$pedidos->get_pedido($body["ID"]);
    echo json_encode($datos);
  break;

  case "InsertPedidos":
    $datos=$pedidos->insert_pedido($body["ID_SOCIO"], $body["FECHA_PEDIDO"], $body["TEXTO"], 
    $body["SUB_TOTAL"], $body["TOTAL_ISV"], $body["TOTAL"], $body["FECHA_ENTREGA"], $body["ESTADO"]);
    echo json_encode("Pedido Agregado");
  break;

  case "UpdatePedidos":
    $datos=$pedidos->update_pedido($body["ID"], $body["ID_SOCIO"], $body["FECHA_PEDIDO"], $body["TEXTO"], 
    $body["SUB_TOTAL"], $body["TOTAL_ISV"], $body["TOTAL"], $body["FECHA_ENTREGA"], $body["ESTADO"]);
    echo json_encode("Pedido Actualizado");
  break;

  case "DeletePedidos":
    $datos=$pedidos->delete_pedido($body["ID"]);
    echo json_encode("Pedido Eliminado");
  break;
}

?>