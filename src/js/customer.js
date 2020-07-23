$(document).ready(function() {

    $('.modal-dialog .close').on('click', function() {
      $(this).closest('.modal-dialog').hide();
    });

    $('.modal-dialog form').on('submit', function() {
      var form = $(this);
      $.ajax({
		    	url: form.attr('action'),
		    	type: form.attr('method'),
		    	data : form.serialize(),
		    	cache: false,
		    	context: document.getElementById("fw-list")  // valore di this nella response
		  }).done(function(response,status,obj) {
        $(this).DataTable().row.add(JSON.parse(response.data)).draw();
          form[0].reset();
          form.closest('.modal-dialog').hide();
      }).fail(function(jqXHR, textStatus, errorThrown) {
        alert("fail");
		    	//		   $(this).empty().append('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&#x2717;</span></button><strong>Sorry but there was an error: (' + textStatus + ') ' + errorThrown + '</strong></div>');
		    	//	        removeAlert();
      });
      return false;
    });

    table = $('#fw-list').DataTable( {
      dom: 'Bfrtip',
      ajax: {
        "url": "/firewall.php",
        "type": "GET"
      },
      columns: [
            { "data": "Id" },
            { "data": "Action" },
            { "data": "Source IP" },
            { "data": "Source Port" },
            { "data": "Destination IP" },
            { "data": "Destination Port" }
        ],
      select: true,
      buttons: [
            {
                text: 'Delete',
                action: function ( e, dt, node, config ) {
                  rows = table.row('.selected').data();
                  $.ajax({
                    url: '/firewall.php?id=' + rows.Id,
                    type: 'DELETE',
                    context: $('#fw-list'),
                    success: function(result) {
                      $(this).DataTable().row('.selected').remove().draw( false );
                    }
                  });
                }
            },
            {
                text: 'Add',
                action: function(e,dt,node,config) {
                  $('#add-fw').show();
                }
            },
            {
                text: 'Modify',
                action: function(e,dt,node,config) {
                  rows = table.row('.selected').data();
                  key = Object.keys(rows);
                  key.forEach(function(k) {
                    input_name = k.toLowerCase().replace(/\s/g, "");
                    $('#add-fw input[name='+input_name+']').value(rows+'.'+key);
                  });
                  $('#add-fw').show();
                }
            }
        ]
    } );
    $('#fw-list tbody').on( 'click', 'tr', function () {
      if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
      }
      else {
        table.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
      }
    } );

} );
