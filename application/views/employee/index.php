 <div id="head"></div>
  <form action="#">
    <div class="form-group">
      <input type="hidden" class="form-control" id="id" name="id" >
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
     <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter password" name="phone">
    </div>
     <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" placeholder="Enter password" name="address">
    </div>
    <button type="button" id="add_employee" class="btn btn-default">Submit</button>
    <button type="button" id="update_employee" class="btn btn-default">Update</button>

  </form>
  <div id="table_data"></div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#update_employee').hide();
    $('#head').html('<h1>Add</h1>');

    all_employee();
      function all_employee(){
        $.ajax({
          type:'post',
          url:'<?php echo base_url();?>index.php/Employee/all_employee',
          success:function(data){
            var html = '<table class="table"><thead><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Action</th></thead><tbody>';
            var data = JSON.parse(data);

            for(i = 0;i<data.length;i++){
               html =html+'<tr><td>'+data[i].name+'</td><td>'+data[i].email+'</td><td>'+data[i].phone_number+'</td><td>'+data[i].address+'</td><td><button id="editData" value='+data[i].id+'>Edit</button><button class="delete_employee" value='+data[i].id+'>Delete</button></td></tr>';
            }
            $("#table_data").html(html+'</tbody></table>');
          }
        });
      }

      $("#add_employee").click(function(e){
        e.preventDefault();
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();

        $.ajax({
          type:"post",
          url:"<?php echo base_url() ?>index.php/Employee/add_employee",
          data:{name:name,email:email,phone:phone,address:address},
          success:function(data){
            if(data =='1'){
              all_employee();
              $('form :input').val('');
            }else{
              all_employee();
              $('form :input').val('');
            }
          }
        });
      });


      $("#update_employee").click(function(e){
        e.preventDefault();
        var id=$("#id").val();
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();

        $.ajax({
          type:"post",
          url:"<?php echo base_url() ?>index.php/Employee/update_employee",
          data:{id:id,name:name,email:email,phone:phone,address:address},
          success:function(data){
            if(data =='1'){
              all_employee();
              $('form :input').val('');
            }else{
              all_employee();
              $('form :input').val('');
            }
          }
        });
      });

      $("body").on("click","#editData",function(e){
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
          type:"post",
          url:"<?php echo base_url() ?>index.php/Employee/edit_Employee",
          data:{employee_id:id},
          success:function(data){
            var data = JSON.parse(data);
            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#email").val(data.email);
            $("#phone").val(data.phone_number);
            $("#address").val(data.address);
            $('#update_employee').show();
            $('#add_employee').hide();
            $('#head').html('<h1>Update</h1>');
          }
        });
      });



      $("body").on("click",".delete_employee",function(e){
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
          type:"post",
          url:"<?php echo base_url() ?>index.php/Employee/delete_employee",
          data:{employee_id:id},
          success:function(data){
            if(data == '1'){
              all_employee();
            }else{
              all_employee();
            }
          }
        });
      });
  });
</script>
