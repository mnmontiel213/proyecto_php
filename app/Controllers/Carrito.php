<?php

namespace App\Controllers;


use App\Models\ComprainfoModel;
use App\Models\ProductoModel;
use App\Models\UsuarioModel;
use App\Controllers\BaseController;
use App\Models\VentainfoModel;
use App\Models\VentaModel;
use Codeigniter\HTTP\RedirectResponse;
use Codeigniter\HTTP\ResponseInterface;

class Carrito extends BaseController{
    
    public function carrito(): string {
        $carrito = \Config\Services::cart();
        
        #$carrito->totalitems();
        #$carrito->remove('rowid');
        #$carrito->destroy();
        #$carrito->contents();

        $productos = $carrito->contents();

        $total = 0;
        foreach($productos as $p){
            $total += $p['price'] * $p['qty'];
        }

        $data = ['titulo' => 'carrito', 'productos' => $productos, 'total' => $total, 'compra_finalizada' => false];
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/carrito/carrito')
            .view('plantillas/footer_view');        
    }

    public function agregar_producto(){
        $request = \Config\Services::request();
        $carrito = \Config\Services::cart();
        
        $producto = [
            'id' =>  $carrito->totalitems(),
            'name' => $request->getPost('nombre'),
            'price' => $request->getPost('precio'),
            'qty' => 1,
            'codigo' => $request->getPost('codigo'),
            'imagen' => $request->getPost('imagen'),
        ];
        
        $carrito->insert($producto);
        
        return redirect()->route('carrito');
    }

    public function actualizar(){
        helper('url');

        $request = \Config\Services::request();
        $carrito = \Config\Services::cart();

        $accion = $request->getPost('carrito-accion');
        $codigo = $request->getPost('codigo');

        $rowid = 0;
        foreach($carrito->contents() as $item){
            if($item['codigo'] == $codigo){
                $rowid = $item['rowid'];
                break;
            }
        }

        if($rowid == 0){
            //el elemento no existe en el carrito

            if($accion == 'agregar'){
                $producto = [
                    'id' =>  $carrito->totalitems(),
                    'name' => $request->getPost('nombre'),
                    'price' => $request->getPost('precio'),
                    'qty' => 1,
                    'codigo' => $request->getPost('codigo'),
                    'imagen' => $request->getPost('imagen'),
                ];
                
                $carrito->insert($producto);
            }

        }else{
            //el elemento existe en el carrito
            $item = $carrito->contents()[$rowid];
            if($accion == 'agregar'){
                $producto = [
                    'rowid' => $item['rowid'],
                    'price' => $item['price'],
                    'name' =>  $item['name'],
                    'codigo' => $item['codigo'],
                    'qty' => (float)$item['qty'] + 1,
                ];
                
                $carrito->update($producto); 
            }else if($accion == 'remover'){
                $producto = [
                    'rowid' => $item['rowid'],
                    'price' => $item['price'],
                    'name' =>  $item['name'],
                    'codigo' => $item['codigo'],
                    'qty' => (float)$item['qty'] - 1,
                ];
                
                if($producto['qty'] == 0){
                    $carrito->remove($rowid);
                }else{
                    $carrito->update($producto); 
                }

                
            }else if($accion == 'quitar'){
                $carrito->remove($rowid);
            }

        }

        if($carrito->totalitems() > 0){
            if($accion == 'limpiar'){
                $carrito->destroy();
            }
        }

        $url = previous_url();
        $url = str_replace('index.php/', '', $url);
        $url = str_replace('http://localhost/petcare/', '', $url);

        return redirect()->route($url);
    }

    public function pagar(){
        $carrito = \Config\Services::cart();
        $session = session();
        $usuarioModel = new UsuarioModel();

        $user_data = $usuarioModel->find($session->get('USUARIO_ID'));
        
        if($user_data['CBU']){
            
            // MODIFICACION EN BASE DE DATOS
            $ventaModel = new VentaModel();
            $ventainfoModel = new VentainfoModel();

            $total_venta = 0;
            foreach($carrito->contents() as $c){
                $total_venta += $c['price'];
            }
            $datos_venta = [
                'USUARIO_ID' => session('USUARIO_ID'),
                'FECHA'      => date("Y/m/d"),
                'TOTAL'      => $total_venta,   
            ];

            $venta_id = $ventaModel->insert($datos_venta);

            foreach($carrito->contents() as $c){
                $datos_venta_info = [
                    'VENTA_ID'    => $venta_id,
                    'PRODUCTO_ID' => $c['codigo'],
                    'CANTIDAD'    => $c['qty'],
                    'PRECIO'      => $c['price'], 
                ];

                $ventainfoModel->insert($datos_venta_info);
            }

            // ACTUALIZAR STOCK DE PRODUCTOS
            foreach($carrito->contents() as $c){
                $productoModel = new ProductoModel();
                $prod = $productoModel->find($c['codigo']);

                $stock = $prod['STOCK'] - $c['qty'];

                if($stock >= 0){
                    $productoModel->update($prod['CODIGO'], ['STOCK' => $stock]);
                }                
            }

            $carrito->destroy();
            $data = ['titulo' => 'carrito', 'productos' => [], 'total' => 0, 'compra_finalizada' => true];
            return view('plantillas/header_view', $data)
                    .view('plantillas/navbar_view')
                    .view('contenido/carrito/carrito')
                    .view('plantillas/footer_view'); 
        }else{
            $data = ['titulo' => 'Completar cuenta', 'validation' => ['cbu' => 'Ingrese un CBU valido'], 'usuario' => $user_data];

            return view('plantillas/header_view', $data)
                .view('plantillas/navbar_view')
                .view('contenido/login/cuenta_completar')
                .view('plantillas/footer_view'); 
        }
    }
}