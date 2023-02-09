function setDatePicker(input){
    $(input).datetimepicker({
      format: "YYYY-MM-DD",
      useCurrent: false
    })
  }
  function setDateRangePicker(input1, input2){
    $(input1).datetimepicker({
      format: "YYYY-MM-DD",
      useCurrent: false
    })
    $(input1).on("change.datetimepicker", function (e) {
      $(input2).val("")
          $(input2).datetimepicker('minDate', e.date);
      })
    $(input2).datetimepicker({
      format: "YYYY-MM-DD",
      useCurrent: false
    })
  }
  function setMonthPicker(input){
    $(input).datetimepicker({
      format: "MM",
      useCurrent: false,
      viewMode: "months"
    })
  }
  function setYearPicker(input){
    $(input).datetimepicker({
      format: "YYYY",
      useCurrent: false,
      viewMode: "years"
    })
  }
  function setYearRangePicker(input1, input2){
    $(input1).datetimepicker({
      format: "YYYY",
      useCurrent: false,
      viewMode: "years"
    })
    $(input1).on("change.datetimepicker", function (e) {
      $(input2).val("")
          $(input2).datetimepicker('minDate', e.date);
      })
    $(input2).datetimepicker({
      format: "YYYY",
      useCurrent: false,
      viewMode: "years"
    })
  }