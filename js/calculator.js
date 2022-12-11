(function($) {
  const $priceSection = $('.section__calculator .section__calculated-price');
  const $package = $('.section__calculator select[name="package"]');
  const $squareMeters = $('.section__calculator input[name="square-meters"]');
  const $calculatedPrice = $('.section__calculator .section__calculated-price h2 span');
  const priceSectionShowClass = 'section__calculated-price--show';

  async function calculatePrice() {
    const pricePerSquareMeter = parseInt($package.val());
    const squareMeters = parseInt($squareMeters.val());

    const totalPrice = pricePerSquareMeter * squareMeters;
    if (isNaN(totalPrice)) {
      $priceSection.removeClass(priceSectionShowClass);
      return;
    }

    $calculatedPrice.text(totalPrice);
    $priceSection.addClass(priceSectionShowClass);
  }

	$package.on('change', () => calculatePrice());
  $squareMeters.on('input', () => calculatePrice());
}(jQuery));
