<?php $this->load->view('admin/header') ?>
    <style>
        .jstree-default .jstree-clicked{background:none;}
    </style>
        
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">

                                <h4 class="header-title m-t-0 m-b-30"><?php echo $create_edit_title; ?> </h4>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <form class="form-horizontal" role="form" id="FormCategory"  method="POST" action="<?php echo base_url('admin/dashboard/categories') ?>"    >

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Category</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="category" placeholder="Category Name" value="<?php echo( isset( $edit['category'] ) )? ucwords($edit['category']) : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Parent Category</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="parent_id">
                                                        <option value="null">Select Parent Category</option>
                                                        <?php foreach($categories as $c): ?>
                                                        <option value="<?php echo $c['id'] ?>" <?php echo( isset($edit['parent']) && $edit['parent']==$c['id'] ) ? 'selected' : '' ; ?> >
                                                        <?php echo ucwords($c['category']); ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            

                                            <div class="form-group m-b-0">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <?php if( isset($edit) ): ?>
                                                        <button type="button" class="btn btn-warning waves-effect waves-light m-r-10" onclick="window.location='<?php echo base_url('admin/dashboard/categories') ?>'">Cancel</button>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light m-r-10" onclick="areyousure('Are you sure you want to delete this category?', this)" data-url="<?php echo base_url('admin/dashboard/deleteCategory/').$edit['edit'] ?>">Delete</button>
                                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                                                        <input type="hidden" name="id" value="<?php echo $edit['edit'] ?>">
                                                    <?php else: ?>
                                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                                    <?php endif; ?>
                                                    
                                                    <span class="text-warning m-l-10" id="ajax_message"></span>
                                                </div>
                                            </div>


                                        </form>
                                    </div><!-- end col -->

                                    

                                </div><!-- end row -->
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->

                

                    <?php $this->load->view('admin/categories/tree'); ?>
                            
                       

            </div> <!-- container -->

        </div> <!-- content -->



<?php $this->load->view('admin/footer') ?>       

<script>
    $(document).ready(function(){

        $("#ajaxTree").jstree({
                'core' : {
                    'check_callback' : true,
                    'themes' : {
                        'responsive': false
                    }
                },
                "types" : {
                    'default' : {
                        'icon' : 'fa fa-file-text'
                    },
                    'file' : {
                        'icon' : 'fa fa-file'
                    }
                },
                "plugins" : [ 
                    // "contextmenu", 
                    // "dnd", 
                    // "search", 
                    "state", 
                    "types", 
                    // "wholerow" 
                ]
        }, 'open_all');


    });
</script>

<script>

$(document).on('click', '.jstree-anchor', function(){
    $this = $(this);
    $li = $this.closest('li');
    id = $li.attr('data-id');
    category = $li.attr('data-category');
    parent = $li.attr('data-parent');
    window.location = "<?php echo base_url('admin/dashboard/categories'); ?>"+"?edit="+id+"&category="+category+"&parent="+parent;
});

</script>