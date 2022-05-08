<?php

error_reporting(0);
$sales = ControllerSales::showSales();
$totalSales = ControllerSales::showTotalSales();

$arrayDates = array();
$arrayDatePay = array();
$totalPaypal = 0;
$totalOther = 0;

foreach ($sales as $key => $value) {

    //PORCENTAJE METODOS DE PAGO PAYPAL
    if($value["method"] == "paypal"){

        $totalPaypal += $value["payment"];

        $percentPaypal = $totalPaypal * 100 / $totalSales["total"];
    }

    if($value["method"] == "other"){

        $totalOther += $value["payment"];

        $percentOther = $totalOther * 100 / $totalSales["total"];
    }

    //SE CAPTURA AÑO Y MES DE LA FECHA

    $date = substr($value["date"],0,7);

    //AGREGO LAS FECHAS CAPTURAS EN UN ARRAY
    array_push($arrayDates, $date);

    //AGRUPO LOS PAGOS CON SUS RESPECTIVAAS FECHAS EN UN MISMO ARRAY
    $arrayDatePay = array($date => $value["payment"]);

    //SUMAMOS LOS PAGOS QUE OCURRIERON EL MISMO MES
    foreach ($arrayDatePay as $key => $value) {
        
        $sumPayMonth[$key] += $value;

    }

    
    
}

// EVITO REPETIR FECHAS
$noRepeatDates = array_unique($arrayDates);

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

                <input type="text" class="knob" data-readonly="true" value="<?php echo round($percentPaypal); ?>" data-width="60" data-height="60"
                        data-fgColor="#39CCCC">

                <div class="knob-label">Paypal</div>

            </div>
            <!-- ./col -->

            <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">

                <input type="text" class="knob" data-readonly="true" value="<?php echo round($percentOther); ?>" data-width="60" data-height="60"
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

    <?php

        foreach ($noRepeatDates as $value) {
            
            echo "{ y: '".$value."', ventas: ".$sumPayMonth[$value]." }";

        }

    ?>
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
