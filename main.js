/* ------ Calculator ------ */
function InitAggCalculator() {
  jQuery('#ac_calculate').click(CalculateMaterial).trigger('click');
  jQuery('.aggregateCalculator select, .aggregateCalculator input[type=text]').change(CalculateMaterial);
}

function CalculateMaterial() {
  var length = ToMillimeters(jQuery('#ac_length').val(), jQuery('#ac_length_units option:selected').val());
  var width = ToMillimeters(jQuery('#ac_width').val(), jQuery('#ac_width_units option:selected').val());
  var depth = ToMillimeters(jQuery('#ac_depth').val(), jQuery('#ac_depth_units option:selected').val());
  aggregate = jQuery('#ac_aggregate option:selected').val();

  mm3 = length * width * depth;
  agg_mm3 = mm3 * aggregate;
  tonnage = (agg_mm3 / 1000000000).toFixed(1);
  jQuery('#agg_required').text(tonnage);
  jQuery('#agg_required_bulk').text((tonnage / 0.75).toFixed(2));
  jQuery('#agg_required_bags').text((tonnage / 0.02).toFixed(2));
}

function ToMillimeters(value, units) {
  multiplier = 1;
  switch (parseInt(units)) {
    case 1:
      multiplier = 1;
    break;
    case 2:
      multiplier = 1000;
    break;
    case 3:
      multiplier = 25.4;
    break;
    case 4:
      multiplier = 304.8;
    break;
    case 5:
      multiplier = 914.4;
    break;
    default:
      multiplier = 1;
    break;
  }
  return value * multiplier;
}
jQuery(InitAggCalculator);