<?php 

require_once 'Empleados.php';

class Salud extends Empleados{

    public function __construct(){
        $parametros = func_get_args();
        $numero_parametros = func_num_args();
        //__construct1()  __construct2() 
        $funcion_constructor = '__construct' . $numero_parametros;
        if(method_exists($this,$funcion_constructor)){
            call_user_func_array(array($this, $funcion_constructor), $parametros);
        }
      }

    public function calcularSalud($porcentaje){
        return ( ($this->getCantidadHoras() * $this->getValorHora()) * $porcentaje);
    }

}

?>