<?php 

class Empleados{

    private $cantidadHoras;
    private $valorHora;

    public function __construct(){
      $parametros = func_get_args();
      $numero_parametros = func_num_args();
      //__construct1()  __construct2() 
      $funcion_constructor = '__construct' . $numero_parametros;
      if(method_exists($this,$funcion_constructor)){
          call_user_func_array(array($this, $funcion_constructor), $parametros);
      }
    }

    public function __construct0(){
        $this->cantidadHoras = 0;
        $this->valorHora = 0;
    }

    //ch: cantidad horas
    //vh: valor horas

    public function __construct2($ch, $vh){
        $this->cantidadHoras = $ch;
        $this->valorHora = $vh;
    }

    public function __construct1($valor){
        $this->cantidadHoras = 0;
        $this->valorHora = 0;
    }

    public function setCantidadhoras($valor){
        $this->cantidadHoras = $valor;
    }

    protected function getCantidadHoras(){
        return $this->cantidadHoras;
    }

    public function setValorHora($valor){
        $this->valorHora = $valor;
    }

    protected function getValorHora(){
        return $this->valorHora;
    }

}

?>