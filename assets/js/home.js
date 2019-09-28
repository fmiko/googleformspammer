function delay(ms) {

  var cur_d = new Date();
  var cur_ticks = cur_d.getTime();
  var ms_passed = 0;
  while(ms_passed < ms) {

    var d = new Date();
    var ticks = d.getTime();
    ms_passed = ticks - cur_ticks;
  }
}

function add_f(n) {

  var str="<div class='form-group' id='id"+n+"'><label for='entry"+n+"'>Input "+n+"</label><input type='text' class='form-control' id='entry"+n+"' name='entry"+n+"' placeholder='entry.xxx'><input type='text' class='form-control' id='text"+n+"' name='text"+n+"' placeholder='Value'></div>"

  $('#input').append(str);

  var m = n+1;
  str = "<button onclick='add_f("+m+");' type='button' class='btn btn-success'>Add Input Field</button><button onclick='remove_f("+n+");' type='button' class='btn btn-warning'>Remove Input Field</button><br><br>";
  $('#buttons1').html("");
  $('#buttons1').append(str);

  str="<button type='submit' onclick='req("+n+"); return false;' class='btn btn-info'>Submit</button>";
  $('#buttons2').html("");
  $('#buttons2').append(str);
}

function remove_f(n) {

  if(n<=1)
  return;
  var str="#id"+n;
  $(str).remove();

  var m = n-1;
  str = "<button onclick='add_f("+n+");' type='button' class='btn btn-success'>Add Input Field</button><button onclick='remove_f("+m+");' type='button' class='btn btn-warning'>Remove Input Field</button><br><br>";
  $('#buttons1').html("");
  $('#buttons1').append(str);

  str="<button type='submit' onclick='req("+m+"); return false;' class='btn btn-info'>Submit</button>";
  $('#buttons2').html("");
  $('#buttons2').append(str);
}

function req(n) {

  var da = {
  };

  var entry= "";
  var value = "";
  //alert(JSON.stringify(da, null, 4));
  for(var i=1;i<=n;i++) {
    str1 = '#entry' + i;
    str2 = '#text' + i;

    val1 = $(str1).val();
    val2 = $(str2).val();

    if(i == 1) {
      entry += val1;
      value += val2;
    }
    else {
      entry = entry + "|" + val1;
      value = value + "|" + val2;
    }

    da[val1] = val2;
  }

  var total = $('#sub').val();
  var url = $('#url').val();

  var da1 = {};
  da1['url'] = url;
  da1['number'] = n;
  da1['submissions'] = total;
  da1['entry'] = entry;
  da1['value'] = value;


  for(var i=0; i<total; i=i+1) {
    $.ajax({
      url: "https://docs.google.com/forms/"+url+"/formResponse",
      type: "post",
      data: da,
      success: function(data) {
      }
    });
  }

  $('#myModal').modal('show');
  $('#modalbody').html("");
  $("#modalbody").append("<p>Total Submissions : " + total + " </p>");
  var per = 100;
  $("#modalbody").append("<p><pre>Done!</p></pre>");
  $("#modalbody").append('<div class="progress"><div class="progress-bar progress-bar-animated progress-bar-striped bg-info" role="progressbar" style="width: '+ per +'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div></div>');


}
