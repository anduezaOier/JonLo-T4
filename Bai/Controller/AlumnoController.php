<?php
require_once("../Model/Alumno.php");
class AlumnoController{
    private $alumno;
    function __construct(){
        $this->alumno = new Alumno();
    }
    // function index(){
    //     $alumnoa = new Alumno();
    //     $dato=$alumnoa->selectAlumnos("alumnos");
    //     require_once("View/verAlumnos.php");
    // }
    function mostrar(){
        //Le pide al modelo todos los libros
        $alumno = new Alumno();
        $alumnos = $alumno->getAlumnos();
        //Pasa a la vista toda la información que se desea representar
        //return $alumno;
        include '../View/verAlumnos.php';
    }
    function new(){
        require_once("../View/crearAlumno.php");        
    }
    function save($data){
        // $nombre = $_REQUEST['nombre'];
        // $apellido = $_REQUEST['apellido'];
        // $email = $_REQUEST['email'];
        // $edad = $_REQUEST['edad'];
        // $data = "'".$nombre."','".$apellido."','".$email."','".$edad."'";
        $alumno2 = new Alumno();
        $alumno2->crearAlumno($data);
        //header("location: crearAlumno.php");
     }
    // function takeId(){
    //     $id = $_REQUEST['id'];
    //     $alumno = new Alumno();
    //     $dato = $alumno->selectAlumnos("alumnos","id=".$id);
    //     require_once("../View/editarAlumno.php");
    // }
    //  function update(){
    //      $id = $_REQUEST['id'];
    //      $nombre = $_REQUEST['nombre'];
    //      $apellido = $_REQUEST['apellido'];
    //      $email = $_REQUEST['email'];
    //      $edad = $_REQUEST['edad'];
    //      $data = "'".$nombre."','".$apellido."','".$email."','".$edad."'";
    //      $clause = "id=".$id;
    //      $alumno = new Alumno();
    //      $dato = $alumno->editarAlumno("alumnos", $data,$clause);
    //      header();
    //  }
     function delete($id){
         $alumno = new Alumno();
         $alumno->borrarAlumno($id);
     }
}
?>