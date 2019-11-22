<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
  <body>
  	<div id ='app'>
  	<h1><center>INVENTORY</center></h1>
  	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left: 90%;">Add Item</button>
  	<table class="table table-striped table-dark">
  	<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  	</thead>
    <tbody>
      <td>
        @{{ inventory.id }}
      </td>
       <td>
        @{{ inventory.name }}
      </td>
      <td>
        @{{ inventory.quantity }}
      </td>
      <td>
        @{{ inventory.category }}
      </td>
    </tbody>
	</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="number" class="form-control" name="quantity">
          </div>
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category">
            	<option></option>
            	<option value="Equipment">Equipment</option>
            	<option value="Utensil">Utensil</option>
          </div>
      </select>
      </div>
      	<div class="modal-footer">
      	 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      	</div>
		</form>
  </body>
  	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  	<script>
  		var inventories = @json($inventories);
  		var vm = new Vue({
			el:'#app',
			data:{
				inventories:inventories,
				new_item:{
					id: 1,
					name: '',
					quantity: 1,
					category:''
				}
			},
			computed:{
				methods: {
				postNewItem() {
					axios.post('/inventory', this.new_item)
						.then(({data})=>{
							this.inventories.push(data);
							this.new_item.name = '';
              this.new_item.category = '';
							console.log(data);
						});
				}
			}
    }
		});
	</script>
</html>