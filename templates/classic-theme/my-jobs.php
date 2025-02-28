<?php include_once TEMPLATE_PATH.'/header.php'; ?>
<!-- Dashboard Container -->
<div class="dashboard-container">

    <?php include_once TEMPLATE_PATH.'/dashboard_sidebar.php'; ?>

    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner" >
            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3><?php _e("My Jobs") ?></h3>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                        <li><?php _e("My Jobs") ?></li>
                    </ul>
                </nav>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">
                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-assignment"></i> <?php _e("My Jobs") ?></h3>
                            <form method="get" action="">
                                <div class="input-with-icon">
                                    <input class="with-border margin-bottom-0" name="keywords" value="<?php _esc($keywords) ?>" type="text" placeholder="<?php _e("Search") ?>...">
                                    <i class="icon-feather-search"></i>
                                </div>
                            </form>
                        </div>

                        <div class="content">
                            <div class="content with-padding">

                                <div class="table-responsive">
                                    <table id="js-table-list" class="basic-table dashboard-box-list">
                                        <tr>
                                            <th class="big-width"><?php _e("Jobs") ?></th>
                                            <th class="small-width"><?php _e("Status") ?></th>
                                            <th class="small-width"><?php _e("Actions") ?></th>
                                        </tr>
                                        <?php
                                        if($totalitem){
                                            foreach ($items as $item){
                                                ?>
                                                <tr class="ajax-item-listing <?php if($item['hide'] == '1') echo "opapcityLight"; ?>" data-item-id="<?php _esc($item['id'])?>">
                                                    <td>
                                                        <div class="job-listing">
                                                            <div class="job-listing-details">
                                                                <div class="job-listing-description">
                                                                    <?php if($config['company_enable']){ ?>
                                                                        <h4 class="job-listing-company"><?php _esc($item['company_name'])?></h4>
                                                                    <?php } ?>
                                                                    <h3 class="job-listing-title margin-bottom-5">
                                                                        <a href="<?php _esc($item['link'])?>"><?php _esc($item['product_name'])?></a>
                                                                        <label class="label-wrap hidden-sm hidden-xs">
                                                                            <?php
                                                                            if($item['featured']=="1") {
                                                                                echo '<div class="dashboard-status-button blue">'.__("Featured").'</div>';
                                                                            }
                                                                            if($item['urgent']=="1") {
                                                                                echo '<div class="dashboard-status-button yellow">'.__("Urgent").'</div>';
                                                                            }
                                                                            if($item['highlight']=="1") {
                                                                                echo '<div class="dashboard-status-button red">'.__("Highlight").'</div>';
                                                                            }
                                                                            ?>
                                                                        </label>
                                                                    </h3>
                                                                    <div class="job-listing-footer">
                                                                        <ul>
                                                                            <li><i class="la la-map-marker"></i> <?php _esc($item['location'])?></li>
                                                                            <?php if($item['salary_min'] != "0"){ ?>
                                                                                <li><i class="la la-credit-card"></i> <?php _esc($item['salary_min'])?> - <?php _esc($item['salary_max'])?> <?php _e("Per") ?> <?php _esc($item['salary_type'])?></li>
                                                                            <?php }?>
                                                                            <li><i class="la la-clock-o"></i> <?php _esc($item['created_at'])?></li>
                                                                            <li><i class="la la-suitcase"></i> <?php _esc($item['product_type'])?></li>
                                                                            <li><i class="la la-calendar-times-o"></i> <?php _e("Expiring") ?>: <?php _esc($item['expire_date'])?></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if($item['status']=="active") {
                                                            echo '<span class="dashboard-status-button green">'._esc($item['status'],false).'</span>';
                                                        }
                                                        if($item['status']=="pending") {
                                                            echo '<span class="dashboard-status-button blue">'._esc($item['status'],false).'</span>';
                                                        }
                                                        if($item['status']=="expire") {
                                                            echo '<span class="dashboard-status-button yellow">'._esc($item['status'],false).'</span>';
                                                        }
                                                        if($item['status']=="rejected") {
                                                            echo '<span class="dashboard-status-button red">'._esc($item['status'],false).'</span>';
                                                        }
                                                        if($item['hide']=="1") {
                                                            echo '<span class="dashboard-status-button red label-hidden">'.__("Hidden").'</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php url("APPLIED_USERS") ?>/<?php _esc($item['id'])?>" class="button gray ripple-effect ico" data-tippy-placement="top" title="<?php _e("Applied Users") ?>"><i class="icon-feather-users"></i></a>
                                                        <a href="<?php url("EDIT-JOB") ?>/<?php _esc($item['id'])?>" class="button gray ripple-effect ico" data-tippy-placement="top" title="<?php _e("Edit") ?>"><i class="icon-feather-edit"></i></a>
                                                        <?php
                                                        if($item['hide']=="0") {
                                                            echo '<a href="#" data-ajax-action="hideItem" class="button gray ripple-effect ico item-js-hide" data-tippy-placement="top" title="'.__("Hide").'"><i class="icon-feather-eye-off"></i></a>';
                                                        }else{
                                                            echo '<a href="#" data-ajax-action="hideItem" class="button gray ripple-effect ico item-js-hide" data-tippy-placement="top" title="'.__("Show").'"><i class="icon-feather-eye"></i></a>';
                                                        }
                                                        ?>
                                                        <a href="#" data-ajax-action="deleteMyAd" class="button gray ripple-effect ico item-js-delete" data-tippy-placement="top" title="<?php _e("Delete") ?>"><i class="icon-feather-trash-2"></i></a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        }else{ ?>
                                            <tr>
                                                <td colspan="3" class="text-center"><?php _e("No active jobs found.") ?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Pagination -->
                                        <div class="pagination-container margin-top-20">
                                            <nav class="pagination">
                                                <ul>
                                                    <?php
                                                    foreach($pages as $page) {
                                                        if ($page['current'] == 0){
                                                            ?>
                                                            <li><a href="<?php _esc($page['link'])?>"><?php _esc($page['title'])?></a></li>
                                                        <?php }else{
                                                            ?>
                                                            <li><a href="#" class="current-page"><?php _esc($page['title'])?></a></li>
                                                        <?php }
                                                    }
                                                    ?>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row / End -->

<?php include_once TEMPLATE_PATH.'/overall_footer_dashboard.php'; ?>