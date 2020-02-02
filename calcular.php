<?php 

if(isset($_POST["btncalcular"])){

    require_once 'logica/Salario.php';
    require_once 'logica/Salud.php';
    require_once 'logica/Pension.php';
    require_once 'logica/Caja.php';

    //Recuperar valores del formulario
    $cantidadHoras = $_POST["txthorastrabajadas"];
    $valorhora = $_POST["txtcostohoratrabajo"];

    //Instanciar clases hijas
    $objSalario = new Salario($cantidadHoras, $valorhora);
    $objSalud = new Salud($cantidadHoras, $valorhora);
    $objPension = new Pension($cantidadHoras, $valorhora);
    $objCaja= new Caja($cantidadHoras, $valorhora);


    echo "<b> El salario bruto es: </b>" . $objSalario->calcularSalarioBruto()."<br>";

    if($objSalario->calcularSalarioBruto() <= 1000000){

        echo "<b>El descuento de salud es: </b>" . $objSalud->calcularSalud(0.02) . "<br>";

        echo "<b>El descuento de pensión es: </b>" . $objPension->calcularPension(0.04) . "<br>";
    
        $incremento = $objSalario->calcularSalarioBruto() * 0.03;

        $salarioFinal = ($objSalario->calcularSalarioBruto() + $incremento) - $objSalud->calcularSalud(0.02) - $objPension->calcularPension(0.04);
        echo "<b>Salario a pagar: </b>" . $salarioFinal;

    }else if($objSalario->calcularSalarioBruto() > 1000000 && $objSalario->calcularSalarioBruto() <=2000000){
        
        echo "<b>El descuento de salud es: </b>" . $objSalud->calcularSalud(0.04) . "<br>";

        echo "<b>El descuento de pensión es: </b>" . $objPension->calcularPension(0.06) . "<br>";
    
        echo "<b>descuento de caja de compensacion es: </b>" . $objCaja->calcularCaja(0.02) . "<br>";

        $salarioFinal = $objSalario->calcularSalarioBruto() - $objSalud->calcularSalud(0.04) - $objPension->calcularPension(0.06) - $objCaja->calcularCaja(0.02);
        echo "<b>Salario a pagar: </b>" . $salarioFinal;

    
    }else if($objSalario->calcularSalarioBruto() > 2000000){

        echo "<b>El descuento de salud es: </b>" . $objSalud->calcularSalud(0.05) . "<br>";

        echo "<b>El descuento de pensión es: </b>" . $objPension->calcularPension(0.07) . "<br>";
;
        echo "<b>descuento de caja de compensacion es: </b>" . $objCaja->calcularCaja(0.03) . "<br>";

        $salarioFinal = $objSalario->calcularSalarioBruto() - $objSalud->calcularSalud(0.05) - $objPension->calcularPension(0.07) - $objCaja->calcularCaja(0.03);
        echo "<b>Salario a pagar: </b>" . $salarioFinal;

    
    }

}else{
    echo "Estas hackeando";
}

?>