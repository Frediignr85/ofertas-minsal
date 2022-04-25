<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ModeloInicio extends Model
{
    function verificar_username($username){
        $data = $this->db->query("SELECT * FROM tblusuario WHERE usuario = '$username' AND id_tipo_usuario = '4'");
        return $data;
    }
    function verificar_credenciales($username,$password){
        $data = $this->db->query("SELECT * FROM tblusuario WHERE password = '".MD5($password)."' AND usuario = '$username' AND id_tipo_usuario = '4' AND activo = 1");
        return $data;
    }
    function verificar_correo($email){
        $data = $this->db->query("SELECT * FROM tblcliente WHERE correo = '$email' AND deleted_at is NULL");
        return $data;
    }
    public function todas_las_ofertas()
    {
        $data = $this->db->query("SELECT tblpromocion.id_promocion,tblpromocion.descripcion, tblpromocion.codigo, tblpromocion.nombre, tbltipo_promocion.nombre as nombre_tipo_promocion,
        tblpromocion.fecha_inicio, tblpromocion.hora_inicio, tblpromocion.fecha_fin, tblpromocion.hora_fin,
        tblestablecimiento.nombre as nombre_establecimiento, tblsucursal.nombre as nombre_sucursal, tblsucursal.telefono, tblsucursal.direccion,
        tblestablecimiento.imagen_logo, tblestablecimiento.imagen_banner
        from tblpromocion
        inner join tbltipo_promocion on tbltipo_promocion.id_tipo_promocion = tblpromocion.id_tipo_promocion 
        inner join tblestablecimiento on tblestablecimiento.id_establecimiento = tblpromocion.id_establecimiento
        inner join tblsucursal on tblsucursal.id_sucursal = tblpromocion.id_sucursal 
        where (tblpromocion.fecha_inicio < current_date or (tblpromocion.fecha_inicio = current_date AND tblpromocion.hora_inicio <= current_time  ))
        and (tblpromocion.fecha_fin > current_date or (tblpromocion.fecha_fin = current_date and tblpromocion.hora_fin >= current_time))
        and tblpromocion.deleted_at is null 
        and tblestablecimiento.deleted_at is null
        and tblsucursal.deleted_at is null
        and tbltipo_promocion.deleted_at is null
        and tblpromocion.activo = 1
        and tblestablecimiento.activo = 1
        and tblsucursal.activo = 1
        and tbltipo_promocion.activo = 1
        ORDER BY RANDOM() LIMIT 25");
        return $data;
    }
    public function traer_ultimas_ofertas()
    {
        $data = $this->db->query("SELECT tblpromocion.id_promocion,tblpromocion.descripcion, tblpromocion.codigo, tblpromocion.nombre, tbltipo_promocion.nombre as nombre_tipo_promocion,
        tblpromocion.fecha_inicio, tblpromocion.hora_inicio, tblpromocion.fecha_fin, tblpromocion.hora_fin,
        tblestablecimiento.nombre as nombre_establecimiento, tblsucursal.nombre as nombre_sucursal, tblsucursal.telefono, tblsucursal.direccion,
        tblestablecimiento.imagen_logo, tblestablecimiento.imagen_banner
        from tblpromocion
        inner join tbltipo_promocion on tbltipo_promocion.id_tipo_promocion = tblpromocion.id_tipo_promocion 
        inner join tblestablecimiento on tblestablecimiento.id_establecimiento = tblpromocion.id_establecimiento
        inner join tblsucursal on tblsucursal.id_sucursal = tblpromocion.id_sucursal 
        where (tblpromocion.fecha_inicio < current_date or (tblpromocion.fecha_inicio = current_date AND tblpromocion.hora_inicio <= current_time  ))
        and (tblpromocion.fecha_fin > current_date or (tblpromocion.fecha_fin = current_date and tblpromocion.hora_fin >= current_time))
        and tblpromocion.deleted_at is null 
        and tblestablecimiento.deleted_at is null
        and tblsucursal.deleted_at is null
        and tbltipo_promocion.deleted_at is null
        and tblpromocion.activo = 1
        and tblestablecimiento.activo = 1
        and tblsucursal.activo = 1
        and tbltipo_promocion.activo = 1
        ORDER BY tblpromocion.id_promocion DESC LIMIT 10");
        return $data;
    }
    public function traer_2_random()
    {
        $data = $this->db->query("SELECT tblpromocion.id_promocion,tblpromocion.descripcion, tblpromocion.codigo, tblpromocion.nombre, tbltipo_promocion.nombre as nombre_tipo_promocion,
        tblpromocion.fecha_inicio, tblpromocion.hora_inicio, tblpromocion.fecha_fin, tblpromocion.hora_fin,
        tblestablecimiento.nombre as nombre_establecimiento, tblsucursal.nombre as nombre_sucursal, tblsucursal.telefono, tblsucursal.direccion,
        tblestablecimiento.imagen_logo, tblestablecimiento.imagen_banner
        from tblpromocion
        inner join tbltipo_promocion on tbltipo_promocion.id_tipo_promocion = tblpromocion.id_tipo_promocion 
        inner join tblestablecimiento on tblestablecimiento.id_establecimiento = tblpromocion.id_establecimiento
        inner join tblsucursal on tblsucursal.id_sucursal = tblpromocion.id_sucursal 
        where (tblpromocion.fecha_inicio < current_date or (tblpromocion.fecha_inicio = current_date AND tblpromocion.hora_inicio <= current_time  ))
        and (tblpromocion.fecha_fin > current_date or (tblpromocion.fecha_fin = current_date and tblpromocion.hora_fin >= current_time))
        and tblpromocion.deleted_at is null 
        and tblestablecimiento.deleted_at is null
        and tblsucursal.deleted_at is null
        and tbltipo_promocion.deleted_at is null
        and tblpromocion.activo = 1
        and tblestablecimiento.activo = 1
        and tblsucursal.activo = 1
        and tbltipo_promocion.activo = 1
        ORDER BY RANDOM() LIMIT 2");
        return $data;
    }
    public function traer_5_random()
    {
        $data = $this->db->query("SELECT tblpromocion.id_promocion,tblpromocion.descripcion, tblpromocion.codigo, tblpromocion.nombre, tbltipo_promocion.nombre as nombre_tipo_promocion,
        tblpromocion.fecha_inicio, tblpromocion.hora_inicio, tblpromocion.fecha_fin, tblpromocion.hora_fin,
        tblestablecimiento.nombre as nombre_establecimiento, tblsucursal.nombre as nombre_sucursal, tblsucursal.telefono, tblsucursal.direccion,
        tblestablecimiento.imagen_logo, tblestablecimiento.imagen_banner
        from tblpromocion
        inner join tbltipo_promocion on tbltipo_promocion.id_tipo_promocion = tblpromocion.id_tipo_promocion 
        inner join tblestablecimiento on tblestablecimiento.id_establecimiento = tblpromocion.id_establecimiento
        inner join tblsucursal on tblsucursal.id_sucursal = tblpromocion.id_sucursal 
        where (tblpromocion.fecha_inicio < current_date or (tblpromocion.fecha_inicio = current_date AND tblpromocion.hora_inicio <= current_time  ))
        and (tblpromocion.fecha_fin > current_date or (tblpromocion.fecha_fin = current_date and tblpromocion.hora_fin >= current_time))
        and tblpromocion.deleted_at is null 
        and tblestablecimiento.deleted_at is null
        and tblsucursal.deleted_at is null
        and tbltipo_promocion.deleted_at is null
        and tblpromocion.activo = 1
        and tblestablecimiento.activo = 1
        and tblsucursal.activo = 1
        and tbltipo_promocion.activo = 1
        ORDER BY RANDOM() LIMIT 5");
        return $data;
    }
    function todos_los_avisos(){
        $sql="SELECT tblaviso.*, tbltipo_aviso.nombre as nombre_tipo_aviso
        from tblaviso 
        inner join tbltipo_aviso on tbltipo_aviso.id_tipo_aviso = tblaviso.id_tipo_aviso 
        where tblaviso.deleted_at is null 
        and tblaviso.activo =1
        and tbltipo_aviso.deleted_at is null
        and tblaviso.activo =1";
        $data = $this->db->query($sql);
        return $data;
    }
    function traer_5_avisos(){
        $sql="SELECT tblaviso.*, tbltipo_aviso.nombre as nombre_tipo_aviso
        from tblaviso 
        inner join tbltipo_aviso on tbltipo_aviso.id_tipo_aviso = tblaviso.id_tipo_aviso 
        where tblaviso.deleted_at is null 
        and tblaviso.activo =1
        and tbltipo_aviso.deleted_at is null
        and tblaviso.activo =1
        ORDER BY RANDOM()
        LIMIT 5";
        $data = $this->db->query($sql);
        return $data;
    }

    function traer_categorias(){
        $sql = "SELECT * from tblcategoria where deleted_at is null and activo = 1";
        $data = $this->db->query($sql);
        return $data;
    }
    function traer_establecimientos(){
        $sql = "SELECT * from tblestablecimiento where deleted_at is null and activo = 1";
        $data = $this->db->query($sql);
        return $data;
    }
    function traer_establecimientos_categoria($id_categoria){
        $sql = "SELECT * from tblestablecimiento where id_categoria = '$id_categoria' and deleted_at is null and activo = 1";
        $data = $this->db->query($sql);
        return $data;
    }
    function traer_info_categoria($id_categoria){        
        $sql = "SELECT * from tblcategoria where deleted_at is null and activo = 1 and id_categoria = '$id_categoria'";
        $data = $this->db->query($sql);
        return $data;
    }
    function traer_sucursales_establecimiento($id_establecimiento){
        $sql = "SELECT * from tblsucursal where id_establecimiento = '$id_establecimiento' and deleted_at is null and activo = 1";
        $data = $this->db->query($sql);
        return $data;
    }
    function traer_datos_aviso($id_aviso){
        $sql ="SELECT tblaviso.*, tbltipo_aviso.nombre as nombre_tipo_aviso
        from tblaviso 
        inner join tbltipo_aviso on tbltipo_aviso.id_tipo_aviso = tblaviso.id_tipo_aviso 
        where tblaviso.deleted_at is null 
        and tblaviso.activo =1
        and tbltipo_aviso.deleted_at is null
        and tblaviso.activo =1
        AND tblaviso.id_aviso = '$id_aviso'";
        $data = $this->db->query($sql);
        return $data;
    }
    function traer_info_establecimiento($id_establecimiento){
        $sql = "SELECT tblestablecimiento.*, tblusuario.correo  from tblestablecimiento
        inner join tblusuario  on tblusuario.id_usuario = tblestablecimiento.id_usuario 
        where id_establecimiento  = '$id_establecimiento' and tblestablecimiento.deleted_at is null and tblestablecimiento.activo = 1";
        $data = $this->db->query($sql);
        return $data;
    }
    function traer_datos_sucursal($id_sucursal){
        $sql = "SELECT tblsucursal.*, tblestablecimiento.imagen_logo, tbldepartamento.nombre as nombre_departamento, tblmunicipio.nombre as nombre_municipio, tblestablecimiento.imagen_banner,tblestablecimiento.nombre as nombre_establecimiento
        from tblsucursal 
        inner join tblestablecimiento on tblestablecimiento.id_establecimiento = tblsucursal.id_establecimiento 
        inner join tbldepartamento on tbldepartamento.id_departamento = tblsucursal.id_departamento 
        inner join tblmunicipio on tblmunicipio.id_municipio = tblsucursal.id_municipio 
        where tblestablecimiento.deleted_at is null 
        and tblsucursal.deleted_at is null
        and tblestablecimiento.activo =1
        and tblsucursal.activo =1
        and tblsucursal.id_sucursal='$id_sucursal'";
        $data = $this->db->query($sql);
        return $data;
    }

    function traer_datos_oferta($id_oferta){
        $data = $this->db->query("SELECT tblpromocion.id_promocion,tblpromocion.descripcion, tblpromocion.codigo, tblpromocion.nombre, tbltipo_promocion.nombre as nombre_tipo_promocion,
        tblpromocion.fecha_inicio, tblpromocion.hora_inicio, tblpromocion.fecha_fin, tblpromocion.hora_fin,
        tblestablecimiento.nombre as nombre_establecimiento, tblsucursal.nombre as nombre_sucursal, tblsucursal.telefono, tblsucursal.direccion,
        tblestablecimiento.imagen_logo, tblestablecimiento.imagen_banner
        from tblpromocion
        inner join tbltipo_promocion on tbltipo_promocion.id_tipo_promocion = tblpromocion.id_tipo_promocion 
        inner join tblestablecimiento on tblestablecimiento.id_establecimiento = tblpromocion.id_establecimiento
        inner join tblsucursal on tblsucursal.id_sucursal = tblpromocion.id_sucursal 
        where (tblpromocion.fecha_inicio < current_date or (tblpromocion.fecha_inicio = current_date AND tblpromocion.hora_inicio <= current_time  ))
        and (tblpromocion.fecha_fin > current_date or (tblpromocion.fecha_fin = current_date and tblpromocion.hora_fin >= current_time))
        and tblpromocion.deleted_at is null 
        and tblestablecimiento.deleted_at is null
        and tblsucursal.deleted_at is null
        and tbltipo_promocion.deleted_at is null
        and tblpromocion.activo = 1
        and tblestablecimiento.activo = 1
        and tblsucursal.activo = 1
        and tbltipo_promocion.activo = 1
        and tblpromocion.id_promocion = '$id_oferta'");
        return $data;
    }

    function traer_datos_tipo_promocion(){
        $sql_tipo_promocion = "SELECT * from tbltipo_promocion where deleted_at is null and activo = 1";
        $data = $this->db->query($sql_tipo_promocion);
        $array_tipo_promocion = $data->getResultArray();
        $html_devolver="";
        if(count($array_tipo_promocion) > 0){
            $id_tipo_promocion_concat = "";
            foreach ($array_tipo_promocion as $key => $value) {
                $id_tipo_promocion = $value['id_tipo_promocion'];
                $nombre_tipo_promocion = $value['nombre'];
                $color = $value['color'];
                $sql_promociones_tipo_promocion = "SELECT tblpromocion.id_promocion,tblpromocion.descripcion, tblpromocion.codigo, tblpromocion.nombre, tbltipo_promocion.nombre as nombre_tipo_promocion,
                tblpromocion.fecha_inicio, tblpromocion.hora_inicio, tblpromocion.fecha_fin, tblpromocion.hora_fin,
                tblestablecimiento.nombre as nombre_establecimiento, tblsucursal.nombre as nombre_sucursal, tblsucursal.telefono, tblsucursal.direccion,
                tblestablecimiento.imagen_logo, tblestablecimiento.imagen_banner
                from tblpromocion
                inner join tbltipo_promocion on tbltipo_promocion.id_tipo_promocion = tblpromocion.id_tipo_promocion 
                inner join tblestablecimiento on tblestablecimiento.id_establecimiento = tblpromocion.id_establecimiento
                inner join tblsucursal on tblsucursal.id_sucursal = tblpromocion.id_sucursal 
                where (tblpromocion.fecha_inicio < current_date or (tblpromocion.fecha_inicio = current_date AND tblpromocion.hora_inicio <= current_time  ))
                and (tblpromocion.fecha_fin > current_date or (tblpromocion.fecha_fin = current_date and tblpromocion.hora_fin >= current_time))
                and tblpromocion.deleted_at is null 
                and tblestablecimiento.deleted_at is null
                and tblsucursal.deleted_at is null
                and tbltipo_promocion.deleted_at is null
                and tblpromocion.activo = 1
                and tblestablecimiento.activo = 1
                and tblsucursal.activo = 1
                and tbltipo_promocion.activo = 1
                and tbltipo_promocion.id_tipo_promocion = '$id_tipo_promocion'";
                $data_promociones = $this->db->query($sql_promociones_tipo_promocion);
                $array_promociones = $data_promociones->getResultArray();
                if(count($array_promociones) > 0){
                    $html_devolver.="<section class=\"section latest__products\" id=\"latest\">";
                    $html_devolver.="<div class=\"title__container\">";
                    $html_devolver.="<div class=\"section__title active\" data-id=\"Latest Products\">";
                    $html_devolver.="<span class=\"dot\"></span>";
                    $html_devolver.="<h1 class=\"primary__title\">$nombre_tipo_promocion</h1>";
                    $html_devolver.="</div>";
                    $html_devolver.="</div>";
                    $html_devolver.="<div class=\"container\" data-aos=\"fade-up\" data-aos-duration=\"1200\">";
                    $html_devolver.="<div class=\"glide\" id=\"glidex_$id_tipo_promocion\">";
                    $html_devolver.="<div class=\"glide__track\" data-glide-el=\"track\">";
                    $html_devolver.="<ul class=\"glide__slides latest-center\">";
                    foreach ($array_promociones as $key => $row) {
                        $html_devolver.="<li class=\"glide__slide\">";
                        $html_devolver.="<div class=\"product\">";
                        $html_devolver.="<div class=\"product__header\">";
                        $html_devolver.="<img src=\"http://localhost/promociones/assets/".$row['imagen_logo']."\" alt=\"product\">";
                        $html_devolver.="</div>";
                        $html_devolver.="<div class=\"product__footer\">";         
                        $titulo = $row['nombre'];
                        if(strlen($titulo) > 30){
                            $titulo =  substr($titulo, 0, 26)."..."; 
                        }
                        $html_devolver.="<h3>$titulo</h3>";
                        $html_devolver.="<div class=\"product__price\">";
                        $html_devolver.="<h4>Vence el ".ED($row['fecha_fin'])." "._hora_media_decode($row['hora_fin'])."</h4>";
                        $html_devolver.="</div>";            
                        $html_devolver.="</div>";
                        $html_devolver.="<ul>";
                        $html_devolver.="<li>";
                        $html_devolver.="<a  data-toggle='modal' href=\"".base_url("/inicio/ver_oferta?id_oferta=".$row['id_promocion'])."\"  data-target='#deleteModal' data-refresh='true'>";
                        $html_devolver.="<svg>";
                        $html_devolver.="<use";
                        $html_devolver.=" xlink:href=\"".base_url("/assets/images/sprite.svg#icon-eye")."\">";
                        $html_devolver.="</use>";
                        $html_devolver.="</svg>";
                        $html_devolver.="</a>";
                        $html_devolver.="</li>";
                        $html_devolver.="</ul>";
                        $html_devolver.="</div>";
                        $html_devolver.="</li>";
                    }                

                    $html_devolver.="</ul>";
                    $html_devolver.="</div>";
                    $html_devolver.="<div class=\"glide__arrows\" data-glide-el=\"controls\">";
                    $html_devolver.="<button class=\"glide__arrow glide__arrow--left\" data-glide-dir=\"<\">";
                    $html_devolver.="<svg>";
                    $html_devolver.="<use xlink:href=\"".base_url("assets/images/sprite.svg#icon-arrow-left2")."\">";
                    $html_devolver.="</use>";
                    $html_devolver.="</svg>";
                    $html_devolver.="</button>";
                    $html_devolver.="<button class=\"glide__arrow glide__arrow--right\" data-glide-dir=\">\">";
                    $html_devolver.="<svg>";
                    $html_devolver.="<use xlink:href=\"".base_url("assets/images/sprite.svg#icon-arrow-right2")."\">";
                    $html_devolver.="</use>";
                    $html_devolver.="</svg>";
                    $html_devolver.="</button>";
                    $html_devolver.="</div>";
                    $html_devolver.="</div>";
                    $html_devolver.="</div>";
                    $html_devolver.="</section>";      
                    
                    $id_tipo_promocion_concat.=$id_tipo_promocion.",";             
                }
            }
            if($id_tipo_promocion_concat != ""){
                $id_tipo_promocion_concat = substr($id_tipo_promocion_concat, 0, -1);
            }
            $html_devolver.="<input type='hidden' id='id_tipo_promocion' value='$id_tipo_promocion_concat'>";
            $html_devolver.="<input type='hidden' id='process' value='promocion'>";
            return $html_devolver;
        }
        else{
            return $html_devolver;
        }
    }
    function traer_datos_avisos(){
        $sql_tipo_aviso = "SELECT * from tbltipo_aviso where deleted_at is null and activo = 1";
        $data = $this->db->query($sql_tipo_aviso);
        $array_tipo_aviso = $data->getResultArray();
        $html_devolver="";
        if(count($array_tipo_aviso) > 0){
            $id_tipo_aviso_concat = "";
            foreach ($array_tipo_aviso as $key => $value) {
                $id_tipo_aviso = $value['id_tipo_aviso'];
                $nombre_tipo_aviso = $value['nombre'];
                $color = $value['color'];
                $sql_avisos_tipo_aviso = "SELECT DISTINCT tblaviso.*, tbltipo_aviso.nombre as nombre_tipo_aviso
                from tblaviso 
                inner join tbltipo_aviso on tbltipo_aviso.id_tipo_aviso = tblaviso.id_tipo_aviso 
                where tblaviso.deleted_at is null 
                and tblaviso.activo =1
                and tbltipo_aviso.deleted_at is null
                and tblaviso.activo =1
                and tbltipo_aviso.id_tipo_aviso = '$id_tipo_aviso'";
                $data_avisos = $this->db->query($sql_avisos_tipo_aviso);
                $array_avisos = $data_avisos->getResultArray();
                if(count($array_avisos) > 0){
                    $html_devolver.="<section class=\"section latest__products\" id=\"latest\">";
                    $html_devolver.="<div class=\"title__container\">";
                    $html_devolver.="<div class=\"section__title active\" data-id=\"Latest Products\">";
                    $html_devolver.="<span class=\"dot\"></span>";
                    $html_devolver.="<h1 class=\"primary__title\">$nombre_tipo_aviso</h1>";
                    $html_devolver.="</div>";
                    $html_devolver.="</div>";
                    $html_devolver.="<div class=\"container\" data-aos=\"fade-up\" data-aos-duration=\"1200\">";
                    $html_devolver.="<div class=\"glide\" id=\"glidef_$id_tipo_aviso\">";
                    $html_devolver.="<div class=\"glide__track\" data-glide-el=\"track\">";
                    $html_devolver.="<ul class=\"glide__slides latest-center\">";
                    foreach ($array_avisos as $key => $row) {
                        $html_devolver.="<li class=\"glide__slide\">";
                        $html_devolver.="<div class=\"product\">";
                        $html_devolver.="<div class=\"product__header\">";
                        $html_devolver.="<img src=\"http://localhost/promociones/assets/".$row['imagen_aviso']."\" alt=\"product\">";
                        $html_devolver.="</div>";
                        $html_devolver.="<div class=\"product__footer\">";         
                        $titulo = $row['nombre'];
                        if(strlen($titulo) > 30){
                            $titulo =  substr($titulo, 0, 26)."..."; 
                        }
                        $html_devolver.="<h3>$titulo</h3>";          
                        $html_devolver.="</div>";
                        $html_devolver.="<ul>";
                        $html_devolver.="<li>";
                        $html_devolver.="<a  data-toggle='modal' href=\"".base_url("/inicio/ver_aviso?id_aviso=".$row['id_aviso'])."\"  data-target='#deleteModal' data-refresh='true'>";
                        $html_devolver.="<svg>";
                        $html_devolver.="<use";
                        $html_devolver.=" xlink:href=\"".base_url("/assets/images/sprite.svg#icon-eye")."\">";
                        $html_devolver.="</use>";
                        $html_devolver.="</svg>";
                        $html_devolver.="</a>";
                        $html_devolver.="</li>";
                        $html_devolver.="</ul>";
                        $html_devolver.="</div>";
                        $html_devolver.="</li>";
                    }                

                    $html_devolver.="</ul>";
                    $html_devolver.="</div>";
                    $html_devolver.="<div class=\"glide__arrows\" data-glide-el=\"controls\">";
                    $html_devolver.="<button class=\"glide__arrow glide__arrow--left\" data-glide-dir=\"<\">";
                    $html_devolver.="<svg>";
                    $html_devolver.="<use xlink:href=\"".base_url("assets/images/sprite.svg#icon-arrow-left2")."\">";
                    $html_devolver.="</use>";
                    $html_devolver.="</svg>";
                    $html_devolver.="</button>";
                    $html_devolver.="<button class=\"glide__arrow glide__arrow--right\" data-glide-dir=\">\">";
                    $html_devolver.="<svg>";
                    $html_devolver.="<use xlink:href=\"".base_url("assets/images/sprite.svg#icon-arrow-right2")."\">";
                    $html_devolver.="</use>";
                    $html_devolver.="</svg>";
                    $html_devolver.="</button>";
                    $html_devolver.="</div>";
                    $html_devolver.="</div>";
                    $html_devolver.="</div>";
                    $html_devolver.="</section>"; 
                    $id_tipo_aviso_concat.=$id_tipo_aviso.",";             
                }
            }
            if($id_tipo_aviso_concat != ""){
                $id_tipo_aviso_concat = substr($id_tipo_aviso_concat, 0, -1);
            }
            $html_devolver.="<input type='hidden' id='id_tipo_aviso' value='$id_tipo_aviso_concat'>";
            $html_devolver.="<input type='hidden' id='process' value='aviso'>";
            return $html_devolver;
        }
        else{
            return $html_devolver;
        }
    }


}

?>