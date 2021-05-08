
function toggleDisabled(checkbox, field)
{
    $(field).attr('disabled', !checkbox.checked)
}
function login(formId) {

  var form = $('#' + formId);
  form.find('has-error').removeClass('has-error');

  $.ajax({
    type: "POST",
    url: form.attr('action'),
    data: form.serialize(),
    success: function(response) {
      if(response.errors == 0){
        form.find('.form-group').removeClass('has-error').addClass('has-success');
        form.find('.has-success').removeClass('hidden');
        location.reload();
      }
      else
      {
        form.find('.form-group').addClass('has-error');
      }
    },
    dataType: 'json'
  });
}

function logout(url) {
  $.ajax({
    type: "GET",
    url: url,
    success: function() {
      location.reload();
    }
  });
}

function selectEvent(obj, id) {
  var selector = $(obj);
  selector.closest('ul').find('.selected').removeClass('selected');
  selector.addClass('selected');
  $('#eventIdInput').val(id);
  $('#eventLabel').html(selector.html());
}

function toggleEvent(obj, id, value) {

  var selector = $(obj);
  var list = selector.closest('ul');
  var label = $('#filterValue');

  if(selector.hasClass('selected')) {
    selector.removeClass('selected');
    $('#filterFieldId').val(0);
  } else {
    list.find('.selected').removeClass('selected');
    selector.addClass('selected');

    $('#filterFieldId').val(id);
    $('#filterFieldValue').val(value);
  }

  (list.find('.selected').size()) ? label.html(selector.html()) : label.html(label.attr('placeholder'));

  return false;
}

$(function () {
       $("input[name='form[birthDate][value]'], #filterBirthDate").datepicker({format: 'yyyy-mm-dd', autoclose:true});

       $("a[data-target=#myModal]").click(function(ev) {
          ev.preventDefault();
          var target = $(this).attr("href");

          // load the url and show modal on success
          $("#myModal .modal-content").load(target, function() {
               $("#myModal").modal("show");
          });
      });
});
