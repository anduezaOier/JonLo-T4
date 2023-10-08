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
      function update($data, $id){
          $alumno = new Alumno();
          $alumno->editarAlumno($data, $id);
      }
     function delete($id){
         $alumno = new Alumno();
         $alumno->borrarAlumno($id);
     }
}
?>