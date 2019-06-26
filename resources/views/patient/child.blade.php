@extends('layouts.app')
@section('content')
<!-- <div class="container"> -->
<!-- MAIN CONTENT -->

<style>
div.anonymous, div.end_user, div.agent, div.manager {
    display: none;
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>
  
<!-- MAIN CONTENT -->
<div class="emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-2">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt                                =""/>
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div>
                <div class="tree">
                    <ul>
                        <li>
                            <span><i class="fa fa-lg fa-history"></i> History</span>
                            <ul>
                                <li>
                                    <span class="label label-success"><i class="fa fa-lg fa-plus-circle"></i> Mon, Jan 7: 8.00 hours</span>
                                    <ul>
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 8.00</span> &ndash; <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="label label-success"><i class="fa fa-lg fa-minus-circle"></i> Tue, Jan 8: 8.00 hours</span>
                                    <ul>
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 6.00</span> &ndash; <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 2.00</span> &ndash; <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="label label-warning"><i class="fa fa-lg fa-minus-circle"></i> Wed, Jan 9: 6.00 hours</span>
                                    <ul>
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 3.00</span> &ndash; <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                    </ul>
                                <li>
                                    <span><i class="fa fa-clock-o"></i> 3.00</span> &ndash; <a href="javascript:void(0);">Appointment</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span class="label label-danger"><i class="fa fa-lg fa-minus-circle"></i> Wed, Jan 9: 4.00 hours</span>
                            <ul>
                                <li>
                                    <span><i class="fa fa-clock-o"></i> 2.00</span> &ndash; <a href="javascript:void(0);">Appointment</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <header>
                    <span class="widget-icon"> <i class="fa fa-sitemap"></i> </span>
                    <h2>Family </h2>
                </header>
                <!-- widget div-->
                <div>
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>
                    <!-- end widget edit box -->
                    <!-- widget content -->
                    <div class="widget-body">
                        <div class="tree smart-form">
                            <ul>
                                <li>
                                    <span><i class="fa fa-lg fa-folder-close"></i> Spouse</span>

                                </li>
                                <li>
                                    <span><i class="fa fa-lg fa-folder-open"></i> Children</span>
                                    <ul>		
                                        <li>
                                            <span></i> Arif Haikal</span>

                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end widget content -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-head">
                    <table class="table table-default">
                        <tr>
                            <td><p>Staff ID</p></td>
                            <td><a href="">I1001</a></td>
                            <td><p>Baby Name</p></td>
                            <td><a href="">Jasmine bt Kamal</a></td>
                        </tr>
                        <tr>
                            <td><p>Mother IC:</p></td>
                            <td><a href="">181231125162</a></td>
                            <td><p>Birth Cert ID: </p></td>
                            <td><a href="">S14123</a></td>
                        </tr>
                        <tr>
                            <td><p>Clinic</p></td>
                            <td><a href="">Klinik Kesihatan MBPJ</a></td>
                            <td><p>Date</p></td>
                            <td><a href="">02-02-2018</a></td>
                        </tr>
                        <tr>
                            <td> <p>Dependent Order</p></td>
                            <td><a href="">2</a></td>
                            <td> <p>Race</p></td>
                            <td><a href="">Malay</a></td>
                        </tr>
                        <tr>
                            <td><p>Birth Date</p></td>
                            <td> <a href="">31-12-2018</a></td>
                            <td> <p>Sex</p></td>
                            <td> <a href="">Girl</a></td>
                        </tr>
                        <tr>
                            <td>  <p>Birth Place</p></td>
                            <td><a href="">Hospital Petaling Jaya</a></td>
                            <td> <p>Birth Weight</p></td>
                            <td>  <a href="">2kg</a></td>
                        </tr>
                        <tr>
                            <td><p>Birth Type</p></td>
                            <td><a href="">Normal</a></td>
                            <td><p>Deliver by</p></td>
                            <td><a href="">Dr Atikah</a></td>
                        </tr>
                        <tr>
                            <td><p>Birth Condition</p></td>
                            <td><a href="">Normal</a></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td><p>Mother Name</p></td>
                            <td><a href="">Joyah bt Mat</a></td>
                            <td><p>Mother Job</p></td>
                            <td><a href="">IT Manager</a></td>
                        </tr>
                        <tr>
                            <td> <p>Father Name</p></td>
                            <td><a href="">Kamal bin Ismail</a></td>
                            <td><p>Father Job</p></td>
                            <td><a href="">Accountant</a></td>
                        </tr>
                        <tr>
                            <td><p>Address</p></td>
                            <td> <a href="">Seksyen 2 Petaling jaya</a></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><p>Office No</p></td>
                            <td><a href="">03-1255844</a></td>
                            <td> <p>Phone No</p></td>
                            <td> 
                                <a href="">012-3456788</a><br/> 
                                <a href="">012-3456788</a>
                            </td>
                        </tr>
                    </table>
                    <div class="col-md-4">  
                    </div>
                </div>
                <!--	
                <div class="col-md-2">
                    <input   type="button" class="btn btn-success" name="btnAddMore" value="Go to Consultation"/>
                    <br/><br/>
                    <input type="submit" class=" btn btn-warning" name="btnAddMore" value="Go to Dispensary"/>
                </div> 
                !-->
                <div class="col-md-12">
                    <div class="jarviswidget" id="c7a75e6dc6ddaac76c014f3a7bf74498" data-widget-editbutton="false">
                        <header><h2></h2></header>
                        <div>
                            <div class="jarviswidget-editbox"></div>
                            <div class="widget-body ">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs  bordered" >
                                        <li class="active"><a href="#tab1"  data-toggle="tab" rel="tooltip" data-placement="top">Laboratory</a></li>
                                    </ul><div class="tab-content padding-10" >
                                        <div class="tab-pane in active" id="tab1">
                                            <div class="form-group">
                                                <label for="inputName">Remarks </label>
                                                <input  class="form-control" id="inputName" readonly placeholder="Describe symptoms of patient " Demam, batuk, selsema />
                                            </div>
                                            <div id="tabs">
                                                <ul>
                                                    <li>
                                                        <a href="#tabs-a">Vaccination</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tabs-b">Weight Record</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tabs-c">Graph</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tabs-d">Growth and Development Value</a>
                                                    </li>
                                                </ul>
                                                <div id="tabs-a">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="inputName"></label>
                                                            <form role="form">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <table id="myTable" class=" table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th >Type of vaccine</th>
                                                                                    <th >Date</th>
                                                                                    <th >Age</th>
                                                                                    <th >Name</th>
                                                                                    <th >Type of vaccine</th>
                                                                                    <th >Date</th>
                                                                                    <th >Age</th>
                                                                                    <th >Name</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td >BCG</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                    <td >DA Semula Kedua</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;"type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td >Hepatitis B Pertama</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                    <td >MMR</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td >Hepatitis B Kedua</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                    <td >Pneumococcal Pertama</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td >Hepatitis B Ketiga</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                    <td >Pneumococcal Kedua</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td ></td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                    <td >Pneumococcal Ketiga</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td >DTPa + Hib/IPV Pertama</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                    <td >Pneumococcal Keempat</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td >DTPa + Hib/IPV Kedua</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                    <td >Semula Pertama</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td >DTPa + Hib/IPV Ketiga</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                    <td >Semula Kedua</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td >Rotavirus Pertama</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                    <td >Cacar</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td >Rotavirus Kedua</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                    <td >Periksa Parut</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td >DA Semula Pertama</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                    <td >Cacar Semula</td>
                                                                                    <td ><input type="date" ></td>
                                                                                    <td ><input style="width: 40px;" type="text" ></td>
                                                                                    <td ><input type="text" ></td>
                                                                                </tr>
                                                                            </tbody>
                                                                            <tfoot>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="clearfix"></div>
                                                            </form>
                                                        </div> 
                                                    </div>			
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="tabs-b">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <form role="form">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <table id="myTable" class=" table electro-list">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th >Date</th>
                                                                                    <th >Age</th>
                                                                                    <th >Weight</th>
                                                                                    <th >Size</th>
                                                                                    <th >Food</th>
                                                                                    <th >Advice/Note</th>
                                                                                    <th >Treatment</th>
                                                                                    <th >Next Visit</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                </tr>
                                                                                <tr>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                        <div class="col-md-1 pull-right" style="text-align: left;" >
                                                                            <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                <input type="button" class="btn btn-default"  id="addElectroTest" value="Add Row" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="clearfix"></div>
                                                            </form>
                                                        </div> 
                                                    </div>			
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="tabs-c">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="inputName">Inquery</label>
                                                            <form role="form">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <table id="myTable" class=" table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th >Date</th>
                                                                                    <th >Age</th>
                                                                                    <th >Weight</th>
                                                                                    <th >Size</th>
                                                                                    <th >Food</th>
                                                                                    <th >Advice/Note</th>
                                                                                    <th >Treatment</th>
                                                                                    <th >Next Visit</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td ></td>
                                                                                    <td ></td>
                                                                                    <td ></td>
                                                                                    <td ></td>
                                                                                    <td ></td>
                                                                                    <td ></td>
                                                                                    <td ></td>
                                                                                    <td ></td>
                                                                                </tr>
                                                                            </tbody>
                                                                            <tfoot>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="clearfix"></div>
                                                            </form>
                                                        </div> 
                                                    </div>			
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="tabs-d">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <form role="form">
                                                                <div class="form-group">
                                                                    <div style="overflow-x: scroll;" class="col-md-12">
                                                                        <table id="myTable" class=" table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th >Things</th>
                                                                                    <th >6 Weeks</th>
                                                                                    <th >3 Months</th>
                                                                                    <th >6 Months</th>
                                                                                    <th >9 Months</th>
                                                                                    <th >1 Year</th>
                                                                                    <th >2 Year</th>
                                                                                    <th >3 Year</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                
                                                                                <tr>
                                                                                    <td>Motor</td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Rooting R</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Grasp R</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            <tr>
                                                                                                <td>Moro R</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Menegakkan Kepala</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Belakang bongkok</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            <tr>
                                                                                                <td>Kaki berketul</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Kawalan kepala</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Duduk dengan pertolongan</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            <tr>
                                                                                                <td>Menelentang dan meniarap</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Duduk sendiri</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Mulai merangkak</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            <tr>
                                                                                                <td>Berdiri dengan pertolongan</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Jalan mengesut</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Berjalan dengan sebelah tangan dituntun</td>
                                                                                                <td><input type="checkbox" ></td>                                                                                               
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Pandai berjalan</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Berlari</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>    
                                                                                            <tr>
                                                                                                <td>Mulai memanjat tangga</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Cekap menggunakan kaki</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Melompat</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>    
                                                                                            <tr>
                                                                                                <td>Memanjat</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>Penglihatan</td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Mata tidak menumpukan pandangan</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Mata berkedip kedip melihat cahaya</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>    
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Mata mengikut benda bergerak</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Menetapkan penglihatan kepada benda</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Cuba mencapai permainan</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Mengikut benda jatuh</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Mengikut benda-benda yang bergerak cepat</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Melihat seperti orang dewasa</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Melihat seperti orang dewasa</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Pendengaran</td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Mata bergerak ke arah bunyi</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Memusingkan kepala ke arah bunyi</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Menentukan arah bunyi</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Menyahut panggilan nama</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Memadankan suara dengan orangnya</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Faham perkataan-perkataan senang</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Lebih faham perkataan-perkataan</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Penglihatan</td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Menangis</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td><table>
                                                                                            <tr>
                                                                                                <td>Berkukur dan memekek</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Bertutur da ba</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Meniru bunyi da da ba ba</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Menggunakan 2 atau 3 patah perkataan yang bermakna</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Menggunakan rangkaikata</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Memahami arahan-arahan senang</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Menggunakan ayat-ayat ringkas</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Menjawab soalan-soalan senang</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Adaptive</td>
                                                                                    <td><table>
                                                                                            <tr>
                                                                                                <td>Penetapan mata kemuka</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Merenung muka ibu</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Menggenggam benda</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Melepaskan benda bila diberi yang lain</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Memadankan kiub-kiub</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Menggunakan jari telunjuk</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Pandai menggunakan ibu jari dan jari telunjuk</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Mengisikan benda</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Mencampakkan benda</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Membina menara dengan 6 kiub</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Menyingkap muka surat satu persatu</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Menunjuk kepada gambar</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Membina menara dengan 10 kiub</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Memadankan warna-warna</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kelakuan</td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Menangis</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Senyum</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Menghisap ibu jari</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Minat dalam keadaan sekeliling</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Meradang</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Ketawa</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Memilih makanan</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Melambai-lambai</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Bermain</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Patuh kepada perkataan Jangan</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td><table>
                                                                                            <tr>
                                                                                                <td>Bekerjasama apabila dipakaikan pakaian</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Beramah mesra</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Berdikari</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Mengawal buang air besar atau kecil</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Mementingkan diri</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Mulai bercampur gaul</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Pandai mengatur buang air besar dan kecil</td>
                                                                                                <td><input type="checkbox" ></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kecatatan</td>
                                                                                    <td><input type="text" ></td>
                                                                                    <td><input type="text" ></td>
                                                                                    <td><input type="text" ></td>
                                                                                    <td><input type="text" ></td>
                                                                                    <td><input type="text" ></td>
                                                                                    <td><input type="text" ></td>
                                                                                    <td><input type="text" ></td>
                                                                                </tr>
                                                                            </tbody>
                                                                            <tfoot>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="clearfix"></div>
                                                            </form>
                                                        </div> 
                                                    </div>			
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <hr class="simple" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
<br/>
<br/>
<!--Modal -->
<div class="modal fade" id="genModel1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Generate </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="form-group">
                    <div class="row smart-form">


                        <table id="myTable" class=" table order-list">
                            <thead>
                                <tr>
                                    <td class="col-md-2">Name</td>

                                    <td class="col-md-2">Sex</td>

                                    <td class="col-md-3">IC Number/Passport</td>
                                    <td class="col-md-1">Action</td>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>

                                </tr>
                                <tr>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="col-md-1 pull-right" style="text-align: left;" >
                            <input type="button" class="btn btn-default"  id="addrow" value="Add Row" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="labForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Remarks</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>

            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">

                    <div class="form-group " align="right">
                        <div class="col-md-8 ">

                        </div>

                        <div class="col-md-12 ">


                            <textarea type="text" class="form-control" id="inputName" placeholder="Describe symptoms of patient "></textarea></div>

                    </div>


            </div>
            <div class="clearfix"></div>




            <div class="clearfix"></div>


            </form>
            <br/>
            <br/>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
            </div>
        </div>
    </div>
</div>

<!-- PAGE RELATED PLUGIN(S)--> 
<script type="text/javascript">
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    $(document).ready(function () {
        var counter = 0;
        $("#addrow").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
            cols += '<td><input type="text" class="form-control" id="select-country" name="drug' + counter + '" list="listCountry"/><datalist id="listCountry"><option>Paracetamol 120 mg/5 ml Syrup*(10)(10/22)</option><option>Albendazole 200 mg/5 ml Suspension(200)(12/23)</option><option>Acriflavin 0.1% Lotion(100)(9/21)</option></datalist></td>';
            cols += '<td><select type="text" class="form-control" name="quantity' + counter + '">  <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="note' + counter + '"/></td>';
            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            counter++;
        });

        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });

        //add blood test
        var counter = 0;

        $("#addBloodTest").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
            cols += '<td><span id="incre"></span></td>';
            cols += '<td><input type="date" name="day' + counter + '"></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="note' + counter + '"/></td>';
            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.blood-list").append(newRow);
            counter++;
        });

        $("table.blood-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });

        //add electro test
        var counter = 0;

        $("#addElectroTest").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
            cols += '<td><input  type="date" name="day' + counter + '"></td>';
            cols += '<td><input style="width: 50px;" type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input style="width: 50px;" type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input style="width: 50px;" type="text" class="form-control" name="note' + counter + '"/></td>';
            cols += '<td><input style="width: 110px;" type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input style="width: 130px;" type="text" class="form-control" name="note' + counter + '"/></td>';
            cols += '<td><input style="width: 130px;" type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input  type="date"  name="note' + counter + '"/></td>';
            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.electro-list").append(newRow);
            counter++;
        });

        $("table.electro-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });

        //add FBS test
        var counter = 0;

        $("#addFBSTest").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
            cols += '<td><span id="incre"></span></td>';
            cols += '<td><input type="date" name="day' + counter + '"></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.FBS-list").append(newRow);
            counter++;
        });

        $("table.FBS-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });

        //add lipids test
        var counter = 0;

        $("#addLipidsTest").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";

            //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
            cols += '<td><span id="incre"></span></td>';
            cols += '<td><input type="date" name="day' + counter + '"></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.lipids-list").append(newRow);
            counter++;
        });

        $("table.lipids-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });

        //add renal test
        var counter = 0;
        $("#addRenalTest").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
            cols += '<td><span id="incre"></span></td>';
            cols += '<td><input type="date" name="day' + counter + '"></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.renal-list").append(newRow);
            counter++;
        });

        $("table.renal-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });

        //add ultra test
        var counter = 0;

        $("#addUltraTest").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
            cols += '<td><span id="incre"></span></td>';
            cols += '<td><input type="date" name="day' + counter + '"></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.ultra-list").append(newRow);
            counter++;
        });

        $("table.ultra-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });
        // reference: http://www.chartjs.org/docs/
        $('#modChart').on('shown.bs.modal', function (event) {
            var link = $(event.relatedTarget);
            // get data source
            var source = link.attr('data-source').split(',');
            // get title
            var title = link.html();
            // get labels
            var table = link.parents('table');
            var labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

            $('#' + table.attr('id') + '>thead>tr>th').each(function (index, value) {
                // without first column
                if (index > 0) {
                    labels.push($(value).html());
                }
            });
            // get target source
            var target = [];
            $.each(labels, function (index, value) {
                target.push(link.attr('data-target-source'));
            });
            // Chart initialisieren
            var modal = $(this);
            var canvas = modal.find('.modal-body canvas');
            modal.find('.modal-title').html(title);
            var ctx = canvas[0].getContext("2d");
            var chart = new Chart(ctx).Line({
                responsive: true,
                labels: labels,
                datasets: [{
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: source
                    }, {
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "#F7464A",
                        pointColor: "#FF5A5E",
                        pointStrokeColor: "#FF5A5E",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "red",
                        data: target
                    }]
            }, {});
        }).on('hidden.bs.modal', function (event) {
            // reset canvas size
            var modal = $(this);
            var canvas = modal.find('.modal-body canvas');
            canvas.attr('width', '568px').attr('height', '300px');
            // destroy modal
            $(this).data('bs.modal', null);
        });

        $('.box-item').draggable({
            cursor: 'move',
            helper: "clone"
        });
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        $("#container1").droppable({
            drop: function (event, ui) {
                var itemid = $(event.originalEvent.toElement).attr("itemid");
                $('.box-item').each(function () {
                    if ($(this).attr("itemid") === itemid) {
                        $(this).appendTo("#container1");
                    }
                });
            }
        });

        $("#container2").droppable({
            drop: function (event, ui) {
                var itemid = $(event.originalEvent.toElement).attr("itemid");
                $('.box-item').each(function () {
                    if ($(this).attr("itemid") === itemid) {
                        $(this).appendTo("#container2");
                    }
                });
            }
        });

        pageSetUp();
        "use strict";
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var hdr = {
            left: 'title',
            center: 'month,agendaWeek,agendaDay',
            right: 'prev,today,next'
        };

        var initDrag = function (e) {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim(e.children().text()), // use the element's text as the event title
                description: $.trim(e.children('span').attr('data-description')),
                icon: $.trim(e.children('span').attr('data-icon')),
                className: $.trim(e.children('span').attr('class')) // use the element's children as the event class
            };
            // store the Event Object in the DOM element so we can get to it later
            e.data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            e.draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            });
        };

        var addEvent = function (title, priority, description, icon) {
            title = title.length === 0 ? "Untitled Event" : title;
            description = description.length === 0 ? "No Description" : description;
            icon = icon.length === 0 ? " " : icon;
            priority = priority.length === 0 ? "label label-default" : priority;
            var html = $('<li><span class="' + priority + '" data-description="' + description + '" data-icon="' + icon + '">' + title + '</span></li>').prependTo('ul#external-events').hide().fadeIn();
            $("#event-container").effect("highlight", 800);
            initDrag(html);
        };

        $('#external-events > li').each(function () {
            initDrag($(this));
        });

        $('#add-event').click(function () {
            var title = $('#title').val(),
                    priority = $('input:radio[name=priority]:checked').val(),
                    description = $('#description').val(),
                    icon = $('input:radio[name=iconselect]:checked').val();
            addEvent(title, priority, description, icon);
        });

        /* initialize the calendar
         -----------------------------------------------------------------*/

        $('#calendar').fullCalendar({
            header: hdr,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function (date, allDay) { // this function is called when something is dropped
                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');
                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);
                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }

            },
            select: function (start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.fullCalendar('renderEvent', {
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay
                    }, true // make the event "stick"
                            );
                }
                calendar.fullCalendar('unselect');
            },
            events: [{
                    title: 'All Day Event',
                    start: new Date(y, m, 1),
                    description: 'long description',
                    className: ["event", "bg-color-greenLight"],
                    icon: 'fa-check'
                }, {
                    title: 'Long Event',
                    start: new Date(y, m, d - 5),
                    end: new Date(y, m, d - 2),
                    className: ["event", "bg-color-red"],
                    icon: 'fa-lock'
                }, {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d - 3, 16, 0),
                    allDay: false,
                    className: ["event", "bg-color-blue"],
                    icon: 'fa-clock-o'
                }, {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d + 4, 16, 0),
                    allDay: false,
                    className: ["event", "bg-color-blue"],
                    icon: 'fa-clock-o'
                }, {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false,
                    className: ["event", "bg-color-darken"]
                }, {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false,
                    className: ["event", "bg-color-darken"]
                }, {
                    title: 'Birthday Party',
                    start: new Date(y, m, d + 1, 19, 0),
                    end: new Date(y, m, d + 1, 22, 30),
                    allDay: false,
                    className: ["event", "bg-color-darken"]
                }, {
                    title: 'Smartadmin Open Day',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    className: ["event", "bg-color-darken"]
                }],
            eventRender: function (event, element, icon) {
                if (!event.description == "") {
                    element.find('.fc-title').append("<br/><span class='ultra-light'>" + event.description +
                            "</span>");
                }
                if (!event.icon == "") {
                    element.find('.fc-title').append("<i class='air air-top-right fa " + event.icon +
                            " '></i>");
                }
            },
            windowResize: function (event, ui) {
                $('#calendar').fullCalendar('render');
            }
        });

        /* hide default buttons */
        $('.fc-right, .fc-center').hide();

        $('#calendar-buttons #btn-prev').click(function () {
            $('.fc-prev-button').click();
            return false;
        });

        $('#calendar-buttons #btn-next').click(function () {
            $('.fc-next-button').click();
            return false;
        });

        $('#calendar-buttons #btn-today').click(function () {
            $('.fc-today-button').click();
            return false;
        });

        $('#mt').click(function () {
            $('#calendar').fullCalendar('changeView', 'month');
        });

        $('#ag').click(function () {
            $('#calendar').fullCalendar('changeView', 'agendaWeek');
        });

        $('#td').click(function () {
            $('#calendar').fullCalendar('changeView', 'agendaDay');
        });
        $('.selectpicker').selectpicker();
    })
    $(document).ready(function () {
        $('.tree > ul').attr('role', 'tree').find('ul').attr('role', 'group');
        $('.tree').find('li:has(ul)').addClass('parent_li').attr('role', 'treeitem').find(' > span').attr('title', 'Collapse this branch').on('click', function (e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(':visible')) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i').removeClass().addClass('fa fa-lg fa-plus-circle');
            } else {
                children.show('fast');
                $(this).attr('title', 'Collapse this branch').find(' > i').removeClass().addClass('fa fa-lg fa-minus-circle');
            }
            e.stopPropagation();
        });
    })

    $('#tabs').tabs();
    $('#tabs2').tabs();
</script>
    
@endsection
