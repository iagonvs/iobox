<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BOX I.O. - Weipar
            
        </title>
        <script type="text/javascript" src="nicEdit-latest.js"></script>
        <script type="text/javascript">
        

        //<![CDATA[
        bkLib.onDomLoaded(function() {
            new nicEditor({maxHeight : 200}).panelInstance('descricao_solicitacao');
            new nicEditor({fullPanel : true,maxHeight : 200}).panelInstance('descricao_solicitacao');
        });
        //]]>
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
        <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
        <link rel="icon" href="{{('/img/boxio.png')}}" />
        <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous')}}">
        
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="{{asset('css/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="{{asset('css/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="{{asset('css/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="{{asset('css/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="{{asset('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{asset('css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('http://harvesthq.github.io/chosen/chosen.css')}}" rel="stylesheet"/>

        <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css')}}" rel="stylesheet"/>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->


    </head>
    
    <body class="skin-blue" >
        <!-- header logo: style can be found in header.less -->
        
        <header class="header">
            
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
 
                            <ul class="dropdown-menu">
   
                                
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                    <li>
                        <a  class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                    </li>
                    @can('isAdmin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                        </li>
                        @endcan
                        <li class="">
                            <a href="/" class="dropdown-toggle" data-toggle="">
                                <i class=""></i>
                                <span> {{ Auth::user()->name }}<i class=""></i></span>
                                
                            </a>

                            <ul class="dropdown-menu">
                    
                                <!-- Menu Footer-->
                                {{-- <li class="user-footer" style="color: black;">
                                    <div class="" style="color: black;">
                                            <a style="color: black;" class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                             {{ __('Logout') }}
                                         </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                         </form>
                                    </div>
                                </li> --}}
                            </ul>
                        </li>
                    </ul>
                </div>


            
            </nav>
        </header>
        <div  class="wrapper row-offcanvas row-offcanvas-left"  >
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas" style="min-height: 2069px;" >
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                           
                        </div>
                    <br>
                    </div>
                    <br>
                    <br>
                    <!-- search form -->
                    {{-- <form action="#" method="get" class="sidebar-form">

                    </form> --}}
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                            <a href="/" class="">
                                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                               <img src="{{('/img/boxio.png')}}" alt=""  style="width: 100px; margin-left: 25%;  position: relative;     MARGIN-TOP: -54px;"> 
                            </a>
                            <br>
                            <br>
                            <br>
                            <li class="active">
                                    <a href="/">
                                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                    </a>
                                </li> 
@if(Gate::check('isAdmin') || Gate::check('isRegular'))
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-bar-chart-o"></i>
                                        <span>Estoque TI</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        @can('isAdmin')
                                        <li><a href="{{route('listar_item')}}"><i class="fa fa-angle-double-right"></i>Item</a></li>
                                        <li><a href="{{route('listar_fornecedor')}}"><i class="fa fa-angle-double-right"></i>Fornecedor</a></li>
                                        <li><a href="{{route('listar_localidade')}}"><i class="fa fa-angle-double-right"></i>Localidade</a></li>
                                        <li><a href="{{route('listar_estoque')}}"><i class="fa fa-angle-double-right"></i>Estoque</a></li>
                                        <li><a href="{{route('listar_item_transicao')}}"><i class="fa fa-angle-double-right"></i>Transição</a></li>
                                        @endcan
                                        <li><a href="{{route('listar_item_saida')}}"><i class="fa fa-angle-double-right"></i>Saída</a></li>
                                        <li><a href="{{route('listar_item_entrada')}}"><i class="fa fa-angle-double-right"></i>Entrada</a></li>
                                       
                                    </ul>
                        </li>
                            </li>
            </li>
@endif

            @if(Gate::check('isAdmin') || Gate::check('isRegular'))
            <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Solicitação de Materiais</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('cadastrar_solicitacao')}}"><i class="fa fa-angle-double-right"></i>Solicitar</a></li>
                        <li><a href="{{route('listar_solicitacao')}}"><i class="fa fa-angle-double-right"></i> Listar Solicitações</a></li>
                    </ul>
        </li>
            </li>
            @endif
            @can('isAdmin')
            <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>WIFI - BUS</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('listar_tipo_onibus')}}"><i class="fa fa-angle-double-right"></i>Tipo de Onibus</a></li>
                        <li><a href="{{route('listar_empresa')}}"><i class="fa fa-angle-double-right"></i>Empresas</a></li>
                        <li><a href="{{route('listar_linha')}}"><i class="fa fa-angle-double-right"></i>Linhas - CHIPs</a></li>
                        <li><a href="{{route('listar_onibus')}}"><i class="fa fa-angle-double-right"></i>Ônibus</a></li>
                        <li><a href="{{route('listar_roteador')}}"><i class="fa fa-angle-double-right"></i>Roteadores</a></li>
                        <li><a href="{{route('listar_controle_wifi')}}"><i class="fa fa-angle-double-right"></i>Controle (BUS - LINHA)</a></li>
                    </ul>
        </li>
            </li>
            @endcan 

            @can('isAdmin')
            <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Inventario</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('listar_agencia')}}"><i class="fa fa-angle-double-right"></i>Agencia</a></li>
                        <li><a href="{{route('listar_inventario')}}"><i class="fa fa-angle-double-right"></i>Inventario</a></li>
                        
                    </ul>
        </li>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Manutenção</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('listar_modelo_impressora')}}"><i class="fa fa-angle-double-right"></i>Impressoras</a></li>
                    <li><a href="{{route('listar_setor_agencia')}}"><i class="fa fa-angle-double-right"></i>Agências/Setores</a></li>
                    <li><a href="{{route('listar_controle_impressora')}}"><i class="fa fa-angle-double-right"></i>Controle</a></li>
                </ul>
    </li>
        </li>
            @endcan
            @can('isAdmin')
            <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Relatórios</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('relatorio_saida')}}"><i class="fa fa-angle-double-right"></i>Relatório Saídas</a></li>
                        <li><a href="{{route('relatorio_entrada')}}"><i class="fa fa-angle-double-right"></i>Relatório Entradas</a></li>
                        <li><a href="{{route('relatorio_wifi')}}"><i class="fa fa-angle-double-right"></i>Relatório Wifi-Bus</a></li>
                        
                    </ul>
        </li>
            </li>
            @endcan
            
          

                </section>
                <!-- /.sidebar -->

            </aside>

           
   
            <aside class="right-side" >
                @yield('content')
           </aside>
  

        <!-- add new calendar event modal -->

        <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js')}}"></script>
        <!-- jQuery 2.0.2 -->
        <script src="{{asset('http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="{{asset('js/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')}}"></script>
        <script src="{{asset('js/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset('js/plugins/jqueryKnob/jquery.knob.js')}}" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{asset('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="{{asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('js/AdminLTE/dashboard.js')}}" type="text/javascript"></script>        

    </body>


<!-- Footer -->
<footer class="page-footer font-small blue" >

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="margin-top: 360px;">
           <p>© 2019  Equipe TI - Camurujipe:</p> 
          <p></p><a target="_blank" href="http://187.44.148.149:83/zabbix/"> Zabbix</a></p>
          <p></p><a target="_blank" href="http://187.44.148.149:83/"> GLPI</a></p>
        </div>
        <!-- Copyright -->
      
      </footer>
      <!-- Footer -->

      

</html>

