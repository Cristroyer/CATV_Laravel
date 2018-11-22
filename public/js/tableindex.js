/*<script src="{{ asset('js/tableindex.js') }}" defer></script> 


function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
*/

$(document).ready( function () {
  $('#myTable').DataTable( {
        /*"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 5 ).footer() ).html(
                pageTotal +' ( '+ total +' total)'
            );
        }*/
    
    /*{
      "serverSide": true,
      "ajax": "{{--url('api/userPoints')--}}",
      "columns": [
        {data: 'cod'},
        {data: 'day'},
        {data: 'month'},
        {data: 'year'},
        {data: 'productive_day'},
        {data: 'special_productive'},
      ]
    }*/
  });
    // Setup - add a text input to each footer cell
  $('#myTable tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" class="form-control" placeholder="Buscar"/>' );
  });
 
  // DataTable
  var table = $('#myTable').DataTable();
 
  // Apply the search
  table.columns().every( function () {
    var that = this;
    $( 'input', this.footer() ).on( 'keyup change', function () {
      if ( that.search() !== this.value ) {
        that
        .search( this.value )
        .draw();
      }
    });
  });
  $('#myTable tfoot tr').appendTo('#myTable thead');
});

