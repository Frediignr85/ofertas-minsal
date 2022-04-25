<?php

namespace App\Controllers;
use App\Models\ModeloInicio;
header('Access-Control-Allow-Origin: *');
class Inicio extends BaseController
{
    function __construct()
    {
        $this->ElModelo = new ModeloInicio();
        helper('utilidades'); 
        helper('url');
    }
    public function index()
    {
        $session = session(); 
        $modelo = $this->ElModelo;
        $query = $modelo->todas_las_ofertas();
        $result = $query->getResultArray();
        shuffle($result);
        $contenido = "";
        foreach ($result as $key => $value) {
            $contenido.="<div class=\"product\">";
            $contenido.="<div class=\"product__header\">";
            $contenido.="<img src=\"http://localhost/promociones/assets/".$value['imagen_logo']."\" alt=\"product\">";
            $contenido.="</div>";
            $contenido.="<div class=\"product__footer\">";         
            $titulo = $value['nombre'];
            if(strlen($titulo) > 30){
                $titulo =  substr($titulo, 0, 26)."..."; 
            }
            $contenido.="<h3>$titulo</h3>";
            $contenido.="<div class=\"product__price\">";
            $contenido.="<h4>Vence el ".ED($value['fecha_fin'])." "._hora_media_decode($value['hora_fin'])."</h4>";
            $contenido.="</div>";
            $contenido.="</div>";
            $contenido.="<ul>";
            $contenido.="<li>";
            $contenido.="<a  data-toggle='modal' href=\"".base_url("/inicio/ver_oferta?id_oferta=".$value['id_promocion'])."\"  data-target='#deleteModal' data-refresh='true'>";
            $contenido.="<svg>";
            $contenido.="<use";
            $contenido.=" xlink:href=\"".base_url("/assets/images/sprite.svg#icon-eye")."\">";
            $contenido.="</use>";
            $contenido.="</svg>";
            $contenido.="</a>";
            $contenido.="</li>";
            $contenido.="</ul>";
            $contenido.="</div>";
        }
        $datos['result'] = $contenido;
        $query2 = $modelo->traer_ultimas_ofertas();
        $query2 = $query2->getResultArray();
        shuffle($query2);
        $contenido = "";
        foreach ($query2 as $key => $value) {
            $contenido.="<li class=\"glide__slide\">";
            $contenido.="<div class=\"product\">";
            $contenido.="<div class=\"product__header\">";
            $contenido.="<img src=\"http://localhost/promociones/assets/".$value['imagen_logo']."\" alt=\"product\">";
            $contenido.="</div>";
            $contenido.="<div class=\"product__footer\">";         
            $titulo = $value['nombre'];
            if(strlen($titulo) > 30){
                $titulo =  substr($titulo, 0, 26)."..."; 
            }
            $contenido.="<h3>$titulo</h3>";
            $contenido.="<div class=\"product__price\">";
            $contenido.="<h4>Vence el ".ED($value['fecha_fin'])." "._hora_media_decode($value['hora_fin'])."</h4>";
            $contenido.="</div>";            
            $contenido.="</div>";
            $contenido.="<ul>";
            $contenido.="<li>";
            $contenido.="<a  data-toggle='modal' href=\"".base_url("/inicio/ver_oferta?id_oferta=".$value['id_promocion'])."\"  data-target='#deleteModal' data-refresh='true'>";
            $contenido.="<svg>";
            $contenido.="<use";
            $contenido.=" xlink:href=\"".base_url("/assets/images/sprite.svg#icon-eye")."\">";
            $contenido.="</use>";
            $contenido.="</svg>";
            $contenido.="</a>";
            $contenido.="</li>";
            $contenido.="</ul>";
            $contenido.="</div>";
            $contenido.="</li>";
        }
        $datos['result2'] = $contenido;

        $datos['dato_general'] = $modelo->traer_datos_tipo_promocion();
        $query3 = $modelo->traer_2_random();
        $query3 = $query3->getResultArray();
        $contenido = "";
        foreach ($query3 as $key => $value) {
            $contenido.="<div class=\"collection__box\">";
            $contenido.="<div class=\"img__container\">";
            $contenido.="<img class=\"collection_02\" src=\"http://localhost/promociones/assets/".$value['imagen_logo']."\" alt=\"producto\">";
            $contenido.=" </div>";
            $contenido.="<div class=\"collection__content\">";
            $contenido.="<div class=\"collection__data\">";
            $contenido.="<span>".$value['nombre']."</span>";
            $contenido.="<h4>Vence el ".ED($value['fecha_fin'])." "._hora_media_decode($value['hora_fin'])."</h4>";
            $contenido.="</div>";
            $contenido.="</div>";
            $contenido.="</div>";
        }
        $datos['result3'] =$contenido;
        $query4 = $modelo->traer_5_random();
        $query4 = $query4->getResultArray();
        $contenido = "";
        foreach ($query4 as $key => $value) {
            $contenido.="<li class=\"glide__slide\">";
            $contenido.="<div class=\"hero__center\">";
            $contenido.="<div class=\"hero__left\">";
            $contenido.="<span class=\"\" style=\"color:green;\">Vence el: ".ED($value['fecha_fin'])." "._hora_media_decode($value['hora_fin'])."</span>";
            $contenido.="<h1 class=\"\">".$value['nombre']."</h1>";
            $contenido.="<p>".$value['descripcion']."</p>";
            $contenido.="</div>";
            $contenido.="<div class=\"hero__right\">";
            $contenido.="<div class=\"hero__img-container\">";
            $contenido.="<img class=\"banner_01\" src=\"http://localhost/promociones/assets/".$value['imagen_logo']."\" alt=\"banner2\" />";
            $contenido.="</div>";
            $contenido.="</div>";
            $contenido.="</div>";
            $contenido.="</li>";
        }
        $datos['result4'] = $contenido;
        return view('inicio',$datos);
    }

    public function minsal_informa()
    {
        $session = session(); 
        $modelo = $this->ElModelo;
        $datos['dato_general'] = $modelo->traer_datos_avisos();                
        $query4 = $modelo->traer_5_avisos();
        $query4 = $query4->getResultArray();
        $contenido = "";
        foreach ($query4 as $key => $value) {
            $contenido.="<li class=\"glide__slide\">";
            $contenido.="<div class=\"hero__center\">";
            $contenido.="<div class=\"hero__left\">";
            $contenido.="<h1 class=\"\">".$value['nombre']."</h1>";
            $contenido.="<p>".$value['descripcion']."</p>";
            $contenido.="</div>";
            $contenido.="<div class=\"hero__right\">";
            $contenido.="<div class=\"hero__img-container\">";
            $contenido.="<img class=\"banner_01\" src=\"http://localhost/promociones/assets/".$value['imagen_aviso']."\" alt=\"banner2\" />";
            $contenido.="</div>";
            $contenido.="</div>";
            $contenido.="</div>";
            $contenido.="</li>";
        }
        $datos['result4'] = $contenido;
        return view('minsal_informa',$datos);
    }

    public function establecimientos()
    {
        $session = session(); 
        $modelo = $this->ElModelo;
        $query = $modelo->traer_establecimientos();
        $result = $query->getResultArray();
        shuffle($result);
        $contenido = "";
        foreach ($result as $key => $value) {
            $contenido.="<div class=\"product\">";
            $contenido.="<div class=\"product__header\">";
            $contenido.="<img src=\"http://localhost/promociones/assets/".$value['imagen_logo']."\" alt=\"product\">";
            $contenido.="</div>";
            $contenido.="<div class=\"product__footer\">";         
            $titulo = $value['nombre'];
            if(strlen($titulo) > 30){
                $titulo =  substr($titulo, 0, 26)."..."; 
            }
            $contenido.="<h3>$titulo</h3>";
            $contenido.="</div>";
            $contenido.="<ul>";
            $contenido.="<li>";
            $contenido.="<a href=\"".base_url("/inicio/perfil_establecimiento/".$value['id_establecimiento'])."\" >";
            $contenido.="<svg>";
            $contenido.="<use";
            $contenido.=" xlink:href=\"".base_url("/assets/images/sprite.svg#icon-eye")."\">";
            $contenido.="</use>";
            $contenido.="</svg>";
            $contenido.="</a>";
            $contenido.="</li>";
            $contenido.="</ul>";
            $contenido.="</div>";
        }
        $datos['result'] = $contenido;
        $_SESSION['establecimientos'] = 1;
        return view('establecimientos',$datos);
    }
    public function perfil_categoria($id_categoria)
    {
        $session = session(); 
        $modelo = $this->ElModelo;
        $query2 = $modelo->traer_info_categoria($id_categoria);
        $result2 = $query2->getResultArray();
        $query = $modelo->traer_establecimientos_categoria($id_categoria);
        $result = $query->getResultArray();
        shuffle($result);
        $contenido = "";
        foreach ($result as $key => $value) {
            $contenido.="<div class=\"product\">";
            $contenido.="<div class=\"product__header\">";
            $contenido.="<img src=\"http://localhost/promociones/assets/".$value['imagen_logo']."\" alt=\"product\">";
            $contenido.="</div>";
            $contenido.="<div class=\"product__footer\">";         
            $titulo = $value['nombre'];
            if(strlen($titulo) > 30){
                $titulo =  substr($titulo, 0, 26)."..."; 
            }
            $contenido.="<h3>$titulo</h3>";
            $contenido.="</div>";
            $contenido.="<ul>";
            $contenido.="<li>";
            $contenido.="<a href=\"".base_url("/inicio/perfil_establecimiento/".$value['id_establecimiento'])."\" >";
            $contenido.="<svg>";
            $contenido.="<use";
            $contenido.=" xlink:href=\"".base_url("/assets/images/sprite.svg#icon-eye")."\">";
            $contenido.="</use>";
            $contenido.="</svg>";
            $contenido.="</a>";
            $contenido.="</li>";
            $contenido.="</ul>";
            $contenido.="</div>";
        }
        $datos['result'] = $contenido;
        $datos['datos_categoria'] = $result2;
        $_SESSION['establecimientos'] = 0;
        return view('perfil_categoria',$datos);
    }
    public function perfil_establecimiento($id_establecimiento)
    {
        $session = session(); 
        $modelo = $this->ElModelo;
        $query2 = $modelo->traer_info_establecimiento($id_establecimiento);
        $result2 = $query2->getResultArray();
        $query = $modelo->traer_sucursales_establecimiento($id_establecimiento);
        $result = $query->getResultArray();
        shuffle($result);
        $contenido = "";
        foreach ($result as $key => $value) {
            $contenido.="<div class=\"product\">";
            $contenido.="<div class=\"product__header\">";
            $contenido.="<img src=\"http://localhost/promociones/assets/".$result2[0]['imagen_logo']."\" alt=\"product\">";
            $contenido.="</div>";
            $contenido.="<div class=\"product__footer\">";         
            $titulo = $value['nombre'];
            if(strlen($titulo) > 30){
                $titulo =  substr($titulo, 0, 26)."..."; 
            }
            $contenido.="<h3>$titulo</h3>";
            $contenido.="</div>";
            $contenido.="<ul>";
            $contenido.="<li>";
            $contenido.="<a data-toggle='modal' href=\"".base_url("/inicio/perfil_sucursal?id_sucursal=".$value['id_sucursal'])."\"  data-target='#deleteModal' data-refresh='true'>";
            $contenido.="<svg>";
            $contenido.="<use";
            $contenido.=" xlink:href=\"".base_url("/assets/images/sprite.svg#icon-eye")."\">";
            $contenido.="</use>";
            $contenido.="</svg>";
            $contenido.="</a>";
            $contenido.="</li>";
            $contenido.="</ul>";
            $contenido.="</div>";
        }
        $datos['result'] = $contenido;
        $datos['datos_establecimiento'] = $result2;
        return view('perfil_establecimiento',$datos);
    }
    public function categorias()
    {
        $session = session(); 
        $modelo = $this->ElModelo;
        
        $query2 = $modelo->traer_categorias();
        $query2 = $query2->getResultArray();
        shuffle($query2);
        $contenido = "";
        foreach ($query2 as $key => $value) {
            $contenido.="<li class=\"glide__slide\">";
            $contenido.="<div class=\"product\">";
            $contenido.="<div class=\"product__header\">";
            $contenido.="<img src=\"http://localhost/promociones/assets/".$value['imagen_logo']."\" alt=\"product\">";
            $contenido.="</div>";
            $contenido.="<div class=\"product__footer\">";         
            $titulo = $value['nombre'];
            if(strlen($titulo) > 30){
                $titulo =  substr($titulo, 0, 26)."..."; 
            }
            $contenido.="<h3>$titulo</h3>";           
            $contenido.="</div>";
            $contenido.="<ul>";
            $contenido.="<li>";
            $contenido.="<a href=\"".base_url("/inicio/perfil_categoria/".$value['id_categoria'])."\" >";
            $contenido.="<svg>";
            $contenido.="<use";
            $contenido.=" xlink:href=\"".base_url("/assets/images/sprite.svg#icon-eye")."\">";
            $contenido.="</use>";
            $contenido.="</svg>";
            $contenido.="</a>";
            $contenido.="</li>";
            $contenido.="</ul>";
            $contenido.="</div>";
            $contenido.="</li>";
        }
        $datos['result2'] = $contenido;

        return view('categorias',$datos);
    }
    function ver_oferta(){
        $modelo = $this->ElModelo;
        $id_oferta = $this->request->getGet('id_oferta');
        $query = $modelo->traer_datos_oferta($id_oferta);
        $datosx = $query->getResultArray();
        foreach ($datosx as $key => $value) {
            $datos2['id_promocion'] = $value['id_promocion'];
            $datos2['descripcion'] = $value['descripcion'];
            $datos2['codigo'] = $value['codigo'];
            $datos2['nombre'] = $value['nombre'];
            $datos2['nombre_tipo_promocion'] = ($value['nombre_tipo_promocion']);
            $datos2['fecha_inicio'] = ED($value['fecha_inicio']);
            $datos2['hora_inicio'] = _hora_media_decode($value['hora_inicio']);
            $datos2['fecha_fin'] = ED($value['fecha_fin']);
            $datos2['hora_fin'] = _hora_media_decode($value['hora_fin']);
            $datos2['nombre_establecimiento'] = $value['nombre_establecimiento'];
            $datos2['nombre_sucursal'] = $value['nombre_sucursal'];
            $datos2['telefono'] = $value['telefono'];
            $datos2['direccion'] = $value['direccion'];
            $datos2['imagen_logo'] = $value['imagen_logo'];
            $datos2['imagen_banner'] = $value['imagen_banner'];
        }
        echo view('ver_oferta',$datos2);
    }
    function perfil_sucursal(){
        $modelo = $this->ElModelo;
        $id_sucursal = $this->request->getGet('id_sucursal');
        $query = $modelo->traer_datos_sucursal($id_sucursal);
        $datosx = $query->getResultArray();
        foreach ($datosx as $key => $value) {
            $datos2['nombre'] = $value['nombre'];
            $datos2['nombre_establecimiento'] = $value['nombre_establecimiento'];
            $datos2['telefono'] = $value['telefono'];
            $datos2['direccion'] = $value['direccion'];
            $datos2['url'] = $value['url'];
            $datos2['imagen_logo'] = ($value['imagen_logo']);
            $datos2['imagen_banner'] = ($value['imagen_banner']);
            $datos2['nombre_departamento'] = $value['nombre_departamento'];
            $datos2['nombre_municipio'] = $value['nombre_municipio'];
        }
        echo view('perfil_sucursal',$datos2);
    }
    function ver_aviso(){
        $modelo = $this->ElModelo;
        $id_aviso = $this->request->getGet('id_aviso');
        $query = $modelo->traer_datos_aviso($id_aviso);
        $datosx = $query->getResultArray();
        foreach ($datosx as $key => $value) {
            $datos2['nombre'] = $value['nombre'];
            $datos2['descripcion'] = $value['descripcion'];
            $datos2['imagen_aviso'] = $value['imagen_aviso'];
            $datos2['nombre_tipo_aviso'] = $value['nombre_tipo_aviso'];
        }
        echo view('ver_aviso',$datos2);
    }
    function agregar_carrito(){
        $modelo = $this->ElModelo;
        $session = session(); 
        $id_cliente = $session->get('id_cliente');
        $id_oferta = $this->request->getPost('id_oferta');
        $query = $modelo->agregar_carrito($id_oferta,$id_cliente);
        if($query){
            $query2 = $modelo->traer_cantidad_carrito($id_cliente);
            $datosx = $query2->getResultArray();
            foreach ($datosx as $key => $value){
                $cantidad = $value['cantidad'];
            }
            $datosx['typeinfo'] = "Success";
            $datosx['msg'] ="Producto Agregado con Exito!";
            $datosx['cantidad'] =$cantidad;
        }
        else{
            $datosx['typeinfo'] = "Error";
            $datosx['msg'] ="No se pudo Agregar el Producto porque ya esta en el carrito!";
        }
        echo json_encode($datosx);
    }
    function actualizar_carrito(){
        $modelo = $this->ElModelo;
        $session = session(); 
        $id_cliente = $session->get('id_cliente');
        $query2 = $modelo->traer_cantidad_carrito($id_cliente);
        $datosx = $query2->getResultArray();
        foreach ($datosx as $key => $value){
            $cantidad = $value['cantidad'];
        }
        $datosx['cantidad'] =$cantidad;
        echo json_encode($datosx);
    }
}
