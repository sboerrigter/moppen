jQuery($ => {
  const isTouch = () =>
    (
      'ontouchstart' in window ||
      (window.DocumentTouch && document instanceof window.DocumentTouch)
    ) === true;

  if (isTouch()) {
    $('.whatsapp').css('display', 'inline-block');
  }
});
