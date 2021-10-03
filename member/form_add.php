<form action="" method="POST"   name="add" class="form-horizontal" id="add">
  <div class="form-group">
    <div class="col-sm-2" align="right"></div>
    <div class="col-sm-5" align="left"> <h3><i class="fas fa-user"></i> FORM ADD </h3> <hr/></div>
  </div>
  <div class="form-group">
    <div class="col-sm-1" align="right"> </div>
    <div class="col-sm-2" align="left">
      <b> คำนำชื่อ</b>
      <select name="emp_mtitle" class="form-control">
        <option value="">-เลือกข้อมูล-</option>
        <option value="นาย">นาย</option>
        <option value="นาง">นาง</option>
        <option value="นางสาว">นางสาว</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-1" align="right"> </div>
    <div class="col-sm-5" align="left">
      <b> ชื่อ</b>
      <input  name="emp_name" type="text" required class="form-control"  placeholder="ชื่อ "    minlength="2" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-1" align="right"> </div>
    <div class="col-sm-5" align="left">
      <b> นามสกุล</b>
      <input  name="emp_lastname" type="text" required class="form-control"   minlength="2" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-1" align="right">  </div>
    <div class="col-sm-7" align="left">
      <b>อีเมล์ </b>
      <input  name="emp_email" type="email"  class="form-control" required />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-1" align="right"> </div>
    <div class="col-sm-7" align="left">
      <b> เบอร์โทร</b>
      <input  name="emp_tel" type="text" required class="form-control"  placeholder="เบอร์โทร"   minlength="2" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-1" align="right">   </div>
    <div class="col-sm-4" align="left">
      <b> Username</b>
      <input  name="emp_username" type="text" required class="form-control"  minlength="2"/>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-1" align="right"> </div>
    <div class="col-sm-4" align="left">
      <b> Password </b>
      <input  name="emp_password" type="password" required class="form-control"  minlength="2" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-1"> </div>
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary" id="btn">เพิ่มข้อมูล
      </button>
    </div>
  </div>
</form>