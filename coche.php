<?php

// Crear clase
class Coche {
    // Atributos Públicos
    public $marca; 
    public $color;
    public $velocidad;
    private $matricula; // Atributo privado
    protected $combustible; // Atributo usado por herencias

    // Constructor
    public function __construct($marca, $color, $matricula) {
        $this->marca = $marca;
        $this->color = $color;
        $this->velocidad = 0; // le asignmos 0 por defecto.
        $this->matricula = $matricula;
        $this->combustible = 0; // Nivel de combustible inicial
    }

    public function acelerar($cantidad) {
        $this->velocidad += $cantidad;
    }

    public function mostrarInfo() {
        return "<li>Marca: " . $this->marca . " - Color: " . $this->color . " - Velocidad: " . $this->velocidad . " - Combustible: " . $this->combustible . "</li>";
    }

    //metodo mostrar matricula
    public function getMatricula() {
        return $this->matricula;
    }

    //metodo mostrar nivel de combustible
    public function getCombustible() {
        switch ($this->combustible) {
            case 0:
                return "Batería Cargada";
            case ($this->combustible <= 50 && $this->combustible < 90):
                return "Batería ta medio llena";
            case ($this->combustible >= 90 && $this->combustible < 100):
                return "Batería Cargada";
            case 100:
                return "Tas atope de Power!";
            default:
                return "Nivel de batería desconocido";
        }
    }
}


// Crear objeto
$miCoche = new Coche("Opel", "Rojo", "ABC123");
$cocheJorge = new Coche("Honda", "Azul", "XYZ789");
$cochePa = new Coche("Toyota", "Blanco", "DEF456");

//Ver Propiedades particulares (públicas)
echo $miCoche->marca; // Acceder a propiedad

// Modificar Propiedades (públicas)
$miCoche->color = "Negro"; // Modificar propiedad   
$cocheJorge->color = "Verde"; // Modificar propiedad
$cochePa->marca = "Ford"; // Modificar propiedad

//Mostrar datos privados
echo $miCoche->getMatricula(); // Mostrar matrícula
echo $cocheJorge->getMatricula(); // Mostrar matrícula
echo $cochePa->getMatricula(); // Mostrar matrícula

// Usar métodos
$miCoche->acelerar(30);

echo $miCoche->mostrarInfo();
echo $cocheJorge->mostrarInfo();
echo $cochePa->mostrarInfo();



// Coche Electrico - Heredados
class CocheElectrico extends Coche {
    public function cargarBateria($nivelCarga) {
        $this->combustible = $nivelCarga; // Accedemos al atributo protegido de la clase padre
    }
}

$cocheElectrico = new CocheElectrico("Tesla", "Blanco", "ELEC123");
$cocheElectrico->cargarBateria(25); // Cargar la batería al 25%

echo $cocheElectrico->mostrarInfo();
echo $cocheElectrico->getMatricula(); // Mostrar matrícula del coche eléctrico
echo $cocheElectrico->getCombustible(); // Mostrar estado de la batería

