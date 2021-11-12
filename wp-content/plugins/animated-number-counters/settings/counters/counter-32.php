<div class="anc-6310-6310">
  <div class="anc-6310-sm">
    <?php
    include anc_6310_plugin_url . 'settings/helper/number-counter-save.php';
    if (!empty($_POST['update_style_change']) && $_POST['update_style_change'] == 'Save' && $_POST['id'] != '') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'anc_6310_nonce_field_form')) {
        die('You do not have sufficient permissions to access this pagess.');
      } else {
        $css = anc_6310_extract_data($_POST);
        $wpdb->query($wpdb->prepare("UPDATE $style_table SET css = %s WHERE id = %d", $css, sanitize_text_field($_POST['id'])));
      }
    }
    $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $styleId), ARRAY_A);
    $css = explode("!!##!!", $styledata['css']);
    $key = explode(",", $css[0]);
    $value = explode("||##||", $css[1]);
    $cssData = array_combine($key, $value);


    $counter_order  = explode(",", $styledata['counterids']);
    ?>

    <div class="anc-6310-plugin-setting-left">
      <?php
      include anc_6310_plugin_url . 'settings/form/_form-32.php';
      include anc_6310_plugin_url . 'settings/css/_css-32.php';
      include anc_6310_plugin_url . 'settings/helper/_helper-32.php';
      ?>
      <div class="anc-6310-preview-box">
        <div class="anc-6310-preview">
          Preview
          <div style="display: inline; float: right">
            <input type="text" id="anc_6310_background_preview" class="anc-6310-form-input  anc-6310-pull-right anc_6310_color_picker anc_6310_preview_color_chooser" data-format="rgb" data-opacity=".8" value="rgba(255, 255, 255, .8)">
          </div>
        </div>
        <hr />
      </div>
      <div class="anc_6310_tabs_panel_preview">
        <div id="anc-6310-number-counter">
          <div class="anc-6310-counter-32-paralax">
            <div class="anc-6310-counter-32-row">
              <?php
              $allCounters = array();
              if ($counter_order) {
                foreach ($counter_order as $coid) {
                  if ($coid) {
                    $results = $wpdb->get_row("SELECT * FROM $counter_table WHERE id={$coid}", ARRAY_A);
                    if ($results) {
                      $allCounters[] = $results;
                    }
                  }
                }
              }
              foreach ($allCounters as $allCounter) {
                $numbersPosition = ['', ''];
                if ($allCounter['commons'] != '') {
                  $numbersPosition = explode('###|||###', $allCounter['commons']);
                }
              ?>
                <div class="anc-6310-col-<?php echo $cssData['item_per_row'] ?>">
                  <div class="anc-6310-counter-32-wrapper">
                    <div class="anc-6310-counter-32">
                      <div class="anc-6310-counter-32-icon-wrapper">
                        <div class="anc-6310-counter-32-icon">
                          <i class="fas fa-allergies"></i>
                        </div>
                      </div>
                      <div class="anc-6310-counter-32-count-content">
                          <div class="anc-6310-counter-32-count-content-inner">
                              <div class="anc-6310-counter-32-count-prefix"><?php echo $numbersPosition[0] ?></div>
                              <div 
                          class="anc-6310-counter-32-count-number anc-6310-counter-number" 
                          id="anc-6310-<?php echo "{$styleId}-{$allCounter['id']}" ?>"
                          data-anc-6310-start="<?php echo $allCounter['numbers_start']; ?>" 
                          data-anc-6310-end="<?php echo $allCounter['numbers']; ?>" 
                          data-anc-6310-decimal="<?php echo anc_6310_number_format($allCounter['numbers']); ?>" 
                          data-anc-6310-duration="<?php echo isset($cssData['animation_duration']) && $cssData['animation_duration'] !== '' ? $cssData['animation_duration'] / 1000 : .5; ?>" 
                          data-anc-6310-thousands-separator="<?php echo isset($cssData['thousands_separator']) ? $cssData['thousands_separator'] : '' ?>"                                 
                        >
                          <?php echo $allCounter['numbers_start']; ?>
                        </div>
                              <div class="anc-6310-counter-32-count-suffix"><?php echo $numbersPosition[1] ?></div>
                          </div>
                        </div>
                     
                      <div class="anc-6310-counter-32-title"><?php echo anc_6310_special_character_remove($allCounter['title']) ?></div>
                          <div class="anc-6310-counter-32-description"><?php echo anc_6310_special_character_remove($allCounter['description']) ?></div>
                          <?php
                           if ($allCounter['readmore_text'] != '') {
                           ?>
                              <div class="anc-6310-counter-32-button"><a href="<?php echo $allCounter['readmore_url'] ?>" target="_blank"><?php echo anc_6310_special_character_remove($allCounter['readmore_text']) ?></a></div>
                           <?php
                           }
                           ?>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="anc-6310-plugin-setting-right">
      <?php anc_6310_add_or_edit_counter($styleId, $counter_order, $styledata['style_name']); ?>
    </div>