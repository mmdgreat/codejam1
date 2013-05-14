<script type="text/javascript">
    $(document).ready(function(){
        $.configureBoxes({ transferMode: 'copy', useCounters: false });
    });
</script>
<style type="text/css">
    .btn{
        width: 120px;
    }
</style>
<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Place an order'); ?></legend>
        Select a customer :: <?php echo $this->Form->input('user_id',array('label'=>false)); ?>
        <table>
            <tr>
            
                <td>
                    <?= $this->Form->input('products',array('options'=>$products,'multiple'=>'multiple','label'=>false,
                                                            'id'=>'box1View','style'=>'height:320px;width:auto;')); ?><br/>
                    <span id="box1Counter" class="countLabel"></span>
                </td>
                <td>
                    <button id="to2" type="button" class="btn btn-info"> Add ></button>
                    <button id="allTo2" type="button" class="btn btn-success"> Add All >> </button>
                    
                    <br/><br/><br/>
                    
                    <button id="to1" type="button" class="btn btn-warning"> < Remove </button>
                    <button id="allTo1" type="button" class="btn btn-danger"> << Remove All </button>
                    
                </td>
                <td>
                    <?= $this->Form->input('products',array('options'=>'','multiple'=>'multiple','label'=>false,
                                                            'id'=>'box2View','style'=>'height:320px;width:auto;min-width: 300px;')); ?><br/><br/>
                    <span id="box2Counter" class="countLabel"></span>
                </td>
            </tr>
        </table>
	</fieldset>
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
</div>