
function  postallformdata(form,path){
    var submit=$(form).find('button[type="submit"]');
    var submitval=$(submit).val();
    $(submit).prop("disabled", true);
    if(submitval=="Submit"){
        $(submit).val("Submitting...");
    }else if(submitval=="Send"){
      $(submit).val("Sending...");
      $(submit).html("Sending...");
    }else if(submitval=="Update"){
        $(submit).val("Updating...");
        $(submit).html("Updating...");
    }else if(submitval=="Upload"){
      $(submit).val("Uploading...");
      $(submit).html("Uploading...");
    }else{
        $(submit).val("Saving...");
    }
//  debugger;

    var formData = new FormData(form);
    $.ajax({
        url: 'views/pages/'+path,
        type: 'POST',
        contentType: false,
        cache: false,
        processData:false,
        data:formData,
        success: function (data) {
            $(submit).prop("disabled", false);
            $(submit).val(submitval);
            $(form).find(".form-alertmaster").html(data);
            $(".submitbtn").prop("disabled", false);
        }
    });
}
function postformdata(form,path){
  var submit=$(form).find('input[type="submit"]');
  var submitval=$(submit).val();
  if(submit.length==0){
    var submit=$(form).find('button[type="submit"]');
    var submitval=$(submit).html();
  }
  $(submit).prop("disabled", true);
  if(submitval=="Submit"){
    $(submit).val("Submitting...");
    $(submit).html("Submitting...");
  }else if(submitval=="Send"){
      $(submit).val("Sending...");
      $(submit).html("Sending...");
  }else if(submitval=="Update"){
      $(submit).val("Updating...");
      $(submit).html("Updating...");
  }else if(submitval=="Upload"){
    $(submit).val("Uploading...");
    $(submit).html("Uploading...");
  }else{
    $(submit).val("Saving...");
    $(submit).html("Saving...");
  }
//  debugger;
  $.ajax({
    url: 'views/pages/'+path,
    type: 'POST',
    data:$(form).serialize(),
    success: function (data) {
      $(submit).prop("disabled", false);
      $(submit).val(submitval);
      $(submit).html(submitval);
      $(".alertmaster").html(data);
      $(".submitbtn").prop("disabled", false);

    }
  });
}
async function postasyncformdata(form,path){
  var submit=$(form).find('input[type="submit"]');
  var submitval=$(submit).val();
  if(submit.length==0){
    var submit=$(form).find('button[type="submit"]');
    var submitval=$(submit).html();
  }
  $(submit).prop("disabled", true);
  if(submitval=="Submit"){
    $(submit).val("Submitting...");
    $(submit).html("Submitting...");
  }else if(submitval=="Send"){
      $(submit).val("Sending...");
      $(submit).html("Sending...");
  }else if(submitval=="Update"){
      $(submit).val("Updating...");
      $(submit).html("Updating...");
  }else if(submitval=="Upload"){
    $(submit).val("Uploading...");
    $(submit).html("Uploading...");
  }else{
    $(submit).val("Saving...");
    $(submit).html("Saving...");
  }
//  debugger;
  $.ajax({
    url: 'views/pages/'+path,
    type: 'POST',
    data:$(form).serialize(),
    async:false,
    success: function (data) {
      $(submit).prop("disabled", false);
      $(submit).val(submitval);
      $(submit).html(submitval);
      $(".alertmaster").html(data);
      $(".submitbtn").prop("disabled", false);
      return true;

    }
  });
  return false;
}
function postform(form,path){
  var submit=$(form).find('input[type="submit"]');
  var submitval=$(submit).val();
  $(submit).prop("disabled", true);
  if(submitval=="Submit"){
    $(submit).val("Submitting...");
  }if(submitval=="Upload"){
    $(submit).val("Uploading...");
  }else{
    $(submit).val("Saving...");
  }
//  debugger;
  $.ajax({
    url: 'views/pages/'+path,
    type: 'POST',
    data:form,
    processData: false,
    contentType: false,
    success: function (data) {
      $(submit).prop("disabled", false);
      $(submit).val(submitval);
      $(".alertmaster").html(data);
      $(".submitbtn").prop("disabled", false);

    }
  });
}
function viewalldatatable(path,tableid){
  //<div class=\'loader\'><div class=\'lds-ripple\'><div></div><div></div></div></div>
  $("#"+tableid).html('<div class="containercenterflex"><div class="spinner-border spinner-border-lg text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');
  $.ajax({
    url: 'views/pages/'+path,
    type: 'GET',
    success: function (data) {
      $("body").removeClass("modal-open");
      $("body").css("overflow","auto");
      $("body").css("padding-right","0px");
      $("#"+tableid).html(data);
    }
  });
}
function loadupdatemodel(uid,path,modalbody){
  $("#"+modalbody).html('<div class="containercenterflex"><div class="spinner-border spinner-border-lg text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');
  $.ajax({
      url: 'views/pages/'+path,
      type: 'GET',
      data: {
        uid: uid
      },
      success: function (data) {
        $("#"+modalbody).html(data);
      }
  });
}
function datadaterequest(path,elm){
  var datadate=$("#"+elm+" .datadate").val();
  $.ajax({
      url: 'views/'+path,
      type: 'POST',
      data:{
        datadate:datadate,
        type:elm
      },
      success: function (data) {
        $("#"+elm+" .dispdiv").html(data);
      }
  });
}
function datarequest(path,elm){
  var from=$("#"+elm+" .fromdate").val();
  var to=$("#"+elm+" .todate").val();
  $.ajax({
      url: 'views/'+path,
      type: 'POST',
      data:{
        from:from,
        to:to,
        type:elm
      },
      success: function (data) {
        $("#"+elm+" .dispdiv").html(data);
      }
  });
}
async function datarequestasync(path,elm){
  var from=$("#"+elm+" .fromdate").val();
  var to=$("#"+elm+" .todate").val();
  var result = '';
  await $.ajax({
      url: 'views/'+path,
      type: 'POST',
      data:{
        from:from,
        to:to,
        type:elm,
        async: false,
      },
      success: function (data) {
        result = data;
      }
  });
  return result;
}
function loaddata(path,modalbody){
  $("#"+modalbody).html('<div class="containercenterflex"><div class="spinner-border spinner-border-lg text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');
  $.ajax({
      url: 'views/pages/'+path,
      type: 'GET',
      success: function (data) {
        $("#"+modalbody).html(data);
      }
  });
}
function removedata(elm,path){
  $.ajax({
    url: 'views/pages/'+path,
    type: 'POST',
    data: {
      uid: $(elm).data("id")
    },
    success: function (data) {
      $(".alertmaster").html(data);
    }
  });
}
function removedatabyuid(uid,path){
  $.ajax({
    url: 'views/pages/'+path,
    type: 'POST',
    data: {
      uid: uid
    },
    success: function (data) {
      $(".alertmaster").html(data);
    }
  });
}
function uploadfiles(form,path){
  var submit=$(form).find('input[type="submit"]');
  var submitval=$(submit).val();
  $(submit).prop("disabled", true);
  if(submitval=="Upload"){
    $(submit).val("Uploading...");
  }else{
    $(submit).val("Saving...");
  }
	$.ajax({
    url: 'views/pages/'+path,
    type: 'POST',
    contentType: false,
    cache: false,
    processData:false,
    data:new FormData(form),
    success: function (data) {
      $(submit).prop("disabled", false);
      $(submit).val(submitval);
      $(".alertmaster").html(data);
    }
  });
}
function sucessPopup(msg){
  Toastify({
    text: msg,
    duration: 3000,
    close: true,
    gravity: "bottom", // `top` or `bottom`
    position: "center", // `left`, `center` or `right`
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
      background: "rgba(113, 221, 55, 0.85)",
    }
  }).showToast();
}
function errorPopup(msg){
  Toastify({
    text: msg,
    duration: 3000,
    close: true,
    gravity: "bottom", // `top` or `bottom`
    position: "center", // `left`, `center` or `right`
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
      background: "rgba(255, 62, 29, 0.85)",
    }
  }).showToast();
}

function reloadSucessPopup(msg){
  Swal.fire({
    title: 'Sucess',
    text: msg,
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = window.location.pathname;
    }
  });
  
}