<?php
 
include_once '../modelos/Dao.php';

class Encuesta{
	public static $db = null;

	public function __construct()
    {
        $this->db = new Dao();
        $this->db->connect();
    }

    /*
		Método que obtiene las preguntas que se aplicarán en la encuesta y las devuelve ordenadas.
    */
    public function obtienePreguntas(){
    	$this->db->select("pregunta", "*", "estado_Pregunta = 1", "orden");
    	$res = $this->db->getResult();
    	
    	return ($res) ? $res : false;
    }

    /*
		Método que registra la encuesta o comentario que un cliente realiza.
		Si recibe el arreglo de respuestas, será una encuesta, de lo contrario, solo será un comentario.
    */
    public function registraEncuesta($sucursal, $nombre, $telefono, $correo, $tipo_C, $destino_C, $area_C, $comentario, $respuestas = ""){
    	$datos = [$sucursal, date("Y-m-d"), date("H:i:s"), $tipo_C, $destino_C, $area_C, $comentario, $nombre, $telefono, $correo];
    	$id_Encuesta = $this->db->insert("encuesta", $datos, "id_Sucursal,fecha,hora,tipo_Comentario,destinatario_Comentario,area_destinatario,comentario,nombre_contacto,telefono_contacto,correo_contacto");

    	if(!$id_Encuesta){
    		echo "ERROR!: No se pudo registrar la encuesta";
    		return false;
    	}

    	if($respuestas){
	    	$errores = 0;
	    	foreach($respuestas as $resp){
	    		$inserta = $this->bd->insert("respuesta", [$resp["id_Pregunta"], $id_Encuesta, $resp["valor"]], "id_Pregunta,id_Encuesta,valor");
	    		if(!$inserta)
	    			$errores++;
	    	}

	    	if($errores){
	    		echo "ERROR!: No se pudieron registrar $errores respuestas";
	    		return false;
	    	}
    	}

    	return true;
    }
}

?>