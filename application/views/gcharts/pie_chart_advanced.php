<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Advanced Pie Chart</h1>
<?php
    echo $this->gcharts->PieChart('Activities')->outputInto('activites_div');
    echo $this->gcharts->div();

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

