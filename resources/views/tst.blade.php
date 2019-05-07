<div class="modal fade in" id="transModel" role="dialog" style="display: block; padding-left: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Search</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="login-form" class="smart-form">
                    <fieldset>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Category : </label>
                                <div class="col col-3">
                                   <label class="input">
                                        <!-- <i class="icon-append fa fa-user"></i>-->
                                        <!--<input type="text" name="role">-->
                                        <select><option>Staff</option>
                                            <option>Dependant</option>
                                            <option>Others</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Search By : </label>
                                <div class="col col-3">
                                    <label class="input">
                                        <!-- <i class="icon-append fa fa-user"></i>-->
                                        <!--<input type="text" name="role">-->
                                        <select><option>Staff Id</option>
                                            <option>I/C</option>
                                            <option>Name</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col col-4">
                                    <label class="input"> 
                                        <!--<i class="icon-append fa fa-user"></i>-->
                                        <input type="text" name="search">
                                    </label>
                                </div>
                                <div class="col col-2">
                                    <button type="button" class="btn btn-default">Search</button>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Result : </label>
                                <div class="col col-9">
                                    <table class="table table-striped table-bordered table-hover" width="100%">
                                        <tbody>
                                            <tr>
                                                <td rowspan="4">Staff</td>
                                                <td>Name: Nadia Izzati bt Hashim</td>
                                            </tr>
                                            <tr>
                                                <td>Staff Id: I0001</td>
                                            </tr>
                                            <tr>
                                                <td>Department: Ict</td>
                                            </tr>
                                            <tr>
                                                <td>I/C: 961231-12-5162</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Dependant: Ahzam bin Ismail</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Sympthoms : </label>
                                <div class="col col-9">
                                    <label class="input"> <!--<i class="icon-append fa fa-lock"></i>-->
                                    <input type="text" name="sympthom">
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Department: </label>
                                <div class="col col-3">
                                    <label class="input">
                                        <!-- <i class="icon-append fa fa-user"></i>-->
                                        <!--<input type="text" name="role">-->
                                        <select><option>Consultation 1</option>
                                            <option>Consultation 2</option>
                                            <option>Laboratory</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                    </fieldset>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>