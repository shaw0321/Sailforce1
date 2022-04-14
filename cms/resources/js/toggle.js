 $(function() { 
       
           $('.toggle-class').change(function() { 
               console.log('works');

           var status = $(this).prop('checked') == true ? 1 : 0;  
           var followed_id = $(this).data('id');  
           $.ajax({ 
    
               type: "POST", 
               dataType: "json", 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
               url: '/user/follow', 
               data: {'status': status, 'followed_id': followed_id}, 
               success: function(data){ 
               console.log(data) 
            } 
         }); 
      }) 
   }); 


