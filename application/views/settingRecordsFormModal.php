<!-- Modal -->
<div class="modal fade" id="setting-module-modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $method; ?> <?php echo $module; ?></h4>
            </div>
            <div class="modal-body clearfix">
                <form id="setting-module-form" action="<?php echo base_url('setting/') . strtolower($method); ?>" method="post">
                    <?php if ($module == 'Area' || $module == 'Street') { ?>
                        <div class="form-group">
                            <label for="fk_dis_id">District Name:</label>
                            <select class="form-control" name="fk_dis_id" id="fk_dis_id">
                                <option value="" <?php echo (!isset($fk_dis_id)) ? 'selected' : ""; ?>>Select District</option>
                                <?php foreach ($districts as $dis): ?>
                                    <option value="<?php echo $dis->dis_id; ?>" <?php echo (isset($fk_dis_id) && $fk_dis_id == $dis->dis_id) ? 'selected' : ""; ?>>
                                        <?php echo $dis->dis_name; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>            
                    <?php } ?>


                    <?php if ($module == 'Street') { ?>
                        <div class="form-group">
                            <label for="fk_area_id">Area Name:</label>
                            <select class="form-control" name="fk_area_id" id="fk_area_id">
                                <option value="" <?php echo (!isset($fk_area_id)) ? 'selected' : ""; ?>>Select Area</option>
                                <?php if (isset($areas)): ?>
                                    <?php foreach ($areas as $area): ?>
                                        <option value="<?php echo $area->area_id; ?>" <?php echo (isset($fk_area_id) && $fk_area_id == $area->area_id) ? 'selected' : ""; ?>>
                                            <?php echo $area->area_name; ?>
                                        </option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>            
                    <?php } ?>
                    <div class="form-group">
                        <label for="title"><?php echo $module; ?>  <?php
                            if ($module == 'Pipe Size') {
                                
                            } else {
                                ?> Name <?php } ?>:</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo (isset($name)) ? html_escape($name) : ""; ?>">
                    </div>
                    <?php
                    if ($module == 'Pipe Size') {
                        //echo $selected_psz_units->psz_unit.' selected unit';
                        ?>
                        <div class="form-group">
                            <label for="psz_unit">Size Unit:</label>
                            <select class="form-control" name="psz_unit" id="psz_unit">
                                <!--<option value="" <?php echo (!isset($psz_unit)) ? 'selected' : ""; ?>>Select Pipe Size</option>-->
                                    <?php foreach ($psz_units as $dis): ?>
                                    <option value="<?php echo $dis; ?>" <?php echo (isset($selected_psz_units) && $selected_psz_units->psz_unit == $dis) ? 'selected' : ""; ?>>
                                    <?php echo $dis; ?>
                                    </option>
    <?php endforeach ?>
                            </select>
                        </div>            
                    <?php }else { ?>

                    <?php } ?>
<?php if ($module == 'Street') { ?>
                        <div class="form-group">
                            <label for="street_no"><?php echo $module; ?> Street Number:</label>
                            <input type="text" class="form-control" name="street_no" id="street_no" value="<?php echo (isset($street_no)) ? html_escape($street_no) : ""; ?>">
                        </div>
<?php } ?>
                    <input type="hidden" name="module" value="<?php echo $module; ?>">
                    <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : ""; ?>">
                    <button type="submit" class="btn btn-success pull-right" style="margin:auto 5px;">Submit</button>
                    <button type="button" class="btn btn-default pull-right" type="button" data-dismiss="modal" style="margin:auto 5px;">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if ($module == 'Street'): ?>
    <script type="text/javascript">
        $('#fk_dis_id').change(function () {
            $.get('<?php echo base_url(); ?>setting/getAreasByDistrict/' + $(this).val(), function (response) {
                var areas = JSON.parse(response);
                $('#fk_area_id').empty();
                $('#fk_area_id').append('<option selected value="">Select Area</option>');
                for (var i = 0; i < areas.length; i++) {
                    $('#fk_area_id').append('<option value="' + areas[i].area_id + '">' + areas[i].area_name + '</option>');
                }
            });
        });
    </script>
    <?php
 endif ?>