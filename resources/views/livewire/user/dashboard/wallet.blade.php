<section class="main-dash">
    <div class="container">
        <!-- modal withdraw money-->
        <div id="dash-modal">
            <div class="dash-modal-content">
                <div class="d-flex justify-content-between">
                    <h3>سحب الرصيد</h3>
                    <button id="dash-close-modal">Close</button>
                </div>
                <form>
                    <div class="withdraw-input align-items-center gap-3 form-group mt-8 mb-8">
                        <input id="withdraw-amount" type="text" class="form-control shadow rad-20 py-2" placeholder="المبلغ">
                        <input id="withdraw-account" type="text" class="form-control shadow rad-20 py-2" placeholder="الحساب">
                    </div>
                    <div class="d-flex justify-content-between gap-3 align-items-center">
                        <button class="btn btn-1 py-2" type="submit">
                            سحب الرصيد
                        </button>
                        <a href="dashboard-balance-history.html" role="button" type="button" class="btn btn-balance-nav-sec py-2">المعاملات المالية</a>
                    </div>
                </form>
            </div>
            <div class="dash-modal-backdrop"></div>
        </div>
        <!-- end modal withdraw money -->
        <!-- start of insert money modal -->
        <div id="dash-modal-2">
            <div class="dash-modal-content-2">
                <div class="d-flex justify-content-between">
                    <h3>شحن الرصيد</h3>
                    <button id="dash-close-modal-2">Close</button>
                </div>
                <form>
                    <div class="grid-2-col align-items-center form-group mt-8 mb-8">
                        <input id="insert-amount" type="text" class="form-control shadow rad-20 py-2" placeholder="المبلغ">
                        <input id="insert-name" type="text" class="form-control shadow rad-20 py-2" placeholder="الاسم الكامل على البطاقة">
                        <input id="inset-card-details" type="text" class="form-control shadow rad-20 py-2" placeholder="بيانات البطاقة الائتمانية">
                    </div>
                    <div class="d-flex justify-content-between gap-3 align-items-center">
                        <button class="btn btn-1 py-2" type="submit">
                            شحن الرصيد
                        </button>
                        <a href="dashboard-balance-history.html" role="button" type="button" class="btn btn-balance-nav-sec py-2">المعاملات المالية</a>
                    </div>
                </form>
            </div>
            <div class="dash-modal-backdrop-2"></div>
        </div>
        <!--  -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="text-right">
                        <h2>الرصيد</h2>
                    </div>

                    <!-- cards -->
                    <div class="balance-container">
                        <!--  -->
                        <div class="balance-card-cont">
                            <h4>الرصيد الكلي</h4>
                            <div class="balance-card shadow">
                                <h1>{{$totalBalance}} $</h1>
                            </div>
                        </div>
                        <!--  -->
                        <!--  -->
                        <div class="balance-card-cont">
                            <h4>الرصيد المعلق</h4>
                            <div class="balance-card shadow">
                                <h1>{{$pendingBalance}} $</h1>
                            </div>
                        </div>
                        <!--  -->
                        <!--  -->
                        <div class="balance-card-cont">
                            <h4>الرصيد المتاح</h4>
                            <div class="balance-card shadow">
                                <h1> {{$canWithDraw}} $</h1>
                            </div>
                        </div>
                        <!--  -->
                        <div class="balance-card-cont">
                            <h4>الرصيد القابل للسحب</h4>
                            <div class="balance-card shadow">
                                <h1>{{$canWithDraw}} $</h1>
                            </div>
                        </div>
                        <!--  -->
                    </div>

                    <!-- end of cards -->
                </div>
            </div>
        </div>
    </div>
</section>
