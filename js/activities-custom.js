
var base_url = document.getElementById('base_url').value;

 $(document).ready(function(){
 
    $('#peopleModal .btn-go').click(function(){
      var input = $('#people-search').val(); 
      var tbody = $('#peopleModal table tbody');

      tbody.html('<tr><td colspan="4" align="center">Retrieving data....</td></tr>');

      $.ajax({
        url: base_url + "/people/ajax-search",
        method: 'POST',
        data: {
          '_token' : $('input[name="_token"]').val(),
          'input'  : input
        },
        success: function(result){    
          var mytr = '';
          if(result.length > 0){ 
            for(var x=0; x < result.length; x++){
              mytr += '<tr>'
              mytr += '<td>' + result[x].id + '</td>';
              mytr += '<td>' + result[x].firstname + '</td>';
              mytr += '<td>' + result[x].lastname + '</td>';
              mytr += '<td><button data-birthday="'+ result[x].birthday +'" data-address="'+ result[x].address +'" data-contact="'+ result[x].contact +'" data-spouse="' + result[x].spouse+'" data-id="' + result[x].id  +
                      '" data-person="'+ result[x].firstname + ' ' + result[x].lastname + 
                      '" class="btn btn-xs btn-primary selectStudent">Select</button></td>'
              mytr += '</tr>';
            }
          }
          else{
            mytr += '<tr><td colspan="6">No Record found</td></tr>';
          }
          tbody.html(mytr);
        }
      });
    }); 
});

/* We need to call this event before or after AJAX call
 * Walley kaayu. :D
*/
 $(document).on("click", ".selectStudent", function(){

    var persid  = $(this).data('id'); 
    var person  = $(this).data('person'); 
    var birthday = $(this).data('birthday'); 
    var address  = $(this).data('address'); 
    var contact  = $(this).data('contact'); 
    var spouse   = $(this).data('spouse'); 
 
    $('#person').val(person);
    $('#persid').val(persid);
    $('#peopleModal').modal('toggle');

    $table = "<h5>Details</h5><table class='table'>" + 
              "<tr><td class='active' width='100px'>Birthday</td><td>" + birthday +
                   "</td><td class='active'>Contact</td><td>" + contact + "</td></tr>"+
              "<tr><td class='active'>Spouse</td><td>" + spouse +
                   "</td><td class='active'>Address</td><td>" + address + "</td></tr>"+
              "</table>";
    $('.jumbotron').html($table);
    return false;
 });

$(function(){
  $('.btn-delete').click(function(){
    var data = $(this).data('src');
    if(confirm('You are going to delete this record '+ data +', are you sure?')){
      return true;
    }
    return false;
  });
});
 


function printFunc() {
    var divToPrint = document.getElementById('printarea');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' + 
        'padding:0.5em;' +
        'border-collapse: collapse;' + 
        'border: 1px solid #888;' + 
        '}' +
        '.edit{ display:none; }' +
        'table{ width :100%; border-collapse: collapse; border-spacing: 0; }' +
        'table th{ background:#dee2e6 !important; }' +   
        'ul li { list-style:none; float:left; margin-left:10px; }' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write("<h4>People Report</h4>");
    newWin.document.write(htmlToPrint);
   newWin.print();
   newWin.close();
}