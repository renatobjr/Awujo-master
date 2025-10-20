<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pages/views';
$route['dashboard'] = 'pages/dashboard';
$route['dashboard/projetos'] = 'pages/projetos';
$route['dashboard/responsaveis'] = 'pages/responsaveis';
$route['dashboard/beneficiarios'] = 'pages/beneficiarios';
/* Forms URI pages
 * */
$route['dashboard/cadastrar-usuario'] = 'pages/form_usuario';
$route['dashboard/cadastrar-responsavel'] = 'pages/form_responsavel';
$route['dashboard/cadastrar-projeto'] = 'pages/form_projeto';
$route['dashboard/cadastrar-beneficiarios'] = 'pages/form_beneficiarios';
/*Inserts URI Pages
 * */
$route['dashboard/inserir-responsavel'] = 'responsavel/inserir';
$route['dashboard/inserir-usuario'] = 'usuario/inserir';
$route['dashboard/inserir-projeto'] = 'projeto/inserir';
$route['dashboard/inserir-beneficiario'] = 'beneficiario/inserir';
/* Edit, Update, Delete URI Pages
 * */
$route['dashboard/atualizar-responsavel'] = 'responsavel/atualizar_responsavel';
$route['dashboard/excluir-responsavel/(:num)'] = 'responsavel/excluir_responsavel/$1';
$route['dashboard/atualizar-projeto'] = 'projeto/atualizar_projeto';
$route['dashboard/excluir-projeto/(:num)'] = 'projeto/excluir_projeto/$1';
$route['dashboard/atualizar-beneficiario'] = 'beneficiario/atualizar_beneficiario'; 
$route['dashboard/excluir-beneficiario/(:num)'] = 'beneficiario/excluir_beneficiario/$1';
/* Search URI
 * */
$route['dashboard/buscar-responsavel/(:any)'] = 'responsavel/buscar_responsavel_por_nome/$1';
/* Login, Cadastro de Senha, Redefinição e Logout URI Pages
 * */
$route['login'] = 'usuario/login';
$route['registro'] = 'usuario/verificar_token';
$route['cadastrar-senha'] = 'usuario/cadastrar_senha';
$route['logout'] = 'usuario/logout';
/* BTN Call para edição URI Pages
 * */
$route['dashboard/editar-responsavel/(:num)'] = 'responsavel/buscar_responsavel_por_id/$1';
$route['dashboard/editar-projeto/(:num)'] = 'projeto/buscar_projeto_por_id/$1';
$route['dashboard/editar-beneficiario/(:num)'] = 'beneficiario/buscar_beneficiario_por_id/$1';
/* Print URI Page
 * */
$route['dashboard/lista-alunos'] = 'beneficiario/lista_beneficiarios/';
$route['dashboard/imprimir-lista-beneficiarios'] = 'beneficiario/lista_beneficiarios/';
$route['dashboard/imprimir-beneficiario/(:num)'] = 'beneficiario/buscar_beneficiario_por_id/$1';
$route['dashboard/imprimir-alunos-projeto/(:num)'] = 'projeto/imprimir_alunos_projeto/$1';
$route['dashboard/imprimir-responsavel/(:num)'] = 'responsavel/buscar_responsavel_por_id/$1';
$route['dashboard/imprimir-lista-responsaveis'] = 'responsavel/criar_lista_responsaveis/';
$route['dashboard/imprimir-lista'] = 'responsavel/criar_lista_telefones/';
/* Any URI Pages
 * */
$route['(:any)'] = 'pages/views/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;