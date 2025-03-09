<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Nisway</h1>
  <p>Import customer detail using xml file</p> 
</div>
  
<div class="container">
  <h2>Customer Details</h2>
  <div style="float:right;margin-right:2px;">
        <form id="importForm" enctype="multipart/form-data">
            <input type="file" name="xmlfile" required>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>
    </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <? if(count($data)>0)        
            echo $data;
           else {?> 
            <td colspan="4">No record found</td>
           <?}?>
   </tbody>
  </table>
</div>

<!-- Edit Contact Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editModalLabel">Edit Contact</h4>
      </div>
      <div class="modal-body">
        <form id="editForm">
          <input type="hidden" id="editId">
          <div class="form-group">
            <label for="editName">Name</label>
            <input type="text" class="form-control" id="editName" required>
          </div>
          <div class="form-group">
            <label for="editPhone">Phone</label>
            <input type="text" class="form-control" id="editPhone" required>
          </div>
          <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script src="js/niswey.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
