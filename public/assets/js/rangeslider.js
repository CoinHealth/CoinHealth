var rangeSlider = function(){
  var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');
    
  slider.each(function(){

    value.each(function(){
      var value = $(this).prev().attr('value');
      $(this).html(value);
    });

    range.on('input', function(){
      value.html(this.value);
    });
  });
};

rangeSlider();

$('input[type="range"]').change(function () {
    var val = ($(this).val() - $(this).attr('min')) / ($(this).attr('max') - $(this).attr('min'));
    
    $(this).css('background-image',
      '-webkit-gradient(linear, left top, right top, '
      + 'color-stop(' + val + ', #ff8a00), '
      + 'color-stop(' + val + ', #444444)'
      + ')'
    );
});