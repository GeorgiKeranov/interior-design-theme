(function($) {
  const $priceSection = $('.section__calculator .section__calculated-price');
  const $package = $('.section__calculator select[name="package"]');
  const $squareMeters = $('.section__calculator input[name="square-meters"]');
  const $calculatedPriceBGN = $('.section__calculator .section__calculated-price h2 .section__price-bgn');
  const $calculatedPriceEUR = $('.section__calculator .section__calculated-price h2 .section__price-eur');
  const priceSectionShowClass = 'section__calculated-price--show';

  async function calculatePrice() {
    const pricePerSquareMeter = parseInt($package.val());
    const squareMeters = parseInt($squareMeters.val());

    const totalPriceBGN = pricePerSquareMeter * squareMeters;
    const totalPriceEUR = Math.round(pricePerSquareMeter / 1.95583) * squareMeters;
    if (isNaN(totalPriceBGN) || isNaN(totalPriceEUR)) {
      $priceSection.removeClass(priceSectionShowClass);
      return;
    }

    $calculatedPriceBGN.text(totalPriceBGN);
    $calculatedPriceEUR.text(totalPriceEUR);
    $priceSection.addClass(priceSectionShowClass);
  }

	$package.on('change', () => calculatePrice());
  $squareMeters.on('input', () => calculatePrice());
}(jQuery));
