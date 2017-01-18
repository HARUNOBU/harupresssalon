$(function(){
  var $this;

  var moving = false;
  $('li.dropdown').on('mousemove', function(){
    if (!moving) {
      moving = true;
      return;
    }
    $this = $(this);
    if ($this.css('float')!='left') return;
    $this.addClass('open');
    moving = false;
  });

  $('li.dropdown').hover(function(){
    // 何もしない
  }, function(){
    $this = $(this);
    $this.removeClass('open');
    moving = false;
  });
});