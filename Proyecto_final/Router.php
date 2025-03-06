<?php
namespace Vendor\Mvc;
class Router{
    public function __construct(){
        echo "construyendo las rutas";
    }
    public array $getRoutes=[];
    public array $postRoutes=[];
    //guarda la url
    public function get($url,$fn){
        $this->getRoutes[$url]=$fn;
    }
    public function post($url,$fn){
        $this->postRoutes[$url]=$fn;
    }
    public function ComprobarRutas(){
        //sacamos la url actual
        $urlActual=$_SERVER['PATH_INFO']??'/';
        $metodo=$_SERVER['REQUEST_METHOD'];
        //comprobamos q es get
        if ($metodo == 'GET') {
            $fn=$this->getRoutes[$urlActual]??null;
        }
        else{
            $fn=$this->postRoutes[$urlActual]??null;

        }
        
        if($fn){
            //pasamos la url al navegaodr
            call_user_func($fn,$this);
        }
        else{
            echo "Pagina no encontrada";
        }

        
    }
    public function render($ubicacion, $datos=[]){
        ob_start();
       foreach ($datos as $key => $value) {
         $$key=$value;
       }
        //include carga html
        include __DIR__."/views/$ubicacion.php";
        $contenido=ob_get_clean();
        include __DIR__."/views/layout.php";
    }
}
?>