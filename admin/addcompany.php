<div>
  <h3>Add Comapy <small>Form</small></h3>
  <form>
    <div class="row">
      <div class="form-group col">
        <label>Company Reg No</label>
        <input type="text" name="regNo" class="form-control" placeholder="Comapy Reg Number">
      </div>

      <div class="form-group col">
        <label>KRA Pin</label>
        <input type="text" name="kra" class="form-control" placeholder="Comapy KRA Pin">
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <label>Company Name</label>
        <input type="text" name="cname" class="form-control" placeholder="Comapy Name">
      </div>

      <div class="form-group col">
        <label>Company E-Mail</label>
        <input type="text" name="cemail" class="form-control" placeholder="Comapy E-Mail">
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <label>Company Phone</label>
        <input type="text" name="cphone" class="form-control" placeholder="Comapy Phone Number">
      </div>

      <div class="form-group col">
         <label>Company Category</label>
        <select name="ccategory" class="form-control">
          <option value="y">Youth</option>
          <option value="yw">Youth and Women</option>
          <option value="m">Minorities</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <input type="submit" name="saveCompany" value="Save Company" class="btn btn-success">
      </div>
    </div>
  </form>
</div>

<!-- view all companies -->
<div class="margin-top-50">
  <table class="table table-sm table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Company</th>
        <th scope="col">Reg Number</th>
        <th scope="col">Category</th>
        <th scope="col">Email</th>
        <th scope="col">Added Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Delink Inc</td>
        <td>DLNK/T/04-02-2018</td>
        <td>Youth and Women</td>
        <td>info@delink.com</td>
        <td>04 July 2011</td>
        <td>
          <a href="#" class="btn btn-sm btn-primary">Edit</a>
          <a href="#" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
    </tbody>
  </table>  
</div>
