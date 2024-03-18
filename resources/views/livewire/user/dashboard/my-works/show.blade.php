<section class="main-dash">
    <div class="container">
        <!-- modal withdraw money-->
        <div id="dash-modal">
            <div class="dash-modal-content">
                <form>
                    <h3 class="my-4">هل تريد حذف المشروع ؟</h3>
                    <div class="d-flex justify-content-between gap-3 align-items-center mt-3">
                        <button wire:click="destroy()" class="btn btn-delete-red px-4" type="button">
                            نعم
                        </button>
                        <button class="btn btn-balance-nav-sec py-2 px-4" type="button" id="dash-close-modal-2">
                            لا
                        </button>
                    </div>
                </form>
            </div>
            <div class="dash-modal-backdrop"></div>
        </div>
        <!-- end modal withdraw money -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <!--  -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3>{{$work->title}}</h3>
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{route('user.client.my_works.edit', $work->id)}}" class="btn btn-balance-nav-sec px-4">
                                تعديل
                            </a>
                            <button  id="dash-open-modal" class="btn btn-delete-red px-4">
                                حذف
                            </button>
                        </div>
                    </div>
                    <!--  -->
                    <div>
                        <img src="{{asset('website/assets/images/proj-2.png')}}" class="project-details-container proj-img-details mt-2 shadow">
                    </div>
                    <!--  -->
                    <div class="project-details-container proj-details-text shadow">
                        <div>
                            <h4>بطاقة عمل</h4>
                            <p class="mt-2">
                               {{$work->description}}
                            </p>
                            <div class="d-flex gap-8 align-items-center mt-3">
                                <p>اسم المستقل</p>
                                <p>{{$work->user->first_name .' ' .$work->user->last_name}}</p>
                            </div>
                            <div class="d-flex gap-8 align-items-center mt-3">
                                <p>عدد الاعجابات</p>
                                <p>{{$work->likes}} من الاعجابات</p>
                            </div>
                            <div class="d-flex gap-8 align-items-center mt-3">
                                <p>عدد المشاهدات</p>
                                <p>{{$work->views}} من المشاهدات</p>
                            </div>
                            <div class="d-flex gap-8 align-items-center mt-3">
                                <p>تاريخ اكتمال المشروع</p>
                                <p>{{\Illuminate\Support\Carbon::parse($work->invoke_date)->format('Y-m-d')}}</p>
                            </div>

                            @if($work->link)
                                <a href="{{$work->link}}" target="_blank" class="btn btn-1 px-4 proj-link-btn">
                                    رابط العمل
                                </a>
                            @endif
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const openModalButton = document.getElementById("dash-open-modal");
    const closeModalButton2 = document.getElementById("dash-close-modal-2");
    const modal = document.getElementById("dash-modal");
    const modalBackdrop = document.querySelector(".dash-modal-backdrop");
    openModalButton.addEventListener("click", () => {
        modal.style.display = "flex";
    });

    closeModalButton2.addEventListener("click", () => {
        modal.style.display = "none";
    });

    modalBackdrop.addEventListener("click", () => {
        modal.style.display = "none";
    });
</script>
