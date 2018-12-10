                <footer class="footer text-right">
                    2016 - 2017 © Adminto.
                </footer>

            </div> <!-- content-page -->
            


</div> <!-- END wrapper -->




<div id="ModalPleasewait" class="modal-demo modal-sm" style="max-width:300px">
    
    <h4 class="custom-modal-title">Pleasewait ...</h4>
    <div class="custom-modal-text text-center">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="122" height="122" viewBox="0 0 122 122">
            <defs>
                <path id="gear" d="M72,52.4v-8.8l-5.4-0.9c-0.4-1.5-1-2.9-1.7-4.1l3.2-4.4l-6.2-6.3L57.4,31c-1.3-0.7-2.7-1.3-4.1-1.7L52.4,24h-8.8l-0.9,5.4  c-1.5,0.4-2.8,1-4.1,1.7L34.2,28l-6.3,6.2l3.2,4.4c-0.7,1.3-1.3,2.7-1.7,4.2L24,43.6v8.8l5.4,0.9c0.4,1.5,1,2.8,1.7,4.1l-3.2,4.5  l6.2,6.2l4.5-3.2c1.3,0.7,2.7,1.3,4.2,1.7l0.9,5.3h8.8l0.9-5.4c1.4-0.4,2.8-1,4.1-1.7l4.5,3.2l6.2-6.2l-3.2-4.5  c0.7-1.3,1.3-2.6,1.7-4.1L72,52.4z M48,57.2c-5.1,0-9.2-4.1-9.2-9.2c0-5.1,4.2-9.2,9.2-9.2s9.2,4.1,9.2,9.2S53.1,57.2,48,57.2z"></path>
            </defs>
            <g transform="scale(0.77)">
                <use xlink:href="#gear" fill="#5b69bc" transform="rotate(337.592 48 48)">
                    <animateTransform attributeType="XML" attributeName="transform" type="rotate" from="0 48 48" to="360 48 48" dur="12s" repeatCount="indefinite"></animateTransform>
                </use>
            </g>
            <g transform="scale(0.6) translate(83 13)">
                <use xlink:href="#gear" fill="#10c469" transform="rotate(22.4078 48 48)">
                    <animateTransform attributeType="XML" attributeName="transform" type="rotate" from="360 48 48" to="0 48 48" dur="12s" repeatCount="indefinite"></animateTransform>
                </use>
            </g>
            <g transform="scale(0.435) translate(37 139)">
                <use xlink:href="#gear" fill="#f9c851" transform="rotate(22.4078 48 48)">
                    <animateTransform attributeType="XML" attributeName="transform" type="rotate" from="360 48 48" to="0 48 48" dur="12s" repeatCount="indefinite"></animateTransform>
                </use>
            </g>
            <g transform="scale(0.935) translate(36 39)">
                <use xlink:href="#gear" fill="#ff8acc" transform="rotate(337.592 48 48)">
                    <animateTransform attributeType="XML" attributeName="transform" type="rotate" from="0 48 48" to="360 48 48" dur="12s" repeatCount="indefinite"></animateTransform>
                </use>
            </g>
        </svg>
    </div>
</div>



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php admin_assets() ?>js/jquery.min.js"></script>
        <script src="<?php admin_assets() ?>js/bootstrap.min.js"></script>
        <script src="<?php admin_assets() ?>js/detect.js"></script>
        <script src="<?php admin_assets() ?>js/fastclick.js"></script>
        <script src="<?php admin_assets() ?>js/jquery.slimscroll.js"></script>
        <script src="<?php admin_assets() ?>js/jquery.blockUI.js"></script>
        <script src="<?php admin_assets() ?>js/waves.js"></script>
        <script src="<?php admin_assets() ?>js/jquery.nicescroll.js"></script>
        <script src="<?php admin_assets() ?>js/jquery.slimscroll.js"></script>
        <script src="<?php admin_assets() ?>js/jquery.scrollTo.min.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="<?php admin_assets() ?>plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="<?php admin_assets() ?>plugins/jquery-knob/jquery.knob.js"></script>

            
        <?php if(isset($scripts) && in_array('morris', $scripts)): ?>
            <script src="<?php admin_assets() ?>plugins/morris/morris.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/raphael/raphael-min.js"></script>
            <!-- <script src="<?php admin_assets() ?>pages/jquery.dashboard.js"></script> -->
        <?php endif; ?>

        <?php if(isset($scripts) && in_array('modal', $scripts)): ?>
            <script src="<?php admin_assets() ?>plugins/custombox/dist/custombox.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/custombox/dist/legacy.min.js"></script>
        <?php endif; ?>

        <?php if(isset($scripts) && in_array('tree', $scripts)): ?>
            <script src="<?php admin_assets() ?>plugins/jstree/jstree.min.js"></script>
        <?php endif; ?>

        <?php if(isset($scripts) && in_array('datatables', $scripts)): ?>
            <script src="<?php admin_assets() ?>plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/dataTables.bootstrap.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/dataTables.buttons.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/buttons.bootstrap.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/jszip.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/pdfmake.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/vfs_fonts.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/buttons.html5.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/buttons.print.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/dataTables.fixedHeader.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/dataTables.keyTable.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/dataTables.responsive.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/responsive.bootstrap.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/datatables/dataTables.scroller.min.js"></script>

            <!-- <script src="<?php admin_assets() ?>pages/datatables.init.js"></script> -->
        <?php endif; ?>

        <?php if(isset($scripts) && in_array('formelements', $scripts)): ?>
            <script src="<?php admin_assets() ?>plugins/switchery/switchery.min.js"></script>
            <script src="<?php admin_assets() ?>plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
            <script type="text/javascript" src="<?php admin_assets() ?>plugins/multiselect/js/jquery.multi-select.js"></script>
            <script type="text/javascript" src="<?php admin_assets() ?>plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
            <script src="<?php admin_assets() ?>/plugins/select2/dist/js/select2.min.js" type="text/javascript"></script>
            <script src="<?php admin_assets() ?>/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
            <script src="<?php admin_assets() ?>/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
            <script src="<?php admin_assets() ?>/plugins/moment/moment.js"></script>
            <script src="<?php admin_assets() ?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>
            <script src="<?php admin_assets() ?>/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
            <script src="<?php admin_assets() ?>/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            <script src="<?php admin_assets() ?>/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
            <script src="<?php admin_assets() ?>/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <?php endif; ?>

        <!-- App js -->
        <script src="<?php admin_assets() ?>js/jquery.core.js"></script>
        <script src="<?php admin_assets() ?>js/jquery.app.js"></script>

        <script>
            $(document).ajaxStart(function(){
                showPleasewait();
            });
            $(document).ajaxStop(function(){
                hidePleasewait();
            });
        </script>

        <script>
            $(document).ready(function(){
                $('form').submit(function(){
                    // showPleasewait();
                });
                $('a').click(function(){
                    // showPleasewait();
                });
                
                getNotifications();

                setInterval(getNotifications,2000);
        

            });
            
        </script>
        <script>
            function showPleasewait(){
                ModalPleasewait = new Custombox.modal({
                    content: {
                        effect: 'door',
                        target: '#ModalPleasewait',
                        close: false,
                        speedIn: '100',
                        speedOut: '100',
                        color: '#36404a'
                    }
                });
                ModalPleasewait.open();
            }
            function hidePleasewait(){
                Custombox.modal.closeAll()
            }

            function areyousure(deleteWhat, elem){
                if(confirm(deleteWhat)===true){
                    window.location = $(elem).data('url');
                }
            }

            function getNotifications(){
                $.ajax({
                    type : "POST",
                    global: false,
                    url: "<?php echo base_url('admin/dashboard/getNotifications') ?>",
                    dataType: "json",
                    success: function (response){
                        console.log(response);
                        showNotifications(response);
                    }
                });
            }

            function showNotifications(response){
                if(response.new_users && response.new_users!=0){
                    $("#newUsers").removeClass('hidden').text(response.new_users+' New');
                }else{
                    $("#newUsers").removeClass('hidden').addClass('hidden');
                }
                
                if(response.new_vendors && response.new_vendors!=0){
                    $("#newVendors").removeClass('hidden').text(response.new_vendors+' New');
                }else{
                    $("#newVendors").removeClass('hidden').addClass('hidden');
                }
                
                if(response.new_products && response.new_products!=0){
                    $("#newProducts").removeClass('hidden').text(response.new_products+' New');
                }else{
                    $("#newProducts").removeClass('hidden').addClass('hidden');
                }

                if(response.new_orders && response.new_orders!=0 ){
                    $("#newOrders").removeClass('hidden').text(response.new_orders+' New');
                }else{
                    $("#newOrders").removeClass('hidden').addClass('hidden');
                }
            }

            function diffuseNotification(from, which){
                $.ajax({
                    global:false,
                    type: "POST",
                    data: "from="+from+"&which="+which,
                    url: "<?php echo base_url('admin/dashboard/diffuseNotification') ?>"
                });
            }
        </script>


    </body>
</html>