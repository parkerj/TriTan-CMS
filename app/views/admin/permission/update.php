<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
use TriTan\Config;
/**
 * View Permission View
 *  
 * @license GPLv3
 * 
 * @since       0.9
 * @package     TriTan CMS
 * @author      Joshua Parker <joshmac3@icloud.com>
 */
$this->layout('main::_layouts/admin-layout');
$this->section('backend');
$ePerm = new \TriTan\ACL();
Config::set('screen_parent', 'roles');
Config::set('screen_child', 'perm');

?>

<!-- form start -->
<form method="post" action="<?= get_base_url(); ?>admin/permission/<?= _escape((int) $this->perm['permission_id']); ?>/" data-toggle="validator" autocomplete="off">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title"><?= _t('Update Permission', 'tritan-cms'); ?></h3>

                <div class="pull-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> <?= _t('Update', 'tritan-cms'); ?></button>
                    <button type="button" class="btn btn-primary" onclick="window.location = '<?= get_base_url(); ?>admin/permission/'"><i class="fa fa-ban"></i> <?= _t('Cancel', 'tritan-cms'); ?></button>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <?= _ttcms_flash()->showMessage(); ?>

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label><font color="red">*</font> <?= _t('Name'); ?></label>
                                <input type="text" class="form-control" name="permission_name" value="<?= $ePerm->getPermNameFromID(_escape((int) $this->perm['permission_id'])); ?>" required>
                            </div>

                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">

                            <div class="form-group">
                                <label><font color="red">*</font> <?= _t('Key'); ?></label>
                                <input type="text" class="form-control" name="permission_key" value="<?= $ePerm->getPermKeyFromID(_escape((int) $this->perm['permission_id'])); ?>" required>
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</form>
<?php $this->stop(); ?>