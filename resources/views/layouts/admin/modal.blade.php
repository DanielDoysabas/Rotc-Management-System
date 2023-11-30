@if (url()->current() === route('admin.categories.index'))
    {{-- Creating category --}}
    <div class="modal fade" id="m_category" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="m_category_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="m_category_header">
                    <h6 class="modal-title text-white" id="m_category_title">{{-- Modal Title --}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-3">
                    <form class="category_form" autocomplete="off">
                        <label class="fw-bold">Enter Category *</label>
                        <div class="input-group input-group-outline mb-3 ">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn float-end btn_add_category btn-primary"
                        onclick="c_store('.category_form','.category_dt', 'admin.categories.store')">Submit</button>
                    <button type="button" class="btn float-end btn_update_category btn-primary"
                        onclick="c_update('.category_form','.category_dt', 'admin.categories.update', event)">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Creating category --}}
@endif


@if (url()->current() === route('admin.courses.index'))
    {{-- Creating course --}}
    <div class="modal fade" id="m_course" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="m_course_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="m_course_header">
                    <h6 class="modal-title text-white" id="m_course_title">{{-- Modal Title --}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-3">
                    <form class="course_form" autocomplete="off">

                        <div class="form-group mb-2">
                            <label class="form-label">Department *</label>
                            <select class="form-control" name="department_id" id="d_departments">
                                {{-- display departments --}}
                            </select>
                        </div>

                        <div class="form-group mb-3 ">
                            <label class="form-label">Course *</label>
                            <input type="text" class="form-control" name="name"
                                placeholder="Ex. Bachelor of Science in Agribusiness">
                        </div>


                        <div class="form-group mb-3 ">
                            <label class="form-label">Abbreviation *</label>
                            <input type="text" class="form-control" name="abbreviation" placeholder="Ex. BSA">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn float-end btn_add_course btn-primary"
                        onclick="c_store('.course_form','.course_dt', 'admin.courses.store')">Submit</button>
                    <button type="button" class="btn float-end btn_update_course btn-primary"
                        onclick="c_update('.course_form','.course_dt', 'admin.courses.update', event)">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Creating academic_year --}}
@endif

@if (url()->current() === route('admin.departments.index'))
    {{-- Creating department --}}
    <div class="modal fade" id="m_department" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="m_department_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="m_department_header">
                    <h6 class="modal-title text-white" id="m_department_title">{{-- Modal Title --}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-3">
                    <form class="department_form" autocomplete="off">
                        <div class="form-group mb-2">
                            <label class="form-label">Department *</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Abbreviation *</label>
                            <input type="text" class="form-control" name="abbreviation">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn float-end btn_add_department btn-primary"
                        onclick="c_store('.department_form','.department_dt', 'admin.departments.store')">Submit</button>
                    <button type="button" class="btn float-end btn_update_department btn-primary"
                        onclick="c_update('.department_form','.department_dt', 'admin.departments.update', event)">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Creating department --}}
@endif



@if (url()->current() === route('admin.platoons.index'))
    {{-- Creating platoon --}}
    <div class="modal fade" id="m_platoon" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="m_platoon_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="m_platoon_header">
                    <h6 class="modal-title text-white" id="m_platoon_title">{{-- Modal Title --}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-3">
                    <form class="platoon_form" autocomplete="off">
                        <label class="fw-bold">Platoon Name *</label>
                        <div class="input-group input-group-outline mb-3 ">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn float-end btn_add_platoon btn-primary"
                        onclick="c_store('.platoon_form','.platoon_dt', 'admin.platoons.store')">Submit</button>
                    <button type="button" class="btn float-end btn_update_platoon btn-primary"
                        onclick="c_update('.platoon_form','.platoon_dt', 'admin.platoons.update', event)">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Creating platoon --}}
@endif
