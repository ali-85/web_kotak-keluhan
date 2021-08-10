$(function() {
    $('.ubahModal').on('click',function (){
        
        const id = $(this).data('id');
       
       $.ajax({
           url: 'http://localhost/keluhan/admin/getubah',
           data: {id : id},
           method: 'post',
           dataType: 'json',
           success: function(data){
               $('#id').val(data.id);
               $('#created_at').val(data.created_at);
               $('#nama').val(data.nama);
               $('#nis').val(data.nis);
               $('#krisar').val(data.krisar);
               $('#kelas').val(data.kelas);
           }
       });
    });
});