<?php
    global $braintech_option;    
    $header_width_meta = get_query_var(get_the_ID(), 'header_width_custom', true);
    if ($header_width_meta != '' && empty($braintech_option['enable_global'])){  
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = $braintech_option['header-grid'];
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }
?>

<?php
  $header_trans = '';
    if(!empty($braintech_option['header_layout'])){  
               
        $header_style = $braintech_option['header_layout'];               
        if($header_style == 'style2'){       
            $header_trans = 'heads_trans';    
        }
    }
?>

<?php  
    $post_menu_type = get_post_meta(get_queried_object_id(), 'menu-type', true); 
    $post_meta_data = get_post_meta(get_queried_object_id(), 'banner_image', true);
    $content_banner = get_post_meta(get_queried_object_id(), 'content_banner', true); 
?>

<div class="rs-breadcrumbs porfolio-details <?php echo esc_attr($header_trans);?>">
<?php if($post_meta_data !='') { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $post_meta_data );?>')">
        <div class="<?php echo esc_attr($header_width);?>">
          <div class="row">
            <div class="col-md-12 text-center">
              <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
                <?php 
                    $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                    <?php if( $post_meta_title != 'hide' ){             
                    ?>
                    <h1 class="page-title">
                        <?php if($content_banner !=''){
                           echo wp_kses_post($content_banner);
                            } else {                                
                                woocommerce_page_title();
                            }
                        ?>
                    </h1>
                    <?php } 
                    if(!empty($braintech_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                        if( $rs_breadcrumbs != 'hide' ):        
                        if(function_exists('bcn_display')){?>
                            <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                        <?php } 
                        endif;
                    }
                ?>    
              </div>
            </div>
          </div>
        </div>
    </div>
<?php }
  
    elseif(!empty($braintech_option['shop_banner']['url'])){ 
        $shop_banner = $braintech_option['shop_banner']['url'];?>
        <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $shop_banner );?>')">   
            <div class="<?php echo esc_attr($header_width);?>">
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">            
                    <?php 
                           $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                           <?php if( $post_meta_title != 'hide' ){             
                           ?>
                           <h1 class="page-title">
                               <?php if($content_banner !=''){
                                  echo wp_kses_post($content_banner);
                                   } else {                                
                                       woocommerce_page_title();
                                   }
                               ?>
                           </h1>
                           <?php } 
                            if(!empty($braintech_option['off_breadcrumb'])){
                                $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                                   if( $rs_breadcrumbs != 'hide' ):        
                                   if(function_exists('bcn_display')){?>
                                       <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                                   <?php } 
                               endif;
                           }
                        ?>   
                  </div>
                </div>
              </div>
            </div>
        </div>
      <?php }
      else{
        ?>
        <div class="rs-breadcrumbs-inner">
          <div class="<?php echo esc_attr($header_width);?>">
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                   <?php 
                         $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                         <?php if( $post_meta_title != 'hide' ){             
                         ?>
                            <h1 class="page-title">
                                <?php if($content_banner !=''){
                                    echo wp_kses_post($content_banner);
                                } else {                                
                                    woocommerce_page_title();
                                }
                                ?>
                            </h1>
                        <?php } 
                            if(!empty($braintech_option['off_breadcrumb'])){
                                $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                                if( $rs_breadcrumbs != 'hide' ):        
                                    if(function_exists('bcn_display')){?>
                                        <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                                <?php } 
                            endif;
                        }
                    ?>                 
                </div>
              </div>
            </div>
          </div>
      </div>
        <?php
      }
      ?>
</div>