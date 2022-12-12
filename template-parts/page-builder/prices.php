<div id="prices" class="section-prices">
  <div class="container">
    <div class="section__title">
      <h2><?php echo esc_html( $args['title'] ) ?></h2>
    </div>
    
    <div class="section__prices">
      <?php foreach ( $args['prices'] as $price ) : ?>
        <div class="section__price">
          <div class="section__price-title">
            <h3><?php echo esc_html( $price['title'] ) ?></h3>
          </div>
          
          <?php if ( !empty( $price['price'] ) ) : ?>
            <div class="section__price-price">
              <h2><?php echo esc_html( $price['price'] ) ?><span><strong>лв</strong> / кв. м.</span></h2>
            </div>
          <?php endif; ?>
          
          <div class="section__text">
            <?php echo apply_filters( 'the_content', $price['text'] ); ?>
          </div>
          
          <div class="section__actions">
            <?php idt_render_button( $price['btn_text'], $price['btn_link'], $price['btn_new_tab'], 'btn' ) ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    
    <?php if ( !empty( $args['prices'] ) ) : ?>
      <div class="section__calculator section-fade">
        <h2><?php echo esc_html( $args['calculator_title'] ) ?></h2>

        <div class="section__cols">
          <div class="section__package">
            <label for="package"><?php _e( 'Избери пакет', 'idt' )?></label>

            <select name="package" id="package">
              <?php foreach ( $args['prices'] as $index => $price ) : ?>
                <option value="<?php echo esc_html( $price['price'] ) ?>"<?php echo $index === 0 ? ' selected' : ''?>>
                  <?php echo esc_html( $price['title'] ) . ' - ' . esc_html( $price['price'] ) . 'лв / кв.м.' ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="section__square-meters">
            <label for="square-meters"><?php _e( 'Въведи квадратура (кв.м.)', 'idt' )?></label>

            <input type="text" name="square-meters" id="square-meters">
          </div>
        </div>

        <div class="section__calculated-price">
          <h3><?php echo esc_html( $args['calculator_text'] ) ?></h3>
          
          <h2><span></span>лв</h2>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
