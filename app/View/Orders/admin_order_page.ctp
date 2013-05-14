<script type="text/javascript">
    $(document).ready(function(){
        $( "#accordion" ).accordion({
            heightStyle: "content"
        });
        $("#OrderDate").change(function(){
            $("#OrderAdminOrderPageForm").submit();
        });
    });
</script>
<div class="admin_orders form">
    <?php echo $this->Form->create('Order'); ?>
        <fieldset>
            <legend><?php echo __('Admin Order Page'); ?></legend>
            <?= $this->Form->create('Order',array('action'=>'admin_order_page')); ?>
            <table>
                <tr>
                    <td>Order Date ::</td>
                    <td><?= $this->Form->input('date',array('empty'=>'Select Date','options'=>$dates,'label'=>false)) ?></td>
                </tr>
            </table>
        </fieldset>
    <?php echo $this->Form->end(); ?>
    <? $total_order = 0; $max_order = 0; $customer = ''; ?>
    <? if(isset($orders) && !empty($orders)): ?>
        <div id="accordion">    
            <? foreach($orders as $order): ?>
                <? if($order['Order']['order_total'] > $max_order): ?>
                    <? $max_order = $order['Order']['order_total']; ?>
                    <? $customer = $order['User']['username']; ?>
                <? endif; ?>
                <? $total_order += $order['Order']['order_total']; ?>
                <h3>Order #<?= $order['Order']['id'].' - '.$order['User']['username'].' - Order Amount : '.money_format('%10.1n',$order['Order']['order_total']) ?></h3>
                <div>
                    <table class='table'>
                        <? foreach($order['CartItem'] as $item): ?>
                            <tr>
                                <td><?= $this->Html->image($item['Product']['product_image'], array('alt' =>$item['Product']['product_name'],'style'=>'height:50px;width:50px;')) ?></td>
                                <td><?= $item['Product']['product_name'] ?></td>
                                <td><?= money_format('%10.1n',$item['Product']['product_price']) ?></td>
                            </tr>
                        <? endforeach; ?>
                        <tr>
                            <td colspan="2" style="text-align: center;"><strong>Total</strong></td>
                            <td><strong><?= money_format('%10.1n',$order['Order']['order_total']) ?></strong></td>
                        </tr>
                    </table>
                </div>
            <? endforeach; ?>
        </div>
        <div class="well">
            <h3>Snapshot</h3>
            <ul>
                <li>Total order on <b><?= $this->request->data['Order']['date'] ?></b> is Rs. <?= $total_order ?></li>
                <li>Largest order placed by <?= $customer ?> for <?= $max_order ?></li>
            </ul>
        </div>
    <? endif; ?>
</div>