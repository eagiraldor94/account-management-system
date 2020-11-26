$(function(){
    $('.datepicker').datepicker({ dateFormat: 'dd/mm/yy',autoclose: true,language:'es' });
    $('.timepicker').timepicker({
    timeFormat: 'H:mm',
    interval: 30,
    minTime: '8',
    maxTime: '23:00',
    defaultTime: '10',
    startTime: '8:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
    });
});
    $(function(){
      $('.hasDatepicker').click(function() {
          $('.ui-datepicker').css('z-index', $.topZIndex() + 1);
      });
      $('.timepicker').click(function() {
          $('.ui-timepicker-container').css('z-index', $.topZIndex() + 1);
          $('.ui-timepicker-container').removeClass('ui-helper-hidden');
          $('.ui-timepicker-container').removeClass('ui-timepicker-hidden');
      });
    });