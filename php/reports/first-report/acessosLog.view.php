<?php 
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\BarChart;
?>

<div class="text-center">
    <h1>Sales Report</h1>
    <h4>This report shows top 10 sales by customer</h4>
</div>
<hr/>

<?php
    BarChart::create(array(
        "dataStore"=>$this->dataStore('acessos'),
        "width"=>"100%",
        "height"=>"500px",
        "columns"=>array(
            
            "host"=>array(
                "label"=>"path"
            ),  
            "id"=>array(
                "type"=>"number",
                "label"=>"id",
                "prefix"=>":",
            ),
            // "host"=>array(
            //     "label"=>"host"
            // )
            
        ),
        "options"=>array(
            "title"=>"Sales By Customer"
        )
    ));
?>

<?php
Table::create(array(
    "dataStore"=>$this->dataStore('array_data'),
        "columns"=>array(
            "customerName"=>array(
                "label"=>"customerName"
            ),
            "dollar_sales"=>array(
                "type"=>"number",
                "label"=>"dollar_sales",
                "prefix"=>"$",
            ),
            
            
        ),
    "cssClass"=>array(
        "table"=>"table table-hover text-center table-bordered"
    )
));
?>