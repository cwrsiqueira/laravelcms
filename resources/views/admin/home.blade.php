@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title', 'Home')

@section('content_header')

    <div class="row">
        <div class="col-md-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-md-6">
            <form method="GET">
                <select onchange="this.form.submit();" name="interval" class="float-md-right">
                    <option {{$interval==30?'selected':''}} value="30">Último mês</option>
                    <option {{$interval==60?'selected':''}} value="60">Últimos 2 meses</option>
                    <option {{$interval==90?'selected':''}} value="90">Últimos 3 meses</option>
                    <option {{$interval==120?'selected':''}} value="120">Últimos 4 meses</option>
                </select>
            </form>
        </div>
    </div>
    
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$visitCount}}</h3>
                    <p>Acessos</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$onlineCount}}</h3>
                    <p>Usuários Online</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$pageCount}}</h3>
                    <p>Páginas</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-sticky-note"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$userCount}}</h3>
                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-user"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Página mais visitadas</h3>
                </div>
                <div class="card-body">
                    <canvas id="pagePie"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informações do Sistema</h3>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque scelerisque semper dolor et imperdiet. Nunc rutrum turpis lorem, eu pulvinar nulla ultrices vel. Curabitur ut ultricies nibh. Suspendisse ut dolor a lacus dictum consectetur nec id mauris. Cras a felis magna. Morbi ut justo non purus gravida malesuada. Nulla scelerisque condimentum urna, dapibus efficitur quam ultricies sed. Cras bibendum rhoncus leo, eget euismod ipsum cursus nec. Etiam a enim a libero consectetur faucibus in sit amet quam. Phasellus dignissim placerat fermentum. Fusce sit amet vulputate ex. Ut lorem lectus, rutrum a pellentesque in, semper ut dolor. Nullam justo odio, sodales ac dapibus euismod, auctor vitae sapien. Maecenas pretium eros at augue bibendum, vitae gravida libero eleifend.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function(){
            let ctx = document.getElementById('pagePie').getContext('2d');
            window.pagePie = new Chart(ctx, {
                type:'pie',
                data:{
                    datasets:[{
                        data:{{$pageValues}},
                        backgroundColor: ['#125758', '#0000ff', '#ff0000', '#00ff00']
                    }],
                    labels:{!! $pageLabels !!}
                },
                options:{
                    responsive:true,
                    legend:{
                        display:false
                    }
                }
            });
        }
    </script>

@endsection