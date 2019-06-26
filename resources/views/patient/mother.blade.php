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
        <div class="col-md-10">
            <div class="profile-head">
                <div class="col-md-10">  
                    <table class="table table-default">
                        <tr>
                            <td><p>Mother IC:</p></td>
                            <td colspan="3"><a href="">181231125162</a></td>
                        </tr>
                        <tr>
                            <td><p>Clinic</p></td>
                            <td><a href="">Klinik Kesihatan MBPJ</a></td>
                            <td><p>Date</p></td>
                            <td><a href="">02-02-2018</a></td>
                        </tr>
                        <tr>
                            <td><p>Name</p></td>
                            <td><a href="">Joyah bt Mat</a></td>
                            <td><p>Race</p></td>
                            <td><a href="">Malay</a></td>
                        </tr>
                        <tr>
                            <td><p>Birth Date</p></td>
                            <td><a href="">1-11-1993</a></td>
                            <td><p>Job</p></td>
                            <td><a href="">IT Manager</a></td>
                        </tr>
                        <tr>
                            <td>  <p>Address</p></td>
                            <td colspan="3"><a href="">Seksyen 2 Petaling jaya</a></td>
                        </tr>
                        <tr>
                            <td> <p>Husband Name</p></td>
                            <td><a href="">Kamal bin Ismail</a></td>
                            <td><p>Husband Job</p></td>
                            <td><a href="">Accountant</a></td>
                        </tr>
                        <tr>
                            <td> <p>Marrige Date</p></td>
                            <td><a href="">18-1-2018</a></td>
                            <td><p>Phone No</p></td>
                            <td><a href="">012-3456788</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!--	
            <div class="col-md-2">
                <input   type="button" class="btn btn-success" name="btnAddMore" value="Go to Consultation"/><br/><br/>
                <input type="submit" class=" btn btn-warning" name="btnAddMore" value="Go to Dispensary"/>
            </div> 
            -->
            <div class="col-md-12">
                <div class="jarviswidget" id="9ddf89c2f51d0b83fccd961330a28944" data-widget-editbutton="false">
                    <header><h2></h2></header>
                    <div>
                        <div class="jarviswidget-editbox"></div>
                        <div class="widget-body ">
                            <div class="tabbable">
                                <ul class="nav nav-tabs  bordered" >
                                    <li class="active">
                                        <a href="#tab1"  data-toggle="tab" rel="tooltip" data-placement="top">Laboratory</a>
                                    </li>
                                </ul>
                                <div class="tab-content padding-10" >
                                    <div class="tab-pane in active" id="tab1">
                                        <div class="form-group">
                                            <label for="inputName">Remarks </label>
                                            <input  class="form-control" id="inputName" readonly placeholder="Describe symptoms of patient " Demam, batuk, selsema />
                                        </div>
                                        <div id="tabs">
                                            <ul>
                                                <li>
                                                    <a href="#tabs-a">Pregnancy History</a>
                                                </li>
                                                <li>
                                                    <a href="#tabs-b">Check up</a>
                                                </li>
                                                <li>
                                                    <a href="#tabs-c">Natal Record</a>
                                                </li>
                                            </ul>
                                            <div id="tabs-a">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <strong>About Past Pregnancy</strong>
                                                        <form role="form">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <table id="myTable" class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th >No</th>
                                                                                <th >Pregnancy Result</th>
                                                                                <th >Year</th>
                                                                                <th >Place/Midwife</th>
                                                                                <th >Baby"s sex</th>
                                                                                <th >Complication</th>
                                                                                <th >Condition Now</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td ><input style="width: 20px;" type="text" ></td>
                                                                                <td ><input style="width: 110px;"type="text" ></td>
                                                                                <td ><input style="width: 130px;"type="date" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td ><input style="width: 20px;" type="text" ></td>
                                                                                <td ><input style="width: 110px;"type="text" ></td>
                                                                                <td ><input style="width: 130px;"type="date" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                            </tr>	
                                                                            <tr>
                                                                                <td ><input style="width: 20px;" type="text" ></td>
                                                                                <td ><input style="width: 110px;"type="text" ></td>
                                                                                <td ><input style="width: 130px;"type="date" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input type="text" ></td>

                                                                            </tr>	
                                                                            <tr>
                                                                                <td ><input style="width: 20px;" type="text" ></td>
                                                                                <td ><input style="width: 110px;"type="text" ></td>
                                                                                <td ><input style="width: 130px;"type="date" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                            </tr>	
                                                                            <tr>
                                                                                <td ><input style="width: 20px;" type="text" ></td>
                                                                                <td ><input style="width: 110px;"type="text" ></td>
                                                                                <td ><input style="width: 130px;"type="date" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                            </tr>	
                                                                            <tr>
                                                                                <td ><input style="width: 20px;" type="text" ></td>
                                                                                <td ><input style="width: 110px;"type="text" ></td>
                                                                                <td ><input style="width: 130px;"type="date" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                            </tr>	
                                                                            <tr>
                                                                                <td >1.</td>
                                                                                <td >Blood Check</td>
                                                                                <td ><input style="width: 130px;"type="date" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td >1. VORL <br> 2.GROUPHING</td>
                                                                                <td ><input type="text" ></td>

                                                                            </tr>	
                                                                            <tr>
                                                                                <td ><input style="width: 20px;" type="text" ></td>
                                                                                <td ><input style="width: 110px;"type="text" ></td>
                                                                                <td ><input style="width: 130px;"type="date" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input type="text" ></td>

                                                                            </tr>	
                                                                            <tr>
                                                                                <td >2.</td>
                                                                                <td >ATT Injection 0.5ml</td>
                                                                                <td ><input style="width: 130px;"type="date" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td>
                                                                                    1.<input type="text" ><br>
                                                                                    2.<input type="text" >
                                                                                </td>
                                                                                <td ><input type="text" ></td>
                                                                            </tr>	
                                                                            <tr>
                                                                                <td ><input style="width: 20px;" type="text" ></td>
                                                                                <td ><input style="width: 110px;"type="text" ></td>
                                                                                <td ><input style="width: 130px;"type="date" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td ><input style="width: 20px;" type="text" ></td>
                                                                                <td ><input style="width: 110px;"type="text" ></td>
                                                                                <td ><input style="width: 130px;"type="date" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                                <td ><input type="text" ></td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        </tfoot>
                                                                    </table>
                                                                    <label>Past Family Planning: <input type="text" style="width: 500px;"> </label></br>
                                                                    <strong>About Past Health</strong>
                                                                    <table id="myTable" class=" table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th></th>
                                                                                <th >TB</th>
                                                                                <th >Diabetic</th>
                                                                                <th >HBP</th>
                                                                                <th >Weak Heart</th>
                                                                                <th >Depression</th>
                                                                                <th >Others</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td >Yes</td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input type="text" style="width: 300px;"></td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td >No</td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input style="width: 70px;"type="text" ></td>
                                                                                <td ><input type="text" style="width: 300px;"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <strong>About Health Now</strong>
                                                                <table id="myTable" class="table table-default">
                                                                    <tr>
                                                                        <td >Midwife</td>
                                                                        <td ><input type="text" ></td>
                                                                        <td >THA</td>
                                                                        <td ><input type="text" ></td>
                                                                        <td >THA</td>
                                                                        <td ><input type="text" ></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td >Expected Pregnancy Time</td>
                                                                        <td ><input type="text" ></td>
                                                                        <td >Place</td>
                                                                        <td ><input type="text" ></td>
                                                                    </tr>
                                                                </table>
                                                                <strong> Health Condition Now</strong>
                                                                <table id="myTable" class="table table-default">
                                                                    <tr>
                                                                        <td >Dental</td>
                                                                        <td ><input type="text" ></td>
                                                                        <td >Weight</td>
                                                                        <td ><input type="text" ></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td >Vericose Veins</td>
                                                                        <td ><input type="text" ></td>
                                                                        <td >TD</td>
                                                                        <td ><input type="text" ></td>
                                                                        <td >HB</td>
                                                                        <td ><input type="text" ></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td >Heart/Lung</td>
                                                                        <td ><input type="text" ></td>
                                                                        <td >Others</td>
                                                                        <td ><input type="text" ></td> 
                                                                    </tr>
                                                                </table>
                                                                <strong>Surrounding area</strong></br>
                                                                <table id="myTable" class="table table-default">
                                                                    <label>House Area</label>
                                                                    <tr>
                                                                        <td >Toilet</td>
                                                                        <td ><input type="text" ></td>
                                                                        <td >Air</td>
                                                                        <td ><input type="text" ></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td >Water Supply</td>
                                                                        <td ><input type="text" ></td>
                                                                        <td >Food Storage</td>
                                                                        <td ><input type="text" ></td>
                                                                    </tr>
                                                                </table>
                                                                <label>Waste</label>
                                                                <table id="myTable" class="table table-default">
                                                                    <label>House Area</label>
                                                                    <tr>
                                                                        <td >Landfill</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                        <td >Collection</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td >Combustion</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                        <td >Not Statisfied</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                        <td >Others</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                    </tr>
                                                                </table>
                                                                <table id="myTable" class="table table-default">
                                                                    <label>Water piping</label>
                                                                    <tr>
                                                                        <td >Yes</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                        <td >No</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                    </tr>
                                                                </table>
                                                                <table id="myTable" class="table table-default">
                                                                    <label>Item</label>
                                                                    <tr>
                                                                        <td >Radio</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                        <td >Newspaper</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                        <td >Motocycle</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                        <td >Others</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td >Television</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                        <td >Car</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                        <td >Bicycle</td>
                                                                        <td ><input type="checkbox" ></td>
                                                                    </tr>
                                                                </table>
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
                                                        <label for="inputName"></label>
                                                        <form role="form">
                                                            <div class="form-group">
                                                                <div style="overflow-x: scroll;" class="col-md-12">
                                                                    <table  id="myTable" class=" table electro-list">
                                                                        <thead>

                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td rowspan="3">Date</td>
                                                                                <td rowspan="3">Clinic/House Visit</td>
                                                                                <td colspan="7"> Check Up</td>
                                                                                <td colspan="4">Lab Check Up</td>
                                                                                <td rowspan="3">Problem/Advice/Treatment</td>
                                                                                <td rowspan="3">Next Visit</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="2">Weight</td>
                                                                                <td rowspan="2" >TD</td>
                                                                                <td rowspan="2">Breast</td>
                                                                                <td rowspan="2">Timeframe/Uterus height </td>
                                                                                <td rowspan="2">Fetal Position</td>
                                                                                <td rowspan="2">Fetal Heart/Fetal Movement</td>
                                                                                <td rowspan="2">Swollen Feet</td>
                                                                                <td colspan="2">Urine</td>
                                                                                <td rowspan="2">HB</td>
                                                                                <td rowspan="2">Other Details</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Albumin</td>
                                                                                <td>Sugar</td>
                                                                            </tr>
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
                                                        <label for="inputName"></label>
                                                        <form role="form">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <table id="myTable" class="table table-default">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td >Clinic</td>
                                                                                <td ><input type="textbox" name="checkbox"></td>
                                                                                <td >Mother IC</td>
                                                                                <td ><input type="textbox" name="checkbox"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Birth Date</td>
                                                                                <td ><input type="date" name="checkbox"></td>
                                                                                <td >Birth Place</td>
                                                                                <td ><input type="textbox" name="checkbox"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Mother Condition</td>
                                                                                <td ><input type="textbox" name="checkbox"></td>
                                                                                <td >Number of calls</td>
                                                                                <td ><input type="textbox" name="checkbox"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Baby condition</td>
                                                                                <td ><input type="textbox" name="checkbox"></td>
                                                                                <td >Birth Weight</td>
                                                                                <td ><input type="textbox" name="checkbox"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        </tfoot>
                                                                    </table>
                                                                    <table id="myTable" class=" table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="4">POSTNATAL CARE </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th ></th>
                                                                                <th >House Visit (20days)</th>
                                                                                <th >Clinic Visit (42days)</th>
                                                                                <th >Family Planner Nutrition Advice</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td >Date</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Body Temperature</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Weight</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >TD</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Breast</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Milk Flow</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Vagina Flow</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Womb Height</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Swollen Leg</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Anemia (HB)</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Urine Alb</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Urine Sugar</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="4">Vagina Checkup</td>
                                                                                <td >Genital</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Episiotomy/Wound</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td >Womb/CX</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td >Adnexa</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>

                                                                            </tr>
                                                                            <tr>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        </tfoot>
                                                                    </table>
                                                                    <label class="col-md-2"for="inputName">NOTES:</label>
                                                                    <textarea class="col-md-10" rows="5" ></textarea> 
                                                                    <table id="myTable" class="table table-default">
                                                                        <tr>
                                                                            <td >Accept Family Planning</td>
                                                                            <td ><label class="select">
                                                                                    <select name="month">
                                                                                        <option value="0" selected="" >Yes</option>
                                                                                        <option value="1">No</option>
                                                                                    </select> 
                                                                                    <i></i> 
                                                                                </label>
                                                                            </td>
                                                                            <td >Ways</td>
                                                                            <td ><input type="textbox" ></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td >Breast Feeding</td>
                                                                            <td><label class="select">
                                                                                    <select name="month">
                                                                                        <option value="0" selected="" >Mother Milk</option>
                                                                                        <option value="1">Bottle Milk</option>
                                                                                    </select> 
                                                                                    <i></i> 
                                                                                </label>
                                                                            </td>
                                                                        </tr>
                                                                    </table>

                                                                    <table id="myTable" class=" table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="4">VISIT SUMMARY</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th >Pregnant Time</th>
                                                                                <th >Total Clinic Visit</th>
                                                                                <th >Total House Visit</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td >0-27 Weeks</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >28-35 Weeks</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >36+ Weeks - Natal</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td >Post Natal</td>
                                                                                <td ><input type="textbox" ></td>
                                                                                <td ><input type="textbox" ></td>
                                                                            </tr>
                                                                        </tbody>    
                                                                    </table>
                                                                    <table id="myTable" class="table table-default">
                                                                        <tr>
                                                                            <td >VDRL</td>
                                                                            <td ><input type="textbox" ></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td >TETANUS TOXOID</td>
                                                                            <td colspan="4">1<input type="textbox" ></td>
                                                                            <td >2<input type="textbox" ></td>
                                                                        </tr>
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
        
        function passConstoDispancery(id){
            var APP_URL = '{!! json_encode(url('/consultations/')) !!}';
            //alert(APP_URL);

            url = "{!! URL::to('consultancyPassForm') !!}";
            $.ajax({
                url: url,
                async: false,
                type: 'POST',
                data: {_token: "{{ csrf_token() }}", id: id},
            }).done(function (response) {
                if(response == 0){
                    $('#passToCons').css('display','none');
                    window.location.href = "{{ URL::to('consultations/') }}";
                } else {
                    window.location.href = "{{ URL::to('consultations/') }}";
                }
            });
            
        }
        
        
        
        $(document).ready(function () {
            //#######################################
            $("#is_medical_certificate").prop("checked", false);
            $("#is_time_slip").prop("checked", false);
            
            $('#txtFrom').val('');
            $('#txtTo').val('');
            $('#totDays').val('');
            $('#txtFroms').val('');
            $('#startTime').val('');
            $('#endTime').val('');
            $('#tothour').val('');
            /////////////////////////////////////////
            $('#medical_certificate').val(0);
            $('#time_slip').val(0);

            $('#stdate').val('');
            $('#enddate').val('');
            $('#totaldays').val('');
            $('#onlydate').val('');
            $('#sttime').val('');
            $('#endtime').val('');
            $('#totaltime').val('');
            //#######################################
            var counter = 0;
            $("#addrow").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";
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
                cols += '<td><span id="incre"></span></td>';
                cols += '<td><input type="date" name="day' + counter + '"></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="note' + counter + '"/></td>';
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
                var html = $('<li><span class="' + priority + '" data-description="' + description + '" data-icon="' +
                        icon + '">' + title + '</span></li>').prependTo('ul#external-events').hide().fadeIn();
                $("#event-container").effect("highlight", 800);
                initDrag(html);
            };

            /* initialize the external events
             -----------------------------------------------------------------*/
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
            //$('.selectpicker').selectpicker();
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.css" />
    
    <script type="text/javascript">
        $(function () {
            $("#txtFrom").datepicker({
                numberOfMonths: 1,
                dateFormat: 'yy-mm-dd',
                minDate: 'today',
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    $('#stdate').val(selected);
                    dt.setDate(dt.getDate() + 1);
                    $("#txtTo").datepicker("option", "minDate", dt);
                    
                    if( $('#txtTo').val() != '' ){
                        var txtstart = new Date($('#txtFrom').val());
                        var txtend = new Date($('#txtTo').val());
                        var diff = (txtend - txtstart);
                        var days = diff/1000/60/60/24;
                        //alert(days);
                        $('#totDays').val( days + " Days" );
                        $('#totaldays').val(days);
                    } else {
                        $('#totDays').val('');
                        $('#totaldays').val('');
                    }
                }
            });
            
            $("#txtTo").datepicker({
                numberOfMonths: 1,
                dateFormat: 'yy-mm-dd',
                minDate: 'today' + 1,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    $('#enddate').val(selected);
                    dt.setDate(dt.getDate() - 1);
                    $("#txtFrom").datepicker("option", "maxDate", dt);
                    
                    if( $('#txtFrom').val() != '' ){
                        var txtstart = new Date($('#txtFrom').val());
                        var txtend = new Date($('#txtTo').val());
                        var diff = (txtend - txtstart);
                        var days = diff/1000/60/60/24;
                        //alert(days);
                        $('#totDays').val( days + " Days" );
                        $('#totaldays').val(days);
                    } else {
                        $('#totDays').val('');
                        $('#totaldays').val('');
                    }
                }
            });
            
            $("#txtFroms").datepicker({
                numberOfMonths: 1,
                dateFormat: 'yy-mm-dd',
                minDate: 'today',
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    $('#onlydate').val(selected);
                    dt.setDate(dt.getDate() + 1);
                    $("#txtTo").datepicker("option", "minDate", dt);
                }
            });
        });
        $(function() {
            //$('#startTime').timepicker({ 'scrollDefault': 'now' });
            //$('#endTime').timepicker({ 'scrollDefault': 'now' });

            $("#startTime").timepicker({
                controlType: 'select',
                'timeFormat': 'H:i',
                oneLine: true,
            });
            
            $("#endTime").timepicker({
                controlType: 'select',
                'timeFormat': 'H:i',
                oneLine: true,
            });
            
            /*
            var $minimumStartTime = $("startTime").val();
            var $minimumEndTime = $("endTime").val();

            $.timepicker.timeRange(
                $minimumStartTime,
                $minimumEndTime,
                {
                    minInterval: (1000*60*60), // 1hr
                    timeFormat: 'HH:mm',
                    start: {}, // start picker options
                    end: {} // end picker options
                }
            )
            */
            
        });
    </script>
    
@endsection
