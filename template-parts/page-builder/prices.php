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
      <?php endforeach ?>
    </div>
  </div>
</div>
