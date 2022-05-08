<?php

$sales = ControllerSales::showSales();

$arrayDates = array();

foreach ($sales as $key => $value) {

    $date = substr($value["date"],0,7);

    array_push($arrayDates, $date);

    
}

$noRepeatDates = array_unique($arrayDates);

print_r($noRepeatDates);


?>

<!-- solid sales graph -->
<div class="box box-solid bg-teal-gradient">

    <div class="box-header">

        <i class="fa fa-th"></i>

        <h3 class="box-title">Gráfico de Ventas</h3>

        <div class="box-tools pull-right">

            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

        </div>

    </div>

    <div class="box-body border-radius-none">

        <div class="chart" id="line-chart" style="height: 250px;"></div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer no-border">

        <div class="row">

            <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">

                <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                        data-fgColor="#39CCCC">

                <div class="knob-label">Paypal</div>

            </div>
            <!-- ./col -->

            <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">

                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                        data-fgColor="#39CCCC">

                <div class="knob-label">Otra forma de Pago</div>

            </div>
            <!-- ./col -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-footer -->
</div>
<!-- /.box -->

<script>

  var line = new Morris.Line({
    element          : 'line-chart',
    resize           : true,
    data             : [
      { y: '2017-07', ventas: 10 },
      { y: '2017-07', ventas: 10 },
      { y: '2017-08', ventas: 10 },
      { y: '2017-08', ventas: 20 },
      { y: '2017-09', ventas: 20 },
      { y: '2017-09', ventas: 10 },
      { y: '2017-11', ventas: 87 }
    ],
    xkey             : 'y',
    ykeys            : ['ventas'],
    labels           : ['Ventas'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    preUnits         : '$',
    gridTextSize     : 10
  });

</script>
