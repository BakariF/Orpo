$('.carousel').carousel({
    interval: 2000
  })
  
  new Cleave('budget', {
    numeral: true,
    numeralDecimalMark: ',',
    delimiter: ' '
});